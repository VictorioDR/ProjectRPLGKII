<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GKI Tanjung Selor')</title>
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
            background: #275fae;
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
        }

        .footer-info {
            flex: 1;
        }

        .footer-contact {
            display: flex;
            gap: 2rem;
            margin: 0.5rem 0;
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
    </style>
    @yield('styles')
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="{{ url('/') }}" class="navbar-brand">GKI Tanjung Selor</a>

                <ul class="navbar-nav">
                    <li><a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">BERANDA</a>
                    </li>
                    <li><a href="#" class="nav-link">TENTANG GEREJA</a></li>
                    <li><a href="#" class="nav-link">PENGUMUMAN</a></li>
                </ul>

                <div class="auth-buttons">
                    <a href="#" class="btn btn-outline">MASUK</a>
                    <a href="#" class="btn btn-primary">DAFTAR</a>
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
                        <span>📧 GKI@gmail.com</span>
                        <span>📞 +62 123456789</span>
                    </div>
                    <p>©2024 Gereja Kemah Injil Indonesia Jemaat Tanjung Selor. All rights reserved.</p>
                </div>

                <div class="footer-social">
                    <a href="#" class="social-icon">📷</a>
                    <a href="#" class="social-icon">📘</a>
                    <a href="#" class="social-icon">📺</a>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>

</html>