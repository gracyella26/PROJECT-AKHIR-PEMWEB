<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluk Wangi - @yield('title', 'Website')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWABoKbB3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>

    <header class="header">
        <div class="container header-content">
            <div class="logo">
                <img src="{{ asset('images/logo_peluk_wangi.png') }}" alt="Peluk Wangi Logo">
            </div>
            <nav class="navbar navbar-expand-lg bg-light rounded py-2 px-4" style="background-color: #f6f3e8;">
                <div class="container d-flex justify-content-between align-items-center">

                    <!-- Menu Tengah -->
                    <div class="d-flex gap-4">
                        <a class="nav-link {{ Request::is('/') ? 'fw-bold text-dark' : '' }}" href="{{ url('/') }}">Home</a>
                        <a class="nav-link {{ Request::is('search') ? 'fw-bold text-dark' : '' }}" href="{{ url('/search') }}">Search</a>
                        <a class="nav-link {{ Request::is('contact') ? 'fw-bold text-dark' : '' }}" href="{{ url('/contact') }}">Contact</a>
                    </div>

                    <!-- Ikon Navigasi -->
                    <div class="d-flex gap-4 align-items-center">
                        <!-- Orders -->
                        

                        <!-- Cart -->
                        

                        <!-- Profile -->
                        
                    </div>
                </div>
            </nav>

            <div class="header-icons">
                <a href="{{ url('/orders') }}" class="text-dark">
                    <i class="bi bi-receipt" style="font-size: 1.2rem;"></i></a>
                <a href="{{ url('/cart') }}" class="position-relative text-dark">
                    <i class="bi bi-cart" style="font-size: 1.2rem;"></i>
                    @if(session('cart_count') > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ session('cart_count') }}
                    </span>
                    @endif</a>
                    <a href="{{ url('/profile') }}" class="text-dark">
                         <i class="bi bi-person" style="font-size: 1.2rem;"></i>
                    </a>
            </div>
        </div>
    </header>

    <main class="content">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div class="footer-col about-us">
                <img src="{{ asset('images/logo_peluk_wangi.png') }}" alt="Peluk Wangi Logo" class="footer-logo">
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
                    <li><a href="#">Cart</a></l>
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