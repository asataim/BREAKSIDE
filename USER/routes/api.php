<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Api\UserApiController;

Route::get('/produk', [ProductController::class, 'index']);
Route::get('/produk/{id}', [ProductController::class, 'show']);


Route::get('/keranjang/{userId}', [CartController::class, 'index']);
Route::post('/keranjang', [CartController::class, 'addToCart']);
Route::delete('/keranjang/{id}', [CartController::class, 'removeFromCart']);

Route::post('/checkout', [CheckoutController::class, 'checkout']);

Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');

// New API routes for communication with ADMIN application
Route::prefix('user')->group(function () {
    Route::get('/admin/products', [UserApiController::class, 'getAdminProducts']);
    Route::get('/admin/products/{id}', [UserApiController::class, 'getAdminProduct']);
    Route::get('/admin/orders', [UserApiController::class, 'getAdminOrders']);
    Route::get('/admin/orders/{id}', [UserApiController::class, 'getAdminOrder']);
});