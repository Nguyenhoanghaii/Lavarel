<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    function create(Request $request) {
        $carts = $request->cart ?? '[]';
        $carts = json_decode($carts, true);
        $order = Order::create($request->all());

        if (count ($carts) > 0) {
            $data = [];
            foreach ($carts as $cart) {
                array_push($data, [
                    'order_id' => $order->id,
                    'product_id' => $cart['id'],
                    'quantity' => $cart['quantity'],
                ]);
            };
            $cartDetail = CartDetail::insert($data);
        }
        $request->session()->forget('cart');
        return redirect()->route('home');
    }
}
