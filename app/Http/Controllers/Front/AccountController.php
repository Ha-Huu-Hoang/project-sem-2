<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login() {
        return view("front.account.login");
    }

    public function checkLogin(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required",

        ], [
            "required" => "Please enter full information"
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

    public function register() {
        return view("front.account.register");
    }

    public function logout() {
        Auth::logout();

        return back();
    }

}
