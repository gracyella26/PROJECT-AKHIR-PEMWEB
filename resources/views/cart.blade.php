@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('styles')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .cart-page-content {
            background-color: #f8f8f8;
            padding: 80px 0 40px 0; /* Padding atas untuk header fixed */
            min-height: calc(100vh - 300px);
        }

        .cart-header-table {
            display: flex;
            background-color: #3B5D50; /* Hijau tua seperti header situs */
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px;
            font-weight: 600;
            margin-bottom: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            font-size: 1em;
        }

        .cart-header-table .col-product { flex: 5; text-align: left; padding-left: 50px; }
        .cart-header-table .col-price { flex: 2; text-align: center; }
        .cart-header-table .col-quantity { flex: 2; text-align: center; }
        .cart-header-table .col-actions { flex: 1; text-align: center; }

        .cart-item-list {
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 0;
        }

        .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
            margin-bottom: 0;
            transition: background-color 0.2s ease;
        }

        .cart-item:hover {
            background-color: #f9f9f9;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item .col-checkbox {
            flex: 0.5;
            text-align: center;
        }

        .cart-item .col-product-info {
            flex: 4.5;
            display: flex;
            align-items: center;
        }

        .cart-item-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
            border: 1px solid #ddd;
            background-color: #f0f0f0;
        }

        .product-details h4 {
            margin: 0;
            font-size: 1.1em;
            color: #333;
            font-weight: 500;
        }

        .product-details p {
            margin: 0;
            font-size: 0.9em;
            color: #888;
        }

        .cart-item .col-price {
            flex: 2;
            text-align: center;
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
        }

        .cart-item .col-quantity-control {
            flex: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            background-color: #e0e0e0;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 1em;
            color: #555;
            transition: background-color 0.2s ease;
        }

        .quantity-btn:hover {
            background-color: #d0d0d0;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            -moz-appearance: textfield;
        }

        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .cart-item .col-actions {
            flex: 1;
            text-align: center;
        }

        .delete-btn {
            background: none;
            border: none;
            color: #FF7F50;
            font-size: 1.4em;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .delete-btn:hover {
            color: #e66a3e;
        }

        .buy-now-section {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
            padding: 20px 0;
        }

        .buy-now-btn {
            background-color: #3B5D50;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 30px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .buy-now-btn:hover {
            background-color: #2a4138;
            transform: scale(1.02);
        }

        @media (max-width: 768px) {
            .cart-page-content {
                padding: 60px 0 20px 0;
            }

            .cart-header-table {
                display: none;
            }

            .cart-item {
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 15px;
            }

            .cart-item .col-checkbox,
            .cart-item .col-product-info,
            .cart-item .col-price,
            .cart-item .col-quantity-control,
            .cart-item .col-actions {
                flex: none;
                width: 100%;
                text-align: left;
                margin-bottom: 10px;
            }

            .cart-item .col-product-info {
                order: 1;
                margin-bottom: 15px;
            }

            .cart-item .col-checkbox {
                order: 0;
                width: auto;
                margin-right: 15px;
            }

            .cart-item .col-price {
                order: 3;
                width: 50%;
                text-align: right;
            }

            .cart-item .col-quantity-control {
                order: 2;
                width: 40%;
                justify-content: flex-start;
            }

            .cart-item .col-actions {
                order: 4;
                width: auto;
                text-align: right;
            }

            .buy-now-section {
                justify-content: center;
            }

            .buy-now-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endsection

@section('content')
<div class="cart-page-content">
    <div class="container">
        <div class="cart-header-table">
            <div class="col-product">Product</div>
            <div class="col-price">Price</div>
            <div class="col-quantity">Quantity</div>
            <div class="col-actions">Actions</div>
        </div>

        <div class="cart-item-list">
            @forelse($cartItems as $item)
            <div class="cart-item">
                <div class="col-checkbox">
                    <input type="checkbox" checked>
                </div>
                <div class="col-product-info">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-img">
                    <div class="product-details">
                        <h4>{{ $item['name'] }}</h4>
                        <p>{{ $item['store'] }}</p>
                    </div>
                </div>
                <div class="col-price">
                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                </div>
                <div class="col-quantity-control">
                    <button class="quantity-btn">-</button>
                    <input type="number" class="quantity-input" value="{{ $item['quantity'] }}" min="1">
                    <button class="quantity-btn">+</button>
                </div>
                <div class="col-actions">
                    <button class="delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
            @empty
            <div class="cart-item">
                <p style="text-align: center; width: 100%; color: #888;">Keranjang Anda kosong.</p>
            </div>
            @endforelse
        </div>

        <div class="buy-now-section">
            <button class="buy-now-btn">Buy Now</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityControls = document.querySelectorAll('.cart-item .col-quantity-control');

            quantityControls.forEach(control => {
                const minusBtn = control.querySelector('.quantity-btn:first-child');
                const plusBtn = control.querySelector('.quantity-btn:last-child');
                const quantityInput = control.querySelector('.quantity-input');

                minusBtn.addEventListener('click', function() {
                    let currentQuantity = parseInt(quantityInput.value);
                    if (currentQuantity > 1) {
                        quantityInput.value = currentQuantity - 1;
                    }
                });

                plusBtn.addEventListener('click', function() {
                    let currentQuantity = parseInt(quantityInput.value);
                    quantityInput.value = currentQuantity + 1;
                });

                quantityInput.addEventListener('change', function() {
                    if (parseInt(quantityInput.value) < 1 || isNaN(parseInt(quantityInput.value))) {
                        quantityInput.value = 1;
                    }
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to remove this item from your cart?')) {
                        this.closest('.cart-item').remove();
                    }
                });
            });
        });
    </script>
@endsection