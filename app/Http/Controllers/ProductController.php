<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function index2() {
        dd("index2");
    }
    function index() {
        dd("index");
    }

    public function create(Request $request) {
        // dd($request->all());
        Product::create([
            "name" => $request->name,
            "price" => $request->price,
        ]);
    }
    public function create1() {
        return view('product.create');
    }
    function edit($id){
        $product=Product::find($id);
        $relative = $product->type_product->products->take(3);
        if($product){
            // $product->delete();
            return view('/bread/pages/product', compact('product', 'relative'));
        }
        else{
            echo"không có";
            return redirect()->back();
        }
    }

}
