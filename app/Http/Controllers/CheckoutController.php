<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOrders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout(Product $product)
    {
        if (Auth::id() == $product->creator_id) {
            abort(403, 'You cannot checkout your own product.');
        }

        $product->load(['category', 'creator']);
        return view('front.checkout', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        if (Auth::id() == $product->creator_id) {
            abort(403, 'You cannot checkout your own product.');
        }

        DB::beginTransaction();

        try {
            // Initiate Midtrans Config
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            // Generate unique Midtrans order ID
            $midtransOrderId = 'RMH-' . time() . '-' . mt_rand(1000, 9999);

            $order = ProductOrders::create([
                'creator_id'  => $product->creator_id,
                'product_id'  => $product->id,
                'buyer_id'    => Auth::id(),
                'total_price' => $product->price,
                'is_paid'     => false,
                'proof'       => $midtransOrderId, // store midtrans order_id here
                'snap_token'  => null,
            ]);

            $params = [
                'transaction_details' => [
                    'order_id'     => $midtransOrderId,
                    'gross_amount' => (int) $order->total_price,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email'      => Auth::user()->email,
                ],
                'item_details' => [
                    [
                        'id'       => $product->id,
                        'price'    => (int) $product->price,
                        'quantity' => 1,
                        'name'     => substr($product->name, 0, 50),
                    ]
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $order->snap_token = $snapToken;
            $order->save();

            DB::commit();

            return view('front.payment', compact('order', 'snapToken'));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Midtrans checkout error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Midtrans Notification / Webhook Handler
     * POST /midtrans/callback (no CSRF)
     */
    public function callback(Request $request)
    {
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        try {
            $notification = new \Midtrans\Notification();

            $transactionStatus = $notification->transaction_status;
            $fraudStatus       = $notification->fraud_status;
            $midtransOrderId   = $notification->order_id;

            // Find order by the midtrans_order_id stored in 'proof' column
            $order = ProductOrders::where('proof', $midtransOrderId)->first();

            if (!$order) {
                Log::warning('Midtrans callback: order not found for order_id: ' . $midtransOrderId);
                return response()->json(['message' => 'Order not found'], 404);
            }

            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $order->is_paid = true;
                }
            } elseif ($transactionStatus == 'settlement') {
                $order->is_paid = true;
            } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $order->is_paid = false;
            } elseif ($transactionStatus == 'pending') {
                $order->is_paid = false;
            }

            $order->save();
            Log::info('Midtrans callback processed: ' . $midtransOrderId . ' -> ' . $transactionStatus);

            return response()->json(['message' => 'Notification processed']);

        } catch (\Exception $e) {
            Log::error('Midtrans callback error: ' . $e->getMessage());
            return response()->json(['message' => 'Error'], 500);
        }
    }

    public function success()
    {
        return view('front.success_checkout');
    }
}
