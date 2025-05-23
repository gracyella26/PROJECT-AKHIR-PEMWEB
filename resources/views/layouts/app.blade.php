<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluk Wangi - @yield('title', 'Website')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWABoKbB3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>

    <header class="header">
        <div class="container header-content">
            <div class="logo">
                <img src="{{ asset('images/logo-peluk-wangi.png') }}" alt="Peluk Wangi Logo">
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('search') }}">Search</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <a href="{{ route('login') }}"><i class="fa-solid fa-clipboard-list"></i></a>
                <a href="{{ route('cart') }}"><i class="fa-solid fa-shopping-cart"></i><span class="cart-count">0</span></a>
                <a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </header>

    <main class="content">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div class="footer-col about-us">
                <img src="{{ asset('images/logo-peluk-wangi.jpg') }}" alt="Peluk Wangi Logo" class="footer-logo">
                <p>Subscribe</p>
                <p>Get 10% off your first order</p>
            </div>
            <div class="footer-col">
                <h3>Our Location</h3>
                <p>Jalan Veteran 15, Malang, East Java</p>
                <p>pelukwangi@gmail.com</p>
                <p>(021)534-987</p>
            </div>
            <div class="footer-col">
                <h3>Account</h3>
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('cart') }}">Cart</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                </ul>
            </div>
            <div class="footer-col download-app">
                <h3>Download App</h3>
                <p>Save $3 with App Now User Only</p>
                <div class="app-buttons">
                    <img src="{{ asset('images/qr-code.png') }}" alt="QR Code">
                    <div>
                        <img src="{{ asset('images/google-play.png') }}" alt="Google Play">
                        <img src="{{ asset('images/app-store.png') }}" alt="App Store">
                    </div>
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>