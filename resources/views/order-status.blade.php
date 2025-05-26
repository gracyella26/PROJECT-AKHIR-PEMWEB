<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order Status - Peluk Wangi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9f7f4;
            color: #333;
        }

        .header {
            background: white;
            border-bottom: 1px solid #f0f0f0;
            padding: 12px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .left-section {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            background: #6B8E23; /* Hijau zaitun */
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .logo-text {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
        }

        .main-nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
            align-items: center;
        }

        .main-nav a {
            color: #666;
            text-decoration: none;
            font-weight: 400;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .main-nav a:hover {
            color: #333;
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icons a {
            color: #666;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.2s ease;
            position: relative;
        }

        .header-icons a:hover {
            color: #333;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ff4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-content {
            padding: 40px 0;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .order-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 40px;
            align-items: start;
        }

        .order-sidebar {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .order-item {
            background: #E5F0D6; /* Hijau sangat lembut */
            border: none;
            border-radius: 25px;
            padding: 16px 24px;
            text-align: left;
            font-size: 14px;
            font-weight: 500;
            color: #333;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-item:hover {
            background: #D6E5B8; /* Hijau sedikit lebih gelap saat hover */
        }

        .order-item.active {
            background: #6B8E23; /* Hijau zaitun untuk aktif */
            color: white;
        }

        .order-item i {
            font-size: 12px;
        }

        .progress-section {
            background: white;
            border-radius: 12px;
            padding: 32px;
            margin-bottom: 24px;
        }

        .progress-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
            margin-bottom: 40px;
        }

        .progress-container::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 50px;
            right: 50px;
            height: 2px;
            background: #e0e0e0;
            z-index: 1;
        }

        .progress-container::after {
            content: '';
            position: absolute;
            top: 25px;
            left: 50px;
            width: 25%;
            height: 2px;
            background: #6B8E23; /* Hijau zaitun untuk garis progres */
            z-index: 2;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 3;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            color: #999;
            font-size: 20px;
        }

        .step-icon.active {
            background: #6B8E23; /* Hijau zaitun untuk ikon aktif */
            color: white;
        }

        .step-title {
            font-weight: 600;
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
        }

        .step-date {
            font-size: 12px;
            color: #666;
            margin-bottom: 2px;
        }

        .step-time {
            font-size: 12px;
            color: #666;
        }

        .timeline-section {
            background: #f9f7f4;
            border-radius: 12px;
            padding: 32px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .timeline-column h3 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .timeline-item {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
            position: relative;
        }

        .timeline-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #6B8E23; /* Hijau zaitun untuk titik timeline */
            margin-top: 4px;
            flex-shrink: 0;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-location {
            font-weight: 600;
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
        }

        .timeline-date {
            font-size: 12px;
            color: #666;
            margin-bottom: 6px;
        }

        .timeline-desc {
            font-size: 13px;
            color: #666;
            line-height: 1.4;
        }

        .footer {
            background: #f9f7f4;
            padding: 60px 0 40px;
            margin-top: 80px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 40px;
        }

        .footer-col h3 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .footer-col p, .footer-col a {
            font-size: 14px;
            color: #666;
            text-decoration: none;
            line-height: 1.6;
            margin-bottom: 8px;
        }

        .footer-col a:hover {
            color: #333;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .app-buttons {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .app-buttons img {
            height: 40px;
            border-radius: 8px;
        }

        .social-icons {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .social-icons a {
            width: 32px;
            height: 32px;
            background: #6B8E23; /* Hijau zaitun untuk ikon sosial */
            color: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .order-layout {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .progress-container {
                flex-direction: column;
                gap: 20px;
            }

            .progress-container::before,
            .progress-container::after {
                display: none;
            }

            .timeline-section {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="left-section">
                    <div class="logo">
                        <div class="logo-icon">PW</div>
                        <span class="logo-text">PELUK WANGI</span>
                    </div>
                    <nav class="main-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-icons">
                    <a href="#" title="Orders">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </a>
                    <a href="#" title="Cart">
                        <i class="fa-solid fa-shopping-cart"></i>
                        <span class="cart-count">2</span>
                    </a>
                    <a href="#" title="Profile">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <h1 class="page-title">My Order Status</h1>
            <div class="order-layout">
                <div class="order-sidebar">
                    @foreach ($orders as $order)
                        <button class="order-item {{ $order->is_active ? 'active' : '' }}">
                            {{ $order->name }}
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endforeach
                </div>

                <div class="order-content">
                    <div class="progress-section">
                        <div class="progress-container">
                            @foreach ($progress_steps as $step)
                                <div class="progress-step">
                                    <div class="step-icon {{ $step->is_active ? 'active' : '' }}">
                                        <i class="{{ $step->icon }}"></i>
                                    </div>
                                    <div class="step-title">{{ $step->title }}</div>
                                    <div class="step-date">{{ $step->date }}</div>
                                    <div class="step-time">{{ $step->time }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="timeline-section">
                        <div class="timeline-column">
                            @foreach ($timeline_left as $item)
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-location">{{ $item->location }}</div>
                                        <div class="timeline-date">{{ $item->date }}</div>
                                        <div class="timeline-desc">{{ $item->desc }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="timeline-column">
                            @foreach ($timeline_right as $item)
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-location">{{ $item->location }}</div>
                                        <div class="timeline-date">{{ $item->date }}</div>
                                        <div class="timeline-desc">{{ $item->desc }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="footer-logo">
                        <div class="logo-icon">PW</div>
                        <span class="logo-text">PELUK WANGI</span>
                    </div>
                    <p><strong>Subscribe</strong></p>
                    <p>Get 10% off your first order</p>
                </div>
                <div class="footer-col">
                    <h3>Our Location</h3>
                    <p>Jalan Veteran 15, Malang, East Java</p>
                    <p>pelukwangi@gmail.com</p>
                    <p>(0341)534-987</p>
                </div>
                <div class="footer-col">
                    <h3>Account</h3>
                    <p><a href="#">Login</a></p>
                    <p><a href="#">Cart</a></p>
                    <p><a href="#">Shop</a></p>
                </div>
                <div class="footer-col">
                    <h3>Download App</h3>
                    <p>Save $3 with App New User Only</p>
                    <div class="app-buttons">
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" style="height: 40px; border-radius: 8px;"></a>
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store" style="height: 40px; border-radius: 8px;"></a>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>