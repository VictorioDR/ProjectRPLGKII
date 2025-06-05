<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GKII Tanjung Selor')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-mcWJzAH+yKeq1+6ISD7ZtkVJrxS0Z+q5tJXUlsMoLR6py1Gh1frKcWyZqSe9DtvbKwZ5uEzFLH4s8nZybUEGxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1500px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #275fae;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-outline {
            background: transparent;
            color: #333;
            border: 2px solid #333;
        }

        .btn-outline:hover {
            background: #333;
            color: white;
        }

        .btn-primary {
            background: #275fae;
            color: white;
        }

        .btn-primary:hover {
            background: #1f4c94;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 200px);
        }

        /* Footer Styles */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-info {
            flex: 1;
        }

        .footer-contact {
            display: flex;
            gap: 2rem;
            margin: 0.5rem 0;
            flex-wrap: wrap;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: #34495e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            transition: background 0.3s ease;
        }

        .social-icon:hover {
            background: #275fae;
        }

        .icon-image {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1rem;
            }

            .navbar-nav {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .footer-contact {
                justify-content: center;
            }
        }

        .church-date {
            text-align: center;
            padding: 1rem;
            color: #555;
            font-size: 0.9rem;
        }

        .footer-social .social-icon {
            width: 40px;
            height: 40px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            font-size: 18px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .footer-social .social-icon:hover {
            color: white;
        }

        .footer-social .social-icon:nth-child(1):hover {
            background: #E4405F; /* Instagram */
        }
        .footer-social .social-icon:nth-child(2):hover {
            background: #1877F2; /* Facebook */
        }
        .footer-social .social-icon:nth-child(3):hover {
            background: #FF0000; /* YouTube */
        }

        .footer-contact {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 15px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            color: white;
        }


        .icon-wrapper {
            background-color: white;
            border-radius: 50%;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .icon-wrapper:hover {
            transform: scale(1.1);
            opacity: 0.9;
        }

        .icon-contact {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        .footer-contact {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 15px;
            flex-wrap: wrap;
        }


    </style>
    @yield('styles')
</head>

<body>
<header class="header">
    <div class="container">
        <nav class="navbar">
            <a href="{{ url('/') }}" class="navbar-brand">GKII Tanjung Selor</a>

            <ul class="navbar-nav">
                <li><a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">BERANDA</a></li>
                <li><a href="{{ route('tentang.sejarah') }}" class="nav-link {{ Request::is('tentang/sejarah') ? 'active' : '' }}">TENTANG</a></li>
                <li><a href="#" class="nav-link">PENGUMUMAN</a></li>
            </ul>

            <div class="auth-buttons">
                <a href="{{ route('auth.login.verify') }}" class="btn btn-outline">MASUK</a>
                <a href="{{ route('auth.register.process') }}" class="btn btn-primary">DAFTAR</a>
            </div>
        </nav>
    </div>
</header>

<main class="main-content">
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-info">
                <div class="footer-contact">
            <span class="contact-item">
            <div class="icon-wrapper">
                <img src="{{ asset('uploads/icons/icon-email.png') }}" alt="Email Icon" class="icon-contact">
                </div>
                GKII@gmail.com
                </span>
                    <span class="contact-item">
                    <div class="icon-wrapper">
                     <img src="{{ asset('uploads/icons/icon-phone.png') }}" alt="Phone Icon" class="icon-contact">
                </div>
                +62 123456789
            </span>

                </div>
                <p>©2024 Gereja Kemah Injil Indonesia Jemaat Tanjung Selor. All rights reserved.</p>
            </div>

            <div class="footer-social">
                <a href="#" class="social-icon">
                    <img src="{{ asset('uploads/icons/icon-instagram.png') }}" alt="Instagram" class="icon-image">
                </a>
                <a href="#" class="social-icon">
                    <img src="{{ asset('uploads/icons/icon-facebook.png') }}" alt="Facebook" class="icon-image">
                </a>
                <a href="#" class="social-icon">
                    <img src="{{ asset('uploads/icons/icon-youtube.png') }}" alt="YouTube" class="icon-image">
                </a>
            </div>
        </div>
    </div>
</footer>

<div class="church-date">
    {{ \Illuminate\Support\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
</div>

@yield('scripts')
</body>
</html>
