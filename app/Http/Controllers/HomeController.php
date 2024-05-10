<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $slides = Slide::all();
        $newProducts = Product::where('new', 1)->limit(4)->get()->toArray();


        $topProducts = Product::orderBy('unit_price', 'desc')->limit(8)->get()->toArray();

        $top1 = array_slice($topProducts, 0, 4);
        $top2 = array_slice($topProducts, 4, 7);
        return view('bread.pages.index', compact('slides', 'newProducts', 'top1', 'top2'));

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
