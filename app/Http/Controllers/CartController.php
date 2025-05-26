<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan halaman keranjang (Blade)
    public function index()
    {
        return view('cart.index'); // tampilan keranjang
    }

    // Mengambil data keranjang (JSON untuk API)
    public function list(Request $request)
    {
        $carts = Cart::where('user_id', $request->user()->id)->with('product')->get();
        return response()->json($carts);
    }

    public function store(Request $request)
    {
        
    }
}