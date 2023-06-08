<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService =  $productService;
    }

    public function index(){
        $carts = Cart::content();
        $subtotal = Cart::subtotal();
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

        return view('front.shop.cart', compact('carts', 'total', 'subtotal', 'vatAmount'));
    }

    public function add($id){

            $product = $this->productService->find($id);
            Cart::add([
                'id' => $product->id,
                'name'=>$product->name,
                'qty'=>1,
                'price'=>  $product-> price,
                'weight'=> $product -> weight ?? 0 ,
                'options'=> [
                    'images'=>$product->productImages,
                ],
            ]);

        return back();
    }

    public function delete($id){
        Cart::remove($id);
        return back();
    }

}

