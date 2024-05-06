<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('bread.pages.index');
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
