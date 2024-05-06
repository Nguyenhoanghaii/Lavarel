<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Models\User;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/comment', [CommentController::class,'index3']);
Route::get('/user', [UserController::class,'index4']);

Route::prefix('/product')->group(function () {

    //CURD
    // C : create // post // ẩn thông tin khi client gửi vể
    // u : update // put //

    // r : read // get // show thông tin trên url
    // d : delete //delete
    Route::post('/create',[ProductController::class,'create'] )->name('product.create');
    Route::get('/create-product',[ProductController::class,'create1'] );


});

Route::prefix('/user')->group(function(){
    Route::post('/create',[UserController::class,'createUser'] )->name('user.create');
    Route::get('/create/user',[UserController::class,'index']);

});
Route::get('/comment/create',[CommentController::class,'create'] );


