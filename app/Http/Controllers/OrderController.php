<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    function create(Request $request) {
        $order = Order::create($request->all());
        $request->session()->forget('cart');
        return redirect()->route('home');
    }
}
