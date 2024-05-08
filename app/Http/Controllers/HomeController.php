<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $slides = Slide::all();
        return view('bread.pages.index', compact('slides'));
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
