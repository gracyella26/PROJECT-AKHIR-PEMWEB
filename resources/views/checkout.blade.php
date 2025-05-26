@extends('layouts.app')

@section('title', 'Checkout')

@section('styles')
    <style>
        .checkout-page-content {
            padding: 40px 0;
            background-color: #f8f8f8;
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .checkout-sidebar {
            padding-right: 20px;
            border-right: 1px solid #eee;
        }

        .checkout-sidebar h3 {
            font-size: 1.3em;
            color: #333;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .order-summary-left {
            margin-top: 30px;
        }

        .summary-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .summary-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-left: 15px;
            border: 1px solid #ddd;
        }

        .summary-item-details {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .summary-item-details h4 {
            margin: 0;
            font-size: 1.1em;
            color: #333;
        }

        .summary-item-details p {
            margin: 0;
            font-size: 0.9em;
            color: #888;
        }

        .summary-item-details .quantity-actions {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #555;
            font-size: 0.9em;
            z-index: 1;
        }

        .summary-item-details .quantity-actions .qty-display {
            font-weight: 600;
            margin: 0 5px;
        }

        .summary-item-details .qty-btn, .summary-item-details .delete-btn {
            background: none;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            color: #666;
            transition: color 0.2s ease, background-color 0.2s ease;
            padding: 5px 10px;
            z-index: 1;
        }

        .summary-item-details .qty-btn:hover {
            color: #333;
            background-color: #f0f0f0;
        }

        .summary-item-details .delete-btn {
            font-size: 1.2em;
            color: #FF7F50;
            margin-left: 10px;
        }

        .summary-item-details .delete-btn:hover {
            color: #e66a3e;
            background-color: #f0f0f0;
        }

        .summary-total,
        .summary-shipping-cost,
        .summary-grand-total {
            border-top: 1px solid #eee;
            padding-top: 20px;
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.3em;
            font-weight: 700;
            color: #333;
        }

        .summary-grand-total {
            color: #3B5D50;
        }

        .checkout-main {
            padding-left: 20px;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            color: #aaa;
            position: relative;
            font-size: 0.9em;
            font-weight: 500;
        }

        .progress-step .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #eee;
            color: #888;
            margin: 0 auto 10px;
            font-size: 1em;
        }

        .progress-step.active .icon-container {
            background-color: #3B5D50;
            color: white;
        }

        .progress-step.completed .icon-container {
            background-color: #3B5D50;
            color: white;
        }

        /* Tampilkan centang untuk langkah yang selesai */
        .progress-step.completed .icon-container::before {
            content: "✔";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        /* Tampilkan angka untuk langkah yang belum selesai (bukan active atau completed) */
        .progress-step:not(.active):not(.completed) .icon-container::after {
            content: attr(data-step);
            font-family: Arial, sans-serif;
        }

        /* Hapus centang dan angka tambahan pada langkah aktif */
        .progress-step.active .icon-container::before,
        .progress-step.active .icon-container::after {
            content: none;
        }

        .progress-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 15px;
            left: calc(50% + 15px);
            width: calc(100% - 60px);
            height: 2px;
            background-color: #eee;
            z-index: -1;
        }

        .progress-step.active, .progress-step.completed {
            color: #3B5D50;
            font-weight: 600;
        }

        .progress-step.completed::after {
            background-color: #3B5D50;
        }

        .form-section h3 {
            font-size: 1.4em;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            box-sizing: border-box;
        }

        .form-group.half-width {
            display: flex;
            gap: 20px;
        }

        .form-group.half-width > div {
            flex: 1;
        }

        .address-option, .shipping-option {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            cursor: pointer;
            transition: border-color 0.2s ease, background-color 0.2s ease;
        }

        .address-option:hover, .shipping-option:hover {
            border-color: #3B5D50;
        }

        .address-option input[type="radio"], .shipping-option input[type="radio"] {
            margin-right: 15px;
            margin-top: 2px;
        }

        .address-details h4, .shipping-details h4 {
            margin: 0;
            font-size: 1.1em;
            color: #333;
        }

        .address-details p, .shipping-details p {
            margin: 5px 0 0;
            font-size: 0.9em;
            color: #666;
        }

        .shipping-details strong {
            display: block;
            margin-top: 5px;
            font-size: 1.1em;
            color: #333;
        }

        .shipping-price {
            margin-left: auto;
            font-size: 1.2em;
            font-weight: 600;
            color: #3B5D50;
        }

        .shipping-price.free {
            color: #4CAF50;
        }

        .coupon-section {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .coupon-section input[type="text"] {
            flex-grow: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
        }

        .coupon-section button {
            background-color: #6c757d;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .coupon-section button:hover {
            background-color: #5a6268;
        }

        .continue-btn {
            background-color: #3B5D50;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 300px;
            margin-top: 20px;
        }

        .continue-btn:hover {
            background-color: #2a4138;
        }

        .checkout-tabs {
            margin-bottom: 30px;
        }

        .checkout-tabs ul {
            list-style: none;
            padding: 0;
            display: flex;
            background-color: #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }

        .checkout-tabs li {
            flex: 1;
            text-align: center;
        }

        .checkout-tabs li a {
            display: block;
            padding: 15px 0;
            text-decoration: none;
            color: #555;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .checkout-tabs li.active a {
            background-color: #3B5D50;
            color: white;
        }

        .checkout-content-section {
            display: none;
        }

        .checkout-content-section.active {
            display: block;
        }

        .payment-section {
            display: flex;
            gap: 30px;
        }

        .left-section, .right-section {
            flex: 1;
        }

        .payment-section-content h2 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 10px;
        }

        .payment-section-content p {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 20px;
        }

        .payment-methods .payment-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f5f5f5;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .payment-methods .payment-option:hover {
            background-color: #e0e0e0;
        }

        .payment-methods .payment-option .payment-left {
            display: flex;
            align-items: center;
        }

        .payment-methods .payment-option .payment-radio {
            width: 20px;
            height: 20px;
            border: 2px solid #3B5D50;
            border-radius: 50%;
            margin-right: 10px;
            position: relative;
        }

        .payment-methods .payment-option.selected .payment-radio::after {
            content: '';
            width: 12px;
            height: 12px;
            background-color: #3B5D50;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .payment-methods .payment-option .payment-info h4 {
            margin: 0;
            font-size: 1.1em;
            color: #333;
        }

        .payment-methods .payment-option .payment-info p {
            margin: 0;
            font-size: 0.9em;
            color: #666;
        }

        .payment-methods .payment-option .payment-icons {
            display: flex;
            gap: 5px;
        }

        .payment-methods .payment-option .payment-icon {
            padding: 5px 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9em;
            color: #333;
        }

        .credit-card {
            width: 100%;
            max-width: 300px;
            height: 180px;
            background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
            border-radius: 10px;
            padding: 20px;
            color: #fff;
            margin-bottom: 20px;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .credit-card .card-chip {
            width: 40px;
            height: 30px;
            background: linear-gradient(145deg, #b7b7b7, #e0e0e0);
            border-radius: 5px;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .credit-card .card-number {
            font-size: 1.2em;
            letter-spacing: 2px;
            margin-top: 60px;
            text-align: center;
        }

        .credit-card .card-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .credit-card .card-info {
            font-size: 0.9em;
        }

        .credit-card .mastercard-logo {
            display: flex;
            align-items: center;
        }

        .credit-card .mastercard-logo .mc-circles {
            display: flex;
            gap: 5px;
        }

        .credit-card .mastercard-logo .mc-circle {
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }

        .credit-card .mastercard-logo .mc-red {
            background-color: #eb001b;
        }

        .credit-card .mastercard-logo .mc-orange {
            background-color: #f79e1b;
        }

        .credit-card .mastercard-logo .mc-text {
            font-size: 0.8em;
            margin-left: 5px;
        }

        .card-details {
            margin-top: 20px;
        }

        .card-details h3 {
            font-size: 1.3em;
            color: #333;
            margin-bottom: 15px;
        }

        .card-details .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .card-details .form-row .form-group {
            flex: 1;
        }

        .card-details input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
        }

        .card-details .checkbox-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-details .checkbox-wrapper input[type="checkbox"] {
            margin-right: 10px;
        }

        .card-details .checkbox-wrapper label {
            font-size: 0.9em;
            color: #555;
        }

        .card-details .confirm-btn {
            background-color: #3B5D50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 200px;
            z-index: 10;
        }

        .card-details .confirm-btn:hover {
            background-color: #2a4138;
        }

        @media (max-width: 992px) {
            .checkout-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            .checkout-sidebar {
                border-right: none;
                padding-right: 0;
                border-bottom: 1px solid #eee;
                padding-bottom: 30px;
            }
            .checkout-main {
                padding-left: 0;
            }
            .progress-bar {
                flex-wrap: wrap;
                gap: 15px;
            }
            .progress-step {
                flex: none;
                width: 45%;
            }
            .progress-step:not(:last-child)::after {
                display: none;
            }
            .checkout-tabs ul {
                flex-direction: column;
            }
            .checkout-tabs li {
                border-bottom: 1px solid #ccc;
            }
            .checkout-tabs li:last-child {
                border-bottom: none;
            }
            .payment-section {
                flex-direction: column;
            }
            .credit-card {
                max-width: 100%;
            }
            .card-details .form-row {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 576px) {
            .form-group.half-width {
                flex-direction: column;
                gap: 0;
            }
            .progress-step {
                width: 100%;
            }
            .coupon-section {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('content')
<div class="checkout-page-content">
    <div class="container checkout-layout">
        <div class="checkout-sidebar">
            <h3>Order Summary</h3>
            <div class="order-summary-left">
                @foreach($checkoutItems as $item)
                <div class="summary-item">
                    <div class="summary-item-details">
                        <div class="quantity-actions">
                            <button class="qty-btn" data-action="minus" data-item-id="{{ $loop->index }}">-</button>
                            <span class="qty-display" data-item-id="{{ $loop->index }}">{{ $item['quantity'] }}</span>
                            <button class="qty-btn" data-action="plus" data-item-id="{{ $loop->index }}">+</button>
                            <button class="delete-btn" data-item-id="{{ $loop->index }}"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                        <h4>{{ $item['name'] }}</h4>
                        <p>Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                    </div>
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" onerror="this.src='https://via.placeholder.com/80'; console.log('Image failed to load: {{ $item['image'] }}');">
                </div>
                @endforeach
            </div>
            <div class="summary-total">
                <span>Total</span>
                <span id="total-price">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>
            <div class="summary-shipping-cost" id="shipping-cost-container">
                <span>Shipping Cost</span>
                <span id="shipping-cost">Rp 0</span>
            </div>
            <div class="summary-grand-total" id="grand-total-container">
                <span>Grand Total</span>
                <span id="grand-total">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="checkout-main">
            <div class="progress-bar">
                <div class="progress-step" id="step-address" data-step="1">
                    <div class="icon-container">1</div>
                    Address
                </div>
                <div class="progress-step" id="step-shipping" data-step="2">
                    <div class="icon-container">2</div>
                    Shipping
                </div>
                <div class="progress-step active" id="step-payment" data-step="3">
                    <div class="icon-container">3</div>
                    Payment
                </div>
                <div class="progress-step" id="step-confirmation" data-step="4">
                    <div class="icon-container">4</div>
                    Confirmation
                </div>
            </div>

            <div class="checkout-tabs">
                <ul>
                    <li><a href="#" data-tab="address">Shipping Address</a></li>
                    <li><a href="#" data-tab="shipping">Shipping Method</a></li>
                    <li class="active"><a href="#" data-tab="payment">Payment & Method</a></li>
                    <li><a href="#" data-tab="review">Review & Pay</a></li>
                </ul>
            </div>

            <div id="address-section" class="checkout-content-section">
                <div class="form-section">
                    <h3>Shipping Address</h3>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" placeholder="Type here">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" placeholder="Type here">
                    </div>
                    <div class="form-group half-width">
                        <div>
                            <label for="state">State</label>
                            <input type="text" id="state" placeholder="Type here">
                        </div>
                        <div>
                            <label for="zipcode">ZIP Code</label>
                            <input type="text" id="zipcode" placeholder="Type here">
                        </div>
                    </div>
                    <p style="text-align: center; margin: 20px 0;">or</p>
                    <div class="address-options">
                        <div class="address-option">
                            <input type="radio" name="delivery_address" id="home_address" checked>
                            <div class="address-details">
                                <h4>Home</h4>
                                <p>Jl. Sudirman No. 1A, Siantar Timur, Medan, Sumatera Utara</p>
                            </div>
                        </div>
                        <div class="address-option">
                            <input type="radio" name="delivery_address" id="office_address">
                            <div class="address-details">
                                <h4>Office</h4>
                                <p>Jl. Perasudan No. 1B, Boyolangu, Tulungagung, Jawa Timur</p>
                            </div>
                        </div>
                    </div>
                    <button class="continue-btn" data-next-tab="shipping">Continue to Shipping</button>
                </div>
            </div>

            <div id="shipping-section" class="checkout-content-section">
                <div class="form-section">
                    <h3>Choose Shipping</h3>
                    <div class="shipping-options-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                        <div class="shipping-option">
                            <input type="radio" name="shipping_method" id="shipping_regular" value="8000">
                            <div class="shipping-details">
                                <h4>Regular</h4>
                                <p>3 - 5 business days<br>Standard package delivery with tracking information</p>
                            </div>
                            <span class="shipping-price">Rp 8.000</span>
                        </div>
                        <div class="shipping-option">
                            <input type="radio" name="shipping_method" id="shipping_economy" value="0">
                            <div class="shipping-details">
                                <h4>Economy</h4>
                                <p>5 - 7 business days<br>Standard package delivery with no tracking</p>
                            </div>
                            <span class="shipping-price free">FREE</span>
                        </div>
                        <div class="shipping-option">
                            <input type="radio" name="shipping_method" id="shipping_express" value="14000">
                            <div class="shipping-details">
                                <h4>Express</h4>
                                <p>1 - 2 business days<br>Fastest delivery with full tracking and insurance</p>
                            </div>
                            <span class="shipping-price">Rp 14.000</span>
                        </div>
                        <div class="shipping-option">
                            <input type="radio" name="shipping_method" id="shipping_sameday" value="20000">
                            <div class="shipping-details">
                                <h4>Same-Day Delivery</h4>
                                <p>Today, if ordered by 2 pm<br>Available for local delivery for urban areas</p>
                            </div>
                            <span class="shipping-price">Rp 20.000</span>
                        </div>
                    </div>

                    <h3 style="margin-top: 40px;">Shipping Vouchers</h3>
                    <div class="coupon-section">
                        <input type="text" placeholder="Coupon Code">
                        <button>Apply Coupon</button>
                    </div>

                    <button class="continue-btn" data-next-tab="payment">Continue to Payment</button>
                </div>
            </div>

            <div id="payment-section" class="checkout-content-section active">
                <div class="form-section">
                    <div class="payment-section">
                        <div class="left-section">
                            <div class="payment-section-content">
                                <h2 class="section-title">Payment Methods</h2>
                                <p class="section-subtitle">Select Payment Method</p>

                                <div class="payment-methods">
                                    <div class="payment-option selected" data-payment="card">
                                        <div class="payment-left">
                                            <div class="payment-radio"></div>
                                            <div class="payment-info">
                                                <h4>Credit & Debit Card</h4>
                                                <p>Visa, Mastercard, Amex</p>
                                            </div>
                                        </div>
                                        <div class="payment-icons">
                                            <div class="payment-icon visa-icon">VISA</div>
                                            <div class="payment-icon mastercard-icon">MC</div>
                                        </div>
                                    </div>

                                    <div class="payment-option" data-payment="paypal">
                                        <div class="payment-left">
                                            <div class="payment-radio"></div>
                                            <div class="payment-info">
                                                <h4>PayPal</h4>
                                                <p>Fast & secure</p>
                                            </div>
                                        </div>
                                        <div class="payment-icons">
                                            <div class="payment-icon paypal-icon">Pay</div>
                                        </div>
                                    </div>

                                    <div class="payment-option" data-payment="applepay">
                                        <div class="payment-left">
                                            <div class="payment-radio"></div>
                                            <div class="payment-info">
                                                <h4>Apple Pay</h4>
                                                <p>Quick & easy</p>
                                            </div>
                                        </div>
                                        <div class="payment-icons">
                                            <div class="payment-icon apple-icon">🍎</div>
                                        </div>
                                    </div>

                                    <div class="payment-option" data-payment="googlepay">
                                        <div class="payment-left">
                                            <div class="payment-radio"></div>
                                            <div class="payment-info">
                                                <h4>Google Pay</h4>
                                                <p>Simple checkout</p>
                                            </div>
                                        </div>
                                        <div class="payment-icons">
                                            <div class="payment-icon google-icon">G</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="right-section">
                            <div class="credit-card">
                                <div class="card-chip"></div>
                                <div class="card-number" id="display-card-number">1235 5678 0097 5543</div>
                                <div class="card-bottom">
                                    <div class="card-info">
                                        <div class="card-expiry" id="display-expiry">01/28</div>
                                        <div class="card-holder" id="display-card-holder">Tob Tobitob</div>
                                    </div>
                                    <div class="mastercard-logo">
                                        <div class="mc-circles">
                                            <div class="mc-circle mc-red"></div>
                                            <div class="mc-circle mc-orange"></div>
                                        </div>
                                        <span class="mc-text">mastercard</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-details">
                                <h3>Card Details</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="card_number">Card Number</label>
                                        <input type="text" id="card_number" placeholder="Type here" maxlength="19">
                                    </div>
                                    <div class="form-group">
                                        <label for="cardholder_name">Cardholder Name</label>
                                        <input type="text" id="cardholder_name" placeholder="Type here">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="expiry_date">Expiry Date</label>
                                        <input type="text" id="expiry_date" placeholder="MM/YY" maxlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" placeholder="Type here" maxlength="4">
                                    </div>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="save_card">
                                    <label for="save_card">Simpan kartu ini untuk transaksi selanjutnya</label>
                                </div>
                                <button class="confirm-btn" data-next-tab="review">Confirm Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="review-section" class="checkout-content-section">
                <div class="form-section">
                    <h3>Review & Pay</h3>
                    <p>Order review details will be displayed here.</p>
                    <button class="continue-btn">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyButtons = document.querySelectorAll('.summary-item-details .qty-btn');
            const deleteButtons = document.querySelectorAll('.summary-item-details .delete-btn');
            const totalPriceElement = document.getElementById('total-price');
            const shippingCostElement = document.getElementById('shipping-cost');
            const grandTotalElement = document.getElementById('grand-total');
            const shippingCostContainer = document.getElementById('shipping-cost-container');
            const grandTotalContainer = document.getElementById('grand-total-container');
            const checkoutTabs = document.querySelectorAll('.checkout-tabs li a');
            const checkoutSections = document.querySelectorAll('.checkout-content-section');
            const continueButtons = document.querySelectorAll('.continue-btn');
            const shippingRadios = document.querySelectorAll('input[name="shipping_method"]');
            const confirmButton = document.querySelector('.confirm-btn');
            const paymentOptions = document.querySelectorAll('.payment-option');
            const cardNumberInput = document.getElementById('card_number');
            const cardHolderInput = document.getElementById('cardholder_name');
            const expiryDateInput = document.getElementById('expiry_date');
            const displayCardNumber = document.getElementById('display-card-number');
            const displayCardHolder = document.getElementById('display-card-holder');
            const displayExpiry = document.getElementById('display-expiry');

            let checkoutItemsData = [];
            let currentShippingCost = 0;
            let currentStep = 1;

            @foreach($checkoutItems as $item)
                checkoutItemsData.push({
                    name: "{{ $item['name'] }}",
                    price: {{ $item['price'] }},
                    quantity: {{ $item['quantity'] }},
                    image: "{{ asset($item['image']) }}"
                });
            @endforeach

            function updateSummaryTotal() {
                let currentTotal = 0;
                checkoutItemsData.forEach(item => {
                    currentTotal += item.price * item.quantity;
                });
                totalPriceElement.textContent = 'Rp ' + currentTotal.toLocaleString('id-ID');
                updateGrandTotal(currentTotal, currentShippingCost);
            }

            function updateGrandTotal(baseTotal, shippingCost) {
                const grandTotal = baseTotal + shippingCost;
                grandTotalElement.textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
            }

            qtyButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const itemId = this.dataset.itemId;
                    const action = this.dataset.action;
                    const qtyDisplay = document.querySelector(`.qty-display[data-item-id="${itemId}"]`);
                    let currentQuantity = parseInt(qtyDisplay.textContent);

                    if (action === 'minus' && currentQuantity > 1) {
                        currentQuantity--;
                    } else if (action === 'plus') {
                        currentQuantity++;
                    }

                    qtyDisplay.textContent = currentQuantity;
                    checkoutItemsData[itemId].quantity = currentQuantity;
                    updateSummaryTotal();
                });
            });

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const itemId = this.dataset.itemId;
                    if (confirm('Are you sure you want to remove this item?')) {
                        this.closest('.summary-item').remove();
                        checkoutItemsData.splice(itemId, 1);
                        document.querySelectorAll('.summary-item').forEach((item, index) => {
                            item.querySelector('.qty-btn[data-action="minus"]').dataset.itemId = index;
                            item.querySelector('.qty-display').dataset.itemId = index;
                            item.querySelector('.qty-btn[data-action="plus"]').dataset.itemId = index;
                            item.querySelector('.delete-btn').dataset.itemId = index;
                        });
                        updateSummaryTotal();
                    }
                });
            });

            function showSection(tabId) {
                checkoutSections.forEach(section => {
                    section.classList.remove('active');
                });
                document.getElementById(`${tabId}-section`).classList.add('active');

                checkoutTabs.forEach(tab => {
                    tab.parentElement.classList.remove('active');
                    if (tab.dataset.tab === tabId) {
                        tab.parentElement.classList.add('active');
                    }
                });

                // Reset semua langkah
                document.getElementById('step-address').classList.remove('active', 'completed');
                document.getElementById('step-shipping').classList.remove('active', 'completed');
                document.getElementById('step-payment').classList.remove('active', 'completed');
                document.getElementById('step-confirmation').classList.remove('active', 'completed');

                if (tabId === 'address') {
                    shippingCostContainer.style.display = 'none';
                    grandTotalContainer.style.display = 'none';
                    document.getElementById('step-address').classList.add('active');
                    currentStep = 1;
                } else {
                    shippingCostContainer.style.display = 'flex';
                    grandTotalContainer.style.display = 'flex';
                    if (tabId === 'shipping') {
                        document.getElementById('step-address').classList.add('completed');
                        document.getElementById('step-shipping').classList.add('active');
                        currentStep = 2;
                    } else if (tabId === 'payment') {
                        document.getElementById('step-address').classList.add('completed');
                        document.getElementById('step-shipping').classList.add('completed');
                        document.getElementById('step-payment').classList.add('active');
                        currentStep = 3;
                    } else if (tabId === 'review') {
                        document.getElementById('step-address').classList.add('completed');
                        document.getElementById('step-shipping').classList.add('completed');
                        document.getElementById('step-payment').classList.add('completed');
                        document.getElementById('step-confirmation').classList.add('active');
                        currentStep = 4;
                    }
                }
            }

            checkoutTabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    showSection(this.dataset.tab);
                });
            });

            continueButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const nextTab = this.dataset.nextTab;
                    if (nextTab) {
                        showSection(nextTab);
                    }
                });
            });

            if (confirmButton) {
                confirmButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const nextTab = this.dataset.nextTab;
                    if (nextTab) {
                        showSection(nextTab);
                    }
                });
            }

            paymentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    paymentOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            cardNumberInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                value = value.match(/.{1,4}/g)?.join(' ') || value;
                this.value = value;
                displayCardNumber.textContent = value || '1235 5678 0097 5543';
            });

            cardHolderInput.addEventListener('input', function() {
                displayCardHolder.textContent = this.value || 'Tob Tobitob';
            });

            expiryDateInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.length >= 3) {
                    value = value.slice(0, 2) + '/' + value.slice(2, 4);
                }
                this.value = value;
                displayExpiry.textContent = value || '01/28';
            });

            shippingRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    currentShippingCost = parseInt(this.value);
                    shippingCostElement.textContent = 'Rp ' + currentShippingCost.toLocaleString('id-ID');
                    updateGrandTotal(
                        parseFloat(totalPriceElement.textContent.replace(/[^0-9]/g, '')),
                        currentShippingCost
                    );
                });
            });

            const initialCheckedShipping = document.querySelector('input[name="shipping_method"]:checked');
            if (initialCheckedShipping) {
                currentShippingCost = parseInt(initialCheckedShipping.value);
                shippingCostElement.textContent = 'Rp ' + currentShippingCost.toLocaleString('id-ID');
                updateGrandTotal(
                    parseFloat(totalPriceElement.textContent.replace(/[^0-9]/g, '')),
                    currentShippingCost
                );
            }

            // Set langkah awal berdasarkan tab aktif saat halaman dimuat
            const activeTab = document.querySelector('.checkout-tabs li.active a').dataset.tab;
            showSection(activeTab);
            updateSummaryTotal();
        });
    </script>
@endsection