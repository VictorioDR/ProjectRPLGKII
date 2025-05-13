<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Document</title>


    <style>
        /*Bagian Social Media*/
        .social-link {
            text-decoration: none;
            margin-right: 16px;
            display: inline-flex;
            align-items: center;
            color: inherit;
        }

        .social-link i {
            margin-right: 8px;
        }
    </style>

    <style>
        .footer-top {
            background-color: #0e0095; /* bagian social media */
            color: white;
        }
    </style>

    <style>
        .navbar-custom {
            background-color: #0e0095; /* ubah sesuai keinginan */
        }

        .navbar-custom .nav-link{
            color: white !important; /* Warna teks */
            transition:color 0.5s ease;
        }

        .navbar-custom .nav-link:hover {
            color: red !important; /* Warna hover, misal kuning */
        }

        /*Untuk Footer Paling Bawah*/
        .footer-copyright {
            background-color: #0e0095;
            color: white;
        }

        .footer-copyright a {
            color: white;
            text-decoration: none;
        }

        .footer-copyright a:hover {
            color: #ff0d0d;
        }
    </style>

    <style>
        /*Bagian Footer tepat dibawah Social Media*/

        .footer-links-section {
            background-color: #000000; /* Ganti sesuai selera: biru muda, putih, abu, dll */
            padding-top: 40px;
            padding-bottom: 40px;
            color: #ffffff;
        }
    </style>




</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="nav-link" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('about')}}">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('auth.index')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('register.index')}}">Register</a>
                </li>
               </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-light">
    <!-- Section: Social media -->
    <section class="footer-top d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="social-link">
                <i class="fab fa-facebook-f"></i> @GKIITJS
            </a>
            <a href="" class="social-link">
                <i class="fab fa-twitter"></i> @GKIITJS
            </a>
            <a href="" class="social-link">
                <i class="fab fa-google"></i> @GKIITJS
            </a>
            <a href="" class="social-link">
                <i class="fab fa-instagram"></i> @GKIITJS
            </a>
            <a href="" class="social-link">
                <i class="fab fa-linkedin"></i> @GKIITJS
            </a>
            <a href="" class="social-link">
                <i class="fab fa-github"></i> @GKIITJS
            </a>


        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="footer-links-section">
{{--        <section class="footer-links">--}}
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 mt-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>GKII Jemaat Tanjung Selor
                    </h6>
                    <p>
                        Gereja Kemah Injil Indonesia (GKII) merupakan salah satu denominasi gereja Protestan di Indonesia yang memiliki akar pelayanan misi sejak awal abad ke-20. GKII lahir dari pelayanan para misionaris asing, khususnya dari The Christian and Missionary Alliance (C&MA), sebuah organisasi penginjilan yang berbasis di Amerika Serikat.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 mt-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Pelayanan
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Misi</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Ibadah Mingguan</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Sosial</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 mt-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">About</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 mt-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Jl. S.Parman, Tj.Selor Hulu, Kec.Tj.Selor, Kabupaten Bulungan, Kalimantan Utara 77214</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        GKII@example.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 62 8123456789</p>
                    <p><i class="fas fa-print me-3"></i> + 62 8987654321</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
{{--    </section>--}}
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4 footer-copyright">
        © 2025 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">GKII</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>

