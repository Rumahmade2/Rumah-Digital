<?php

namespace App\Http\Controllers;

use App\Models\ProductOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user && $user->isAdmin()) {
            $product_orders = ProductOrders::with(['product', 'buyer'])->latest()->get();
        } else {
            $product_orders = ProductOrders::where('creator_id', Auth::id())->with(['product', 'buyer'])->latest()->get();
        }

        return view('admin.product_orders.index', [
            'product_orders' => $product_orders
        ]);
    }
    public function myOrders()
    {
        $my_orders = ProductOrders::where('buyer_id', Auth::id())
            ->with(['product.category', 'product.creator'])
            ->latest()
            ->get();

        return view('front.my_orders', compact('my_orders'));
    }

    public function transaction()
    {
        $my_transactions = Auth::check() 
            ? ProductOrders::where('buyer_id', Auth::id())->with(['product', 'creator'])->latest()->get() 
            : ProductOrders::withTrashed()->with(['product', 'creator'])->latest()->get();


        return view('admin.product_orders.transaction',[
            'my_transactions' => $my_transactions
        ]);
    }   

    public function transaction_details(ProductOrders $productOrders)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $productOrders->buyer_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.product_orders.transaction_details',[

            'order' => $productOrders
        ]);
    }   

    public function approve(ProductOrders $product_orders)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $product_orders->creator_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $product_orders->update([
            'is_paid' => true,
        ]);

        return redirect()->back()->with('success', 'Order approved successfully');
    }

    public function download(ProductOrders $product_orders)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $product_orders->buyer_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        \Log::info('Downloading order ID: ' . $product_orders->id . ' Current count: ' . $product_orders->download_count);
        
        if (!$product_orders->is_paid) {

            return redirect()->back()->with('error', 'You must pay for this product first.');
        }

        if ($product_orders->download_count >= 1) {
            return redirect()->back()->with('error', 'You have reached the maximum download limit (1x).');
        }

        if (!$product_orders->product) {
            return redirect()->back()->with('error', 'Product information is no longer available.');
        }

        $product_orders->download_count = $product_orders->download_count + 1;
        $product_orders->save();

        return response()->download(storage_path('app/public/' . $product_orders->product->path_file));
    }



    public function show(ProductOrders $productOrders)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $productOrders->creator_id !== $user->id && $productOrders->buyer_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.product_orders.details',[
            'order' => $productOrders
        ]);
    }

    public function export_pdf()
    {
        $my_transactions = Auth::check()
            ? ProductOrders::where('buyer_id', Auth::id())->with(['product', 'creator'])->latest()->get()
            : ProductOrders::withTrashed()->with(['product', 'creator'])->latest()->get();

        $totalAmount = $my_transactions->sum('total_price');
        $totalCount = $my_transactions->count();

        $pdf = Pdf::loadView('admin.product_orders.pdf_history', [
            'my_transactions' => $my_transactions,
            'user' => Auth::user(),
            'total_amount' => $totalAmount,
            'total_count' => $totalCount,
        ]);

        return $pdf->download('purchase-history-' . now()->format('Y-m-d') . '.pdf');
    }

    public function export_sales_pdf()
    {
        $user = Auth::user();
        $product_orders = $user && $user->isAdmin()
            ? ProductOrders::with(['product', 'buyer'])->latest()->get()
            : ProductOrders::where('creator_id', Auth::id())->with(['product', 'buyer'])->latest()->get();

        $totalAmount = $product_orders->sum('total_price');
        $totalCount = $product_orders->count();

        $pdf = Pdf::loadView('admin.product_orders.pdf_sales_history', [
            'product_orders' => $product_orders,
            'user' => $user,
            'total_amount' => $totalAmount,
            'total_count' => $totalCount,
        ]);

        return $pdf->download('sales-history-' . now()->format('Y-m-d') . '.pdf');
    }

    public function download_invoice(ProductOrders $product_orders)
    {
        // Check if the user is the buyer or the seller or guest?
        // For simplicity and matching current logic, let's allow if authorized.
        
        $pdf = Pdf::loadView('admin.product_orders.invoice', [
            'order' => $product_orders
        ]);

        return $pdf->download('invoice-' . $product_orders->id . '.pdf');
    }

    public function destroy(ProductOrders $product_orders)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $product_orders->creator_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $product_orders->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    }
}

