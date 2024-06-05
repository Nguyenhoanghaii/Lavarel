<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function note(Request $request)
    {
        // dd($request->all());
        $cart =  $request->session()->get('cart', []);
        $bill =  Bill::create([

            "name"=>$request->name,
            "gender" => $request->gender,
            "email" =>$request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'note'=> $request->note,
            'total'=> $request->total,
        ]);



        
        foreach($cart as $item){
            BillDetail::create([
                "quantity" => $item->quantity,
                "unit_price" => $item->unit_price,
                "id_bill" => $bill->id,
                "id_product" =>$item->id,
                
            ]);
        }


        return view('bread.pages.checkout');
    }
}
