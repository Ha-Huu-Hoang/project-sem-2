<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $totalRevenue = Order::where("status", 4)->sum("total");
//        dd($totalRevenue, $totalOrders);

        $orderDay = Order::whereDay('created_at', now())->count();
        $orderDayTotal = Order::whereDay('updated_at', now())->where('status', 4)->sum('total');
        $orderDayCompleted = Order::whereDay('updated_at', now())->where('status', 4)->count();
//        dd($orderDayCompleted);

        $total7Days = Order::where('status', 4)->whereDate('updated_at', '>=', now()->subDays(6))->sum('total');
//        dd($total7Days);

        $featured = Product::where('featured', true)
            ->with('productImages')
            ->limit(6)
            ->get();
//        dd($productFeatured);

        return view('admin.dashboard.index',
            compact('totalRevenue', 'orderDay', 'orderDayTotal', 'orderDayCompleted', 'total7Days', 'featured'));
    }

    public function statistical()
    {
        $ordersData = Order::where("status", 4)->select(
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

    public function order7Days()
    {
        $endDate = now()->toDateString();
        $startDate = now()->subDays(6)->toDateString();

        $ordersData = Order::where('status', 4)
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('DAY(created_at) as day'),
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(total) as total_amount')
            )
            ->groupBy('year', 'month', 'day')
            ->orderBy('year')
            ->orderBy('month')
            ->orderBy('day')
            ->get();

        return response()->json($ordersData);
    }
}
