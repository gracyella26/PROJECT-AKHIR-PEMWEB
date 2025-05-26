<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CheckoutController extends Controller
{
    public function index()
    {
        $checkoutItems = [
            ['name' => 'Olive Oil Soap', 'price' => 15000, 'quantity' => 1, 'image' => 'olive-oil-soap.png'],
            ['name' => 'Lavender Soap', 'price' => 20000, 'quantity' => 1, 'image' => 'lavender-soap.png'],
            ['name' => 'Pure Leaf Soap', 'price' => 17000, 'quantity' => 1, 'image' => 'pure-leaf-soap.png'],
        ];
        $totalPrice = 52000; // Total price from items
        return view('checkout', compact('checkoutItems', 'totalPrice'));
    }

    public function shipping()
    {
        return view('shipping'); // Buat view shipping.blade.php jika belum ada
    }

    public function buyNow(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);
    $quantity = $request->quantity;
    $totalPrice = $product->price * $quantity;

    $checkoutItems = [
        [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'image' => $product->image,
        ]
    ];

    return view('checkout', compact('checkoutItems', 'totalPrice'));
}
}