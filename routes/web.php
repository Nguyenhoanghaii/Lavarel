<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index']);
Route::get('/comment', [CommentController::class,'index3']);
Route::get('/user', [UserController::class,'index4']);

Route::get('/product/create',[ProductController::class,'create'] );
Route::get('/product/create1',[ProductController::class,'create1'] );
Route::get('/user/create',[UserController::class,'create'] );
Route::get('/comment/create',[CommentController::class,'create'] );


