<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $bestSelling = Product::where('category', 'best_selling')->get();
        $starSeller = Product::where('category', 'star_seller')->get();
        $promo = Product::where('category', 'promo')->get();
        $related = Product::where('category', 'related')->get();

        return response()->json([
            'best_selling' => $bestSelling,
            'star_seller' => $starSeller,
            'promo' => $promo,
            'related' => $related,
        ]);
    }

    public function search(Request $request)
{
    $query = Product::query();

    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->has('category')) {
        $query->where('category', $request->category);
    }

    $products = $query->get();
    return response()->json($products);
}
}