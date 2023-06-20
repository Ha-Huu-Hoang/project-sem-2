<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
class AccountController extends Controller
{

    private $userService;

    public function __construct(UserRepositoryInterface $userService)
    {
        $this->userService = $userService;
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
            'level'=> 2, //Account user
        ];

        if (Auth::attempt($credentials)) {
            return redirect("/"); // Go to home
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
            'level' => 2, // Account User
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


}
