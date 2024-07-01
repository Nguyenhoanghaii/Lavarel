<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    function login() {
        return view('bread.pages.login');
    }

    function postLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken("token")->accessToken;
            Cookie::queue('api_token', $token, 60, null, null, false, false);
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    function postLogout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

    function register() {
        return view('bread.pages.signup');
    }


    function postRegister(Request $request) {
        User::create([
            "email"=>$request->email,
            "full_name" => $request->name,
            "password" => bcrypt($request->password),
            "phone" => $request->phone,
            "address" => $request->address
        ]);

        return redirect()->route('login');
    }
}
