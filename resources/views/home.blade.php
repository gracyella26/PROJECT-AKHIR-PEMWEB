@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="homepage-content">
    <section class="hero-section">
        <div class="container hero-inner">
            <div class="hero-text">
                <p class="greeting">Selamat datang di</p>
                <h1>PELUK WANGI</h1>
                <h2>Indonesia's No.1 most trusted soap shopping site</h2>
                <p>Discover a collection of organic soaps formulated from natural ingredients with no harmful chemicals. Gentle on the skin, safe for all ages, and caring for the earth. Experience natural freshness every day with us!</p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">Shop Now</a>
                    <a href="#" class="btn-outline">Sign In</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/hero-product.jpg') }}" alt="Hero Product">
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container about-inner">
            <h2>Tentang PELUK WANGI</h2>
            <p class="about-tagline">At Peluk Wangi, we believe that the best self-care comes from nature. Founded with a passion for providing products that are healthy and friendly for the environment, we present organic soaps made from selected natural ingredients, without the addition of synthetic chemicals, parabens, or artificial fragrances.</p>
            <div class="about-features">
                <div class="feature-item">
                    <img src="{{ asset('images/organic-icon.png') }}" alt="Organic Icon">
                    <p>100% Using Organic Ingredients</p>
                </div>
                <div class="feature-item">
                    <img src="{{ asset('images/dermatology-icon.png') }}" alt="Dermatology Icon">
                    <p>Dermatology tested</p>
                </div>
                <div class="feature-item">
                    <img src="{{ asset('images/high-quality-icon.png') }}" alt="High Quality Icon">
                    <p>High-Quality, Good Price</p>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn-primary">See More Product</a>
            </div>
        </div>
    </section>

    <section class="products-section">
        <div class="container">
            <h2>Best Selling Products!</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="{{ asset('images/milk-honey-soap.jpg') }}" alt="Milk Honey Soap">
                    <h3>Milk Honey Soap</h3>
                    <div class="product-rating">
                        <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span> (4.5)
                    </div>
                    <p class="product-price">Rp 12.000</p>
                    <div class="product-actions">
                        <a href="{{ route('product.detail', 'milk-honey-soap') }}" class="add-to-cart-btn"><i class="fa-solid fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/lavender-soap.jpg') }}" alt="Lavender Soap">
                    <h3>Lavender Soap</h3>
                    <div class="product-rating">
                        <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> (5.0)
                    </div>
                    <p class="product-price">Rp 15.000</p>
                    <div class="product-actions">
                        <a href="{{ route('product.detail', 'lavender-soap') }}" class="add-to-cart-btn"><i class="fa-solid fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/tamarind-milk-soap.jpg') }}" alt="Tamarind Milk Soap">
                    <h3>Tamarind Milk Soap</h3>
                    <div class="product-rating">
                        <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span> (4.8)
                    </div>
                    <p class="product-price">Rp 15.000</p>
                    <div class="product-actions">
                        <a href="{{ route('product.detail', 'tamarind-milk-soap') }}" class="add-to-cart-btn"><i class="fa-solid fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/rosemary-soap.jpg') }}" alt="Rosemary Soap">
                    <h3>Rosemary Soap</h3>
                    <div class="product-rating">
                        <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> (4.9)
                    </div>
                    <p class="product-price">Rp 13.000</p>
                    <div class="product-actions">
                        <a href="{{ route('product.detail', 'rosemary-soap') }}" class="add-to-cart-btn"><i class="fa-solid fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn-outline">See more</a>
            </div>
        </div>
    </section>

    <section class="coming-soon-section">
        <div class="container">
            <h2>Coming soon!</h2>
            <div class="coming-soon-grid">
                <div class="coming-soon-item large-item">
                    <img src="{{ asset('images/body-lotion-coming-soon.jpg') }}" alt="Body Lotion Coming Soon">
                    <p>Body Lotion</p>
                </div>
                <div class="coming-soon-item">
                    <img src="{{ asset('images/body-scrub-coming-soon.jpg') }}" alt="Body Scrub Coming Soon">
                    <p>Body Scrub</p>
                </div>
                <div class="coming-soon-item">
                    <img src="{{ asset('images/beauty-tooth-paste-coming-soon.jpg') }}" alt="Beauty Tooth Paste Coming Soon">
                    <p>Beauty Tooth Paste</p>
                </div>
                <div class="coming-soon-item">
                    <img src="{{ asset('images/tooth-paste-coming-soon.jpg') }}" alt="Tooth Paste Coming Soon">
                    <p>Tooth Paste</p>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn-outline">See more</a>
            </div>
        </div>
    </section>

</div>
@endsection