<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.create');
    }

   
    public function createUser(Request $request) {
        // dd($request->all());
        User::create([
            "email"=>$request->email,
            "name" => $request->name,
            "password" => $request->password,
        ]);
    }
}
