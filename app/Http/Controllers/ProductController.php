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

    public function create() {
        Product::create([
            "name" => "product1",
            "price" => 100.7,
        ]);
    }
    public function create1() {
        Product::create([
            "name" => "product2",
            "price" => 200.7,
        ]);
    }

    
}
