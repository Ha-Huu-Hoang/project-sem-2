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

//        $total = Order::whereMonth("created_at", 7)->where("status", 4)->sum("total");
//        dd($total);
        return view('admin.dashboard.index');
    }

    public function statistical()
    {
        $ordersData = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(total) as total_amount')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json($ordersData);
    }
}
