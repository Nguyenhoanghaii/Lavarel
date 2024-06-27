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
}
