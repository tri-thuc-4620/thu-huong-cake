<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders   = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $todayRevenue  = Order::where('status', 'completed')
            ->whereDate('created_at', today())
            ->sum('total');
        $latestOrders  = Order::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'pendingOrders',
            'todayRevenue',
            'latestOrders',
        ));
    }
}
