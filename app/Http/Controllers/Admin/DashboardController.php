<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $totalRevenue = Order::where("status", 4)->sum("total");
        $totalOrders = Order::where('status', 4)->count()+1;
//        dd($totalRevenue, $totalOrders);
        return view('admin.dashboard.index', compact("totalRevenue", "totalOrders"));
    }

    public function statistical()
    {
        $ordersData = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(total) as total_amount')
        )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return response()->json($ordersData);
    }
}
