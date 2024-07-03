<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'apiAuthenticate']);

Route::middleware('auth:api')->group(function () {


    Route::post('/search', [UserController::class, 'search']);
    Route::post('/save', [BillController::class, 'note'])->name('save-api');
    Route::get('/product/{id}', [ProductController::class, 'delete']);
    Route::get('/user/{id}', [UserController::class, 'deleUser']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);

    Route::post('/user/create', [UserController::class, 'apiCreateUser']);
    Route::post('/product/create', [ProductController::class, 'apiCreateProduct']);
    Route::post('/product/edit', [ProductController::class, 'apiEditProduct']);

    Route::post('/submit/{id}', [UserController::class, 'submit']);
});
