<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


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

    public function placeOrder(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "country" => "required",
            "street_address" => "required",
            "town_city" => "required",
            "phone" => "required|min:10|max:20",
            "email" => "required|email",
        ], [
            "required" => "Please enter full information",
            "min" => "Please enter at least :min",
            "max" => "Please do not enter a value exceeding :max"
        ]);

        // Get cart items
        $carts = Cart::content();
        $subtotal = Cart::subtotal();
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

        // Create order
        $order = Order::create([
            "first_name" => $request->input("first_name"),
            "last_name" => $request->input("last_name"),
            "country" => $request->input("country"),
            "street_address" => $request->input("street_address"),
            "town_city" => $request->input("town_city"),
            "postcode_zip" => $request->input("postcode_zip"),
            "phone" => $request->input("phone"),
            "email" => $request->input("email"),
            "total" => $total,
            "payment_method" => $request->get("payment_method"),
//            "is_paid"=>false,
//            "status"=>0,
        ]);



        // Create order details
        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        // Clear the cart
        Cart::destroy();

        if ($order->payment_method == "PayPal") {
            //Payment Method PayPal
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction', ["order" => $order->id]),
                    "cancel_url" => route('cancelTransaction', ["order" => $order->id]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => number_format($total, 2, "", "")
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

            }

        }

        // Redirect to thank you page
        return redirect("/checkout/thank-you");
    }

    public function successTransaction(Order $order,Request $request){
        $order->update(["is_paid"=>true,"status"=>1]);// đã thanh toán, trạng thái về xác nhận
        return redirect()->to("/checkout/thank-you/".$order->id);
    }

    public function cancelTransaction(Order $order,Request $request){
        return redirect()->to("/checkout/thank-you/".$order->id);
    }

    public function result() {
        return view("front.checkout.thank-you");
    }

}

