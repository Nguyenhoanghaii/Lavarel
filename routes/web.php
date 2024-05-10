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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/detail', [HomeController::class, 'detail']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::prefix('/product')->group(function () {
    // Route::post('/create',[ProductController::class,'create'] )->name('product.create');
    // Route::post('/edit',[ProductController::class,'submit'] )->name('product.edit');
    // Route::get('/create',[ProductController::class,'create1'] );
    // Route::get('/list',[ProductController::class,'getAll'] )->name('product.list');
    // Route::get('/delete/{id}',[ProductController::class,'delete'] );
    Route::get('/edit/{id}',[ProductController::class,'edit'] );    
});
