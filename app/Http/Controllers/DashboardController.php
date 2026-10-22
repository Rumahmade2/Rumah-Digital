<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductOrders;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            // ========================
            // ADMIN DASHBOARD DATA (GLOBAL)
            // ========================
            $total_users = \App\Models\User::count();
            $total_products = Product::count();
            $total_orders = ProductOrders::where('is_paid', 1)->count();
            $total_revenue = ProductOrders::where('is_paid', 1)->sum('total_price');

            $recent_transactions = ProductOrders::with(['product', 'buyer', 'product.creator'])
                ->latest()
                ->take(10)
                ->get();

            // Chart data - 12 months global revenue
            $orders = ProductOrders::where('is_paid', 1)
                ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
                ->select('created_at', 'total_price')
                ->get();
            
            $revenueData = $orders->groupBy(function($order) {
                return $order->created_at->format('Y-m');
            })->map(function ($group) {
                return $group->sum('total_price');
            });

            $chartLabels = [];
            $chartData   = [];
            for ($i = 11; $i >= 0; $i--) {
                $month = now()->subMonths($i);
                $chartLabels[] = $month->translatedFormat('M Y');
                $monthKey = $month->format('Y-m');
                $chartData[] = $revenueData->has($monthKey) ? (int) $revenueData->get($monthKey) : 0;
            }

            return view('admin.dashboard_admin', [
                'total_users'    => $total_users,
                'total_products' => $total_products,
                'total_orders'   => $total_orders,
                'total_revenue'  => $total_revenue,
                'recent_transactions' => $recent_transactions,
                'chartLabels'    => $chartLabels,
                'chartData'      => $chartData,
            ]);
        } elseif ($user->isSeller()) {
            // ========================
            // SELLER DASHBOARD DATA
            // ========================
            $my_products = Product::where('creator_id', $user->id)->get();
            $my_revenue  = ProductOrders::where('creator_id', $user->id)->where('is_paid', 1)->sum('total_price');
            $my_order_success = ProductOrders::where('creator_id', $user->id)->where('is_paid', 1)->count();
            $my_order_pending = ProductOrders::where('creator_id', $user->id)->where('is_paid', 0)->count();

            // Chart data - 12 months revenue
            $orders = ProductOrders::where('creator_id', $user->id)
                ->where('is_paid', 1)
                ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
                ->select('created_at', 'total_price')
                ->get();
            
            $revenueData = $orders->groupBy(function($order) {
                return $order->created_at->format('Y-m');
            })->map(function ($group) {
                return $group->sum('total_price');
            });

            $chartLabels = [];
            $chartData   = [];
            for ($i = 11; $i >= 0; $i--) {
                $month = now()->subMonths($i);
                $chartLabels[] = $month->translatedFormat('M Y');
                $monthKey = $month->format('Y-m');
                $chartData[] = $revenueData->has($monthKey) ? (int) $revenueData->get($monthKey) : 0;
            }

            $recent_orders = ProductOrders::where('creator_id', $user->id)
                ->with(['product', 'buyer'])
                ->latest()
                ->take(5)
                ->get();

            return view('admin.dashboard', [
                'my_products'      => $my_products,
                'my_revenue'       => $my_revenue,
                'my_order_success' => $my_order_success,
                'my_order_pending' => $my_order_pending,
                'chartLabels'      => $chartLabels,
                'chartData'        => $chartData,
                'recent_orders'    => $recent_orders,
            ]);
        } elseif ($user->isBuyer()) {
            // ========================
            // BUYER DASHBOARD DATA
            // ========================
            $my_purchases   = ProductOrders::where('buyer_id', $user->id)->where('is_paid', 1)->count();
            $my_pending     = ProductOrders::where('buyer_id', $user->id)->where('is_paid', 0)->count();
            $my_total_spent = ProductOrders::where('buyer_id', $user->id)->where('is_paid', 1)->sum('total_price');

            $recent_purchases = ProductOrders::where('buyer_id', $user->id)
                ->with(['product', 'product.creator'])
                ->latest()
                ->take(5)
                ->get();

            // Chart data - 12 months spending
            $orders = ProductOrders::where('buyer_id', $user->id)
                ->where('is_paid', 1)
                ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
                ->select('created_at', 'total_price')
                ->get();
            
            $spendingData = $orders->groupBy(function($order) {
                return $order->created_at->format('Y-m');
            })->map(function ($group) {
                return $group->sum('total_price');
            });

            $chartLabels = [];
            $chartData   = [];
            for ($i = 11; $i >= 0; $i--) {
                $month = now()->subMonths($i);
                $chartLabels[] = $month->translatedFormat('M Y');
                $monthKey = $month->format('Y-m');
                $chartData[] = $spendingData->has($monthKey) ? (int) $spendingData->get($monthKey) : 0;
            }

            return view('admin.dashboard_buyer', [
                'my_purchases'     => $my_purchases,
                'my_pending'       => $my_pending,
                'my_total_spent'   => $my_total_spent,
                'recent_purchases' => $recent_purchases,
                'chartLabels'      => $chartLabels,
                'chartData'        => $chartData,
            ]);
        }
    }
}
