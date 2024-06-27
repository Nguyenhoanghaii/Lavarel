<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function note(Request $request)
    {
        // dd($request->all());
        $cart =  Session::get('cart', []);
        $bill =  Bill::create([

            "name" => $request->name,
            "gender" => $request->gender,
            "email" => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'total' => $request->total,
            'id_customer' => Auth::id(),
        ]);




        foreach ($cart as $item) {
            BillDetail::create([
                "quantity" => $item->quantity,
                "unit_price" => $item->unit_price,
                "id_bill" => $bill->id,
                "id_product" => $item->id,

            ]);
        }

        Session::put('cart', []);
        Session::put('sl', 0);
        return view('bread.pages.checkout');
    }
    public function infobill()
    {
        $bill = Bill::with('billDetail.product.typeProduct')->get();

        return view('bread.pages.bill', compact('bill'));
    }

    function delete(Request $request, $id)
    {
        $bill = Bill::with('billDetail.product.typeProduct')->find($id);
        if ($bill) {
            $bill->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        };
    }
    function edit(Request $request, $id)
    {
        $bill = Bill::with('billDetail.product.typeProduct')->get()->where('id', $id);
        if ($bill) {
            // $bill->delete();
            return view('bread.pages.bill_edit', compact('bill'));
        } else {
            return redirect()->back();
        };
    }

    function submit(Request $request)
    {
        $bill = Bill::find($request->id);
        // $bill = BillDetail::find($id);
        // dd($request->all());
        $bill->update([
            "id" => $request->id,
            "name" => $request->name,
            "gender" => $request->gender,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "status" => $request->status,
            "total" => $request->total,
        ]);

        foreach ($request->all() as $key => $rq) {
            $arr = explode('-', $key);

            if (isset($arr[1])) {
                [$detailId, $detailValue] = $arr;
                BillDetail::find($detailId)->update([$detailValue => $rq]);
            }
        }

        // $bill->billDetail()->update([
        //     "id_product" => $request->id_product,
        //     "quantity" => $request->quantity,
        //     "total" => $request->product->name,
        //     "unit_price" => $request->unit_price,

        // ]);
        return redirect()->back();
    }
}
