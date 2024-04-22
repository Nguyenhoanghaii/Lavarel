<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function index2() {
        dd("index2");
    }
    function index() {
        dd("index");
    }
    function index4() {
        dd(User::all());
    }
    public function create() {
        User::create([
            "name" => "Hai",
            "email"=>"hoanghaiiduoi@gmail.com",
            "password"=>"0111111"
        ]);
    }

    
}
