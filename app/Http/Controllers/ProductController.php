<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function show($slug)
    {
        // Ambil data produk berdasarkan slug
        $product = Product::where('slug', $slug)->with('reviews')->firstOrFail();

        // Ambil review terkait produk, urutkan berdasarkan jumlah like (terbanyak)
        $reviews = Review::where('product_id', $product->id)
                         ->orderByDesc('likes')
                         ->take(5)
                         ->get();

        // Kirim data ke view
        return view('produk_detail', [
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }
}
