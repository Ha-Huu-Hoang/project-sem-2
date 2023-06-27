<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class CheckoutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    private $apSer;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $subtotal = str_replace(',', '', Cart::subtotal());
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

        return view('front.checkout.index', compact('carts', 'total', 'subtotal', 'vatAmount'));
    }

    //Helper MoMo
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
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
        $subtotal = str_replace(',', '', Cart::subtotal());
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

        // Create order
        $order = Order::create([
            "first_name" => $request->input("first_name"),
            "last_name" => $request->input("last_name"),
            "company_name" => $request->input("company_name"),
            "country" => $request->input("country"),
            "street_address" => $request->input("street_address"),
            "town_city" => $request->input("town_city"),
            "postcode_zip" => $request->input("postcode_zip"),
            "phone" => $request->input("phone"),
            "email" => $request->input("email"),
            "total" => $total,
            "payment_method" => $request->get("payment_method"),
            "shipping_method" => $request->get("shipping_method"),
            "user_id" => $request->input("user_id"),
            //  "is_paid"=>false,
            //   "status"=>0,
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
//        Cart::destroy();

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
                            "value" => number_format($total, 2, ".", "")
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

        } else if ($order->payment_method == "MoMo") {
            //Payment Method MoMo
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán đơn đặt hàng - Shop Runner";
            $amount = $total * 23000;
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/checkout/thank-you/";
            $ipnUrl = "http://127.0.0.1:8000/checkout/thank-you/";
            $extraData = "";
            $requestId = $order->id;
//            dd($requestId);
            $requestType = "payWithATM";
//            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
//            dd($secretKey);

            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'en',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
//            dd($result);
            $jsonResult = json_decode($result, true);  // decode json

//            dd($jsonResult);

            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
        }

        // Send Email
        $this->sendEmail($order);
        return redirect("/checkout/thank-you/")->with("notification","Success! You will pay on delivery. Please check your mail.");
    }

    //PayPal
    public function successTransaction(Order $order){
        $order->update(["is_paid" => true, "status" => 1]);// Paid, status changed to confirmed

//        dd($order->is_paid);
        $this->sendEmail($order);

        return redirect("/checkout/thank-you/")->with("notification","Success! You have successfully paid for your order. Please check your email.");
    }

    public function cancelTransaction(){
        return redirect("/checkout/thank-you/")->with("notification","Failed! Error during checkout");
    }

    public function thankYou(Request $request) {
        $status = $request->input('resultCode');
        $requestId = $request->input('requestId');
        $order = Order::where('id', $requestId)->first();

        if ($status == '0' ) {
            // Update order status
            $order->update(["is_paid" => true, "status" => 1]);

            // Send Email
            $this->sendEmail($order);
        }
        $notification = session("notification");
//        dd($request->all());
        return view("front.checkout.thank-you", compact("notification"));
    }

    //Send Email
    public function sendEmail($order) {
        $email_to = $order->email;
        $carts = Cart::content();
        $subtotal = str_replace(',', '', Cart::subtotal());

        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

//        dd($subtotal, $vatAmount, $total);

        Mail::send("front.checkout.email", compact("order", "carts","subtotal", "total", "vatRate", "vatAmount"),
            function ($message) use ($email_to, $order) {
                $message->from('ngomanhson2004txpt@gmail.com', 'Shop Runner');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification - #'.$order->id);
            }
        );
    }
}

