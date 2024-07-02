<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/test-login', function() {
    $user = User::first();

    $user->token = $user->createToken("token")->accessToken;
    return response()->json($user);
});
Route::middleware('auth:api')->group(function() {
    Route::get('/test-auth', function() {
        $user = Auth::user();
        return response()->json($user);
    });
    Route::get('/product-with-pagination', [ProductController::class, 'products']);
});

Route::post('/create-payment-link', [CheckoutController::class, 'createPaymentLink']);

Route::prefix('/payos')->group(function () {
    Route::post('/create', [OrderController::class, 'createOrder']);
    Route::get('/{id}', [OrderController::class, 'getPaymentLinkInfoOfOrder']);
    Route::put('/{id}', [OrderController::class, 'cancelPaymentLinkOfOrder']);
});

Route::prefix('/payment')->group(function () {
    Route::post('/payos', [PaymentController::class, 'handlePayOSWebhook']);
});
