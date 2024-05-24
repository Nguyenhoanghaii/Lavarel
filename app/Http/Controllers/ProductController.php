<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function index2()
    {
        dd("index2");
    }
    function index()
    {
        dd("index");
    }

    public function create(Request $request)
    {
        // dd($request->all());
        Product::create([
            "name" => $request->name,
            "price" => $request->price,
        ]);
    }
    public function create1()
    {
        return view('product.create');
    }

    public function add(Request $request, $id)
    {
        // 1. get id
        //2 . tim san pham
        $product = Product::find($id);
        //2.5 kiem tra co ton tai trong session chua, neu co thi so luong + 1

        //3. luu san pham vao session
        $cart = $request->session()->get('cart', []);//tim trong session co ten cart chua, neu co tra ve gia tri truoc do, con k thi tra ve mang rong
        array_push($cart, $product);
        //    if (count($cart) == 0) {
        //    }
        $request->session()->put('cart', $cart);
        //return ve home back ve trang truoc


        return redirect()->back();
    }
}
