<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;

// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Detail Produk
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product.detail');

// Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Register Page
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ulasan (Review) Page
Route::get('/review/{order_id}', function ($order_id) {
    return view('review-product', ['order_id' => $order_id]);
})->name('review.product');

// Dummy Routes
Route::get('/search', function () {
    return "Halaman Pencarian Akan Datang";
})->name('search');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/profile', function () {
    return "Halaman Profil Akan Datang";
})->name('profile');

Route::get('/shop', function () {
    return "Halaman Toko Akan Datang";
})->name('shop');

// API Routes
Route::prefix('api')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/products/search', [HomeController::class, 'search']);

    Route::get('/products/{id}', [ProductController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/cart', [CartController::class, 'store']);
        Route::put('/cart/{id}', [CartController::class, 'update']);
        Route::delete('/cart/{id}', [CartController::class, 'destroy']);

        Route::post('/checkout', [OrderController::class, 'store']);
        Route::get('/orders/{id}/status', [OrderController::class, 'status']);

        Route::post('/reviews', [ReviewController::class, 'store']);
        Route::post('/rewards', [RewardController::class, 'store']);
    });

    Route::post('/contact', [ContactController::class, 'store']);
});
