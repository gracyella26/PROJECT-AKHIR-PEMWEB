<?php

use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Detail Produk
Route::get('/product/{slug}', function ($slug) {
    // Nanti akan ada logika untuk mengambil data produk dari database
    return view('product-detail', ['slug' => $slug]);
})->name('product.detail');

// Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Register Page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Ulasan (Review) Page
Route::get('/review/{order_id}', function ($order_id) {
    // Nanti akan ada logika untuk mengambil data order/produk untuk review
    return view('review-product', ['order_id' => $order_id]);
})->name('review.product');

// Dummy Routes for Header Icons
Route::get('/search', function () {
    return "Halaman Pencarian Akan Datang";
})->name('search');

Route::get('/cart', function () {
    return "Halaman Keranjang Akan Datang";
})->name('cart');

Route::get('/profile', function () {
    return "Halaman Profil Akan Datang";
})->name('profile');

Route::get('/shop', function () {
    return "Halaman Toko Akan Datang";
})->name('shop');