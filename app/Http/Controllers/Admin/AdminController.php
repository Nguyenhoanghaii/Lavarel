<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('bread.admin.pages.index');
    }

    function table() {
        return view('bread.admin.pages.tables.basic-table');
    }

    function login() {
        return view('bread.admin.pages.user-pages.login');
    }

    function register() {
        return view('bread.admin.pages.user-pages.register');
    }
}
