<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $subtotal = Cart::subtotal();
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

        return view('front.checkout.index', compact('carts', 'total', 'subtotal', 'vatAmount'));
    }

    public function placeOrder(Request $request) {
        $request->validate([
            "fist_name"=>"required",
            "last_name"=>"required",
            "country"=>"required",
            "street_address"=>"required",
            "town_city"=>"required",
            "phone"=>"required|min:10|max:20",
            "email"=>"required|email",
        ],[
            "required"=>"Please enter full information",
            "min"=>"Please enter at least :min",
            "max"=>"Please do not enter a value not exceeding :max"
        ]);

        //Add Order

        //Order Detail

        //Delete Cart

        //Notification
    }

}

