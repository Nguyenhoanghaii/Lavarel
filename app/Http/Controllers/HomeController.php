<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $product=Product::limit(4)->get();
       
        return view('bread.pages.index',compact('product'));

    }
    function detail($id) {
        $product=Product::find($id);
        
        
        return view('bread.pages.product',compact('product'));

    }

    function login() {
        return view('bread.pages.login');
    }

    function register() {
        return view('bread.pages.signup');
    }

    function contact() {
        return view('bread.pages.contacts');
    }

    function about() {
        return view('bread.pages.about');
    }

}
