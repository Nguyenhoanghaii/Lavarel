<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.create');
    }


    public function createUser(Request $request)
    {
        // dd($request->all());
        User::create([

            "email" => $request->email,
            "full_name" => $request->fullname,
            "password" => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->password,
        ]);
        return view('bread.pages.login');
    }

    public function apiCreateUser(UserCreateRequest $request)
    {
        $validate = $request->validate();

        dd($validate);
        // dd($request->all());
        $user = User::create([

            "email" => $request->email,
            "full_name" => $request->fullname,
            "password" => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->password,
        ]);
        return response()->json([
            "status" => true,
            "message" => "create success",
            "data" => User::all(),
        ]);
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

        return redirect()->back();
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


    public function deleUser($id)
    {

        $user = User::find($id);

        if (!$user) return response()->json([
            "status" => false,
            "message" => "not found",
        ]);

        $user->delete();
        return response()->json([
            "status" => true,
            "message" => "delete success",
            "data" => User::all()
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json([
            "status" => false,
            "message" => "not found",
        ]);
        return response()->json([
            "status" => true,
            // "message" => "delete success",
            "data" => $user
        ]);
    }
    public function submit($id, Request $request)
    {
        $user = User::find($id);
        if (!$user) return response()->json([
            "status" => false,
            "message" => "not found",
        ]);
        $user->update($request->all());
        return response()->json([
            "status" => true,
            // "message" => "delete success",
            "data" => $user
        ]);
    }
}
