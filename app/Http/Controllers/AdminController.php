<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
   public function home(){
        $product = Product::all()->count();
        $bill = Bill::all()->count();
        $user = User::all()->count();
        return view('admin.index', compact('product','bill','user'));
   }
   public function table(){
        $infoProduct = Product::all();

        return view('admin.simple', compact('infoProduct'));
   }
   public function order(){
     $infobill = Bill::all();
        return view('admin.order', compact('infobill'));
   }
   
   public function user(){
     $infoUser = User::all();
        return view('admin.user', compact('infoUser'));
   }
}
