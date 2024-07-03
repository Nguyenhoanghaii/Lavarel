<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function delete($id)
    {
        $product = Product::find($id);

        if (!$product) return response()->json([
            "status" => false,
            "message" => "not found",
        ]);

        $product->delete();
        return response()->json([
            "status" => true,
            "message" => "delete success",
            "data" => Product::all()
        ]);
    }

    public function apiEditProduct($id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json([
            "status" => false,
            "message" => "not found",
        ]);
        return response()->json([
            "status" => true,
            // "message" => "delete success",
            "data" => $product
        ]);
    }


    public function apiCreateProduct(Request $request)
    {
        // $validate = $request->validate();

        // dd($validate);
        // dd($request->all());
        $product = Product::create([
            "name" => $request->name,
            "id_type" => $request->id_type,
            "unit_price" => $request->unit_price,
        ]);
        return response()->json([
            "status" => true,
            "message" => "create success",
            "data" => Product::all(),
        ]);
    }
}
