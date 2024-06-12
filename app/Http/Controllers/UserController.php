<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('user.create');
    }

   
    public function createUser(Request $request) {
        // dd($request->all());
        User::create([

            "email"=>$request->email,
            "full_name" => $request->fullname,
            "password" =>bcrypt($request->password),
            'phone'=> $request->phone,
            'address'=> $request->password,
        ]);
        return view('bread.pages.login');
    }
    public function create()
    {
        return view('bread.pages.signup');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function login()
    {
        return view('bread.pages.login');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
public function checkout()
    {
        return view('bread.pages.checkout');
    }
   

    // public function createUser(Request $request)
    // {   
    //     User::create([
            
    //     'name'=> $request->name,
    //     'email'=> $request->product_id,
    //     'password'=> $request->product_id,
    //     ]);
    //     return view('bread.pages.signup');
    // }
}
