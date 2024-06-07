<?php

<<<<<<< Updated upstream
use App\Http\Controllers\BillController;
=======
use App\Http\Controllers\CartController;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
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

=======
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cart/{id}', [HomeController::class, 'cart']);
>>>>>>> Stashed changes


