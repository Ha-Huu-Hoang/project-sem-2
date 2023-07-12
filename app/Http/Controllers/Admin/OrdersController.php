<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Service\Order\OrderServiceInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $orderService;
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService=$orderService;
    }

    public function index(Request $request) {
        $status = $request->input('status');
        $list_act = [
            'delete' => 'Temporary delete'
        ];
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $order = Order::onlyTrashed()->paginate(10);
        } else {

            $search = '';
            if ($request->input('search')) {
                $search = $request->input('search');
            }
            $order = Order::where(function ($query) use ($search) {
                $query->orWhere('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%");
            })->paginate(10);
        }
        $count_user_active = Order::count();
        $count_user_trash = Order::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];
        return view("admin.orders.index",compact('order', 'count', 'list_act', 'status'));
    }
    public function show($id, Request $request){

        $order =Order::find($id);
        $subtotal = 0;
        $vatRate = 0.1;
        $shippingFee = 0;

        foreach ($order->orderDetails as $orderDetail) {
            $subtotal += $orderDetail->total;
        }

        $vatAmount = $subtotal * $vatRate;

        if ($order->shipping_method == 'Standard Shipping') {
            $shippingFee = 10;
        } elseif ($order->shipping_method == 'Express Shipping') {
            $shippingFee = 30;
        }

        $total = $subtotal + $vatAmount + $shippingFee;


        return view('admin.orders.show',['order' => $order,
            'subtotal'=>$subtotal,
            'vatAmount'=>$vatAmount,
            'total'=>$total,
            'shippingFee'=>$shippingFee]);
    }

}
