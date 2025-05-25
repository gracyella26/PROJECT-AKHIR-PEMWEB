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