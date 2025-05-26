<!doctype html>
<html lang="en">
<head>
    <title>@yield('title', 'Login | GKII Tanjung Selor')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Aplikasi Gereja GKII Tanjung Selor" />
    <meta name="keywords" content="GKII, Gereja, Tanjung Selor, Login, Register" />
    <meta name="author" content="GKII Team" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>
<body class="bg-gray-100">
<!-- Preloader -->
<div class="loader-bg" style="display: none;">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

<!-- Main Content -->
@yield('content')

<!-- Plugins -->
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
