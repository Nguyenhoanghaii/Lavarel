<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Methods', '*');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
// Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/cart/{id}', [HomeController::class, 'cart']);
Route::get('/flushSession', [HomeController::class, 'flushSession']);
Route::get('/remove/{id}', [HomeController::class, 'remove']);
Route::post('/register/user', [UserController::class, 'createUser'])->name('user.create');
Route::get('/register/user', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'authenticate'])->name('loginUser');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
Route::post('/save', [BillController::class, 'note'])->name('save');
Route::get('/save', [BillController::class, 'note']);
Route::get('/infobill', [BillController::class, 'infobill']);
Route::get('/delete/{id}', [BillController::class, 'delete']);
Route::get('/edit/{id}', [BillController::class, 'edit']);
Route::get('/sunmit', [BillController::class, 'submit']);


Route::prefix('admin')->group(function () {
    Route::get('/', function () {

        dd('ok');
    });
    Route::get('/listBill', function () {
        $id = 4;
        $bill = BillDetail::get()->where('id_bill', $id);
        foreach ($bill as $item) {
            $product = Product::find($item->id_product);
            echo ($product->name . '</br>');
        }
        //
    });
    Route::get('/billdetail/{id}', function ($id) {
        // $id = 4;
        // $bill = BillDetail::get()->where('id_bill',$id);
        // foreach ($bill as $item) {
        //     $product = Product::find($item->id_product);
        //     echo($product->name .'</br>');
        // }


        // hiển thị thông tin bill cùng các sản phẩm trong bill đó
        // bill : tên khách, tổng đơn, địa chỉ ,..
        // sản phẩm : tên giá, sl

        // Bill : DOAN CAN TINH | 50000 | da nang | ...
        // San pham : Ten | 1000 | 3
        // San pham : Ten | 1000 | 3
        // San pham : Ten | 1000 | 3
        // San pham : Ten | 1000 | 3

        //    $id = 11;
        //    $bill = BillDetail::get()->where('id_bill','id_customer',$id);
        //    $bill = BillDetail::find($id);

        //    //db của id_bill 

        //    foreach ($bill as $item) {
        //         $product = Product::find($item->id_product);
        //         $info = User::find($item->id_customer);

        //         echo($product->name  .'</br>');
        //     };
        //     echo($info->full_name.'                  |                  '.$info->email.'                  |                  '.$info->phone.'                  |                  '.$info->address.'</br>' );
        $bill = Bill::find($id);
        echo ('Bill:  ' . $bill->name . ' | ' . $bill->phone . ' | '  . $bill->email . '</br>');
        $bill = BillDetail::get()->where('id_bill', $id);
        foreach ($bill as $item) {
            $product = Product::find($item->id_product);

            echo ('Sản phẩm: ' . $product->name . ' | '  . $item->unit_price . ' | '  . $item->quantity  . '</br>');
        };
    });

    Route::get('/billupdate/{id}', function ($id) {
        $bill = Bill::find($id);
        if ($bill->status == 0) {
            $bill->status = 1;
            $bill->save();
        } else {
            return $bill->status;
        }
        echo ($bill);
    });
    Route::get('/dashboard', function () {
        $total = 0;
        $bill = Bill::get()->where('status', 1);
        $sl = 0;
        /// số đơn đã gia : 9
        /// tổng doanh thu : 50000
        // sản phẩm bán chạy nhất : sôcla

        $temp = Bill::select('gender', DB::raw('count("gender") as total'))
            ->groupBy('gender')
            ->get()->toArray();
        echo ('Số lượng nữ: ' . $temp[0]['total'] . '</br>' . 'Số lượng nam: ' . $temp[1]['total'] . '</br>');
        $quantity = BillDetail::select('id_product', DB::raw('sum(quantity) as total'))
            ->groupBy('id_product')
            ->get()->toArray();
        $index = 0;
        
        $defaultValue = $quantity[$index]['total'];
        $defaultID = $quantity[$index]['id_product'];
        foreach ($quantity as $key => $vale) {
            if ($vale['total'] > $defaultValue) {
                
                $index = $key;
                $defaultValue = $vale['total'];
                $defaultID = $vale['id_product'];
                }
                }
            $product = Product::find($defaultID);

        echo 'id sản phẩm bán chạy nhất : ' . $defaultID . 'Tên sản phẩm :' . $product->name    ; 
        dd('Số đơn đã giao: ', $quantity);
        // khach hang nam : 6
        // khach hang nu : 7

        // $billDetail = BillDetail::
        // $quantity=0;

        // if
        foreach ($bill as $item) {

            $total += $item->total;
            $sl++;
        };
        echo ('Số đơn đã giao: ' . $sl .  '</br>' . 'Tổng doanh thu: ' . $total);
    });
    
});
