<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        $subtotal = Cart::subtotal();
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

        return view('front.checkout.index', compact('carts', 'total', 'subtotal', 'vatAmount'));
    }

}

