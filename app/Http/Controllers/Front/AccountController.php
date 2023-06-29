<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Service\Order\OrderServiceInterface;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
class AccountController extends Controller
{

    private $userService;
    private $orderService;

    public function __construct(UserRepositoryInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function login() {
        return view("front.account.login");
    }

    public function checkLogin(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",

        ], [
            "required" => "Please enter full information.",
            "min"=>"Please enter at least :min characters.",
            "email" => "Please enter a valid email address.",
        ]);

        $credentials =[
            'email'=> $request->email,
            'password'=> $request->password,
            'level'=> Constant::user_level_client,
        ];

        if (Auth::attempt($credentials)) {
            return redirect("/");
        } else {
            return back()->with('notification', 'ERROR: Email or password is wrong');
        }
    }

    public function logout() {
        Auth::logout();

        return back();
    }

    public function register() {
        return view("front.account.register");
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
        ], [
            "required" => "Please enter full information.",
            "min" => "Please enter at least :min characters.",
            "email" => "Please enter a valid email address.",
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client, // Account User
        ];

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect("/account/register")->with('notification', 'Email already exists.')->withInput();
        }

        try {
            $this->userService->create($data);
            return redirect("/account/login")->with('success', 'Register Success! Please login.');
        } catch (\Exception $e) {
            return redirect("/account/register")->with('notification', 'An error occurred. Please try again.')->withInput();
        }
    }

    public function myOrder()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $orders = $this->orderService->getOrderByUserId($user_id);
            return view("front.account.my-order.index", compact('orders'));
        } else {
            return view("front.account.login");
        }
    }

    public function orderDetail($id, Request $request)
    {
        $order = $this->orderService->find($id);

        $subtotal = 0;
        $vatRate = 0.1;
        $vatAmount = 0;
        $shippingFee = 0;
        $total = 0;

        foreach ($order->orderDetails as $orderDetail) {
            $subtotal += $orderDetail->total;
        }

        $vatAmount = $subtotal * $vatRate;
        $shippingFee = $request->session()->get('shipping_fee', 0);
        $total = $subtotal + $vatAmount + $shippingFee;

        return view("front.account.my-order.detail", compact('order', 'subtotal', 'vatAmount', 'total', 'shippingFee'));
    }

}
