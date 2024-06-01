<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $product = Product::limit(4)->get();
        return view('bread.pages.index', compact('product'));
    }
    function detail($id)
    {
        $product = Product::find($id);
        $bestSeller = Product::limit(4)->where('unit_price', '>=', 170000)->get();
        return view('bread.pages.product', compact('product', 'bestSeller'));
    }
    function login()
    {
        return view('bread.pages.login');
    }

    function register()
    {
        return view('bread.pages.signup');
    }

    function contact()
    {
        return view('bread.pages.contacts');
    }

    function about()
    {
        return view('bread.pages.about');
    }
    function cart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart =  $request->session()->get('cart', []);
        $sl =  $request->session()->get('sl', 0);
        if (!isset($cart[$id])) {

            $product->quantity = 1;
            $cart[$id] = $product;
        } else {
            $cart[$id]->quantity++;
        }
        $sl ++;
        $request->session()->put('cart', $cart);
        $request->session()->put('sl', $sl);
        return redirect()->back();
    }
    function remove(Request $request, $id)
    {
        $cart =  $request->session()->get('cart', []);
        $sl =  $request->session()->get('sl', 0);
        // unset($cart[$id]);
       
        if ($cart[$id]->quantity > 1) {
            $cart[$id]->quantity--;
            
        } else {
            unset($cart[$id]);
        }
        $sl --;
        $request->session()->put('cart', $cart);
        $request->session()->put('sl', $sl);
        return redirect()->back();
    }

    function flushSession(Request $request)
    {
        $request->session()->flush();
    }

    function create()
    {
        return view('bread.pages.signup');
    }

    function createUser()
    {   
        User::create(){
        'name',
        'email',
        'password',
        };
        return view('bread.pages.signup');
    }
}
