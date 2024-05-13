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
Route::get('/product/{id}', [HomeController::class, 'detail']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::controller(UserController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'postLogin')->name('postLogin');
    Route::get('/logout', 'postLogout')->name('logout');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'postRegister')->name('postRegister');
});
