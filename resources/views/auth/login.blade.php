@extends('layouts.auth')

@section('styles')
    <!-- Tambahkan link Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .login-container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 400px;
            margin: 3rem auto;
            width: 100%;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .login-title {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .form-group {
            margin-bottom: 1.3rem;
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .form-label {
            color: #2c3e50;
            font-weight: 500;
            margin-bottom: 0.4rem;
            display: block;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .form-input {
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            border: 1px solid #dbeafe;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: border 0.2s;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
            margin-bottom: 0.1rem;
            background: #f8fafc;
        }

        .form-input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px #eaf6fb;
        }

        .login-btn {
            width: 100%;
            background: #3498db;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 0;
            font-size: 1.1rem;
            transition: background 0.2s;
            margin-bottom: 1rem;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .login-btn:hover {
            background: #2c3e50;
        }

        .register-link {
            text-align: center;
            margin-top: 1rem;
            font-size: 1rem;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .register-link a {
            color: #3498db;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .register-link a:hover {
            color: #2c3e50;
        }

        .alert-success,
        .alert-error {
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            text-align: center;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .alert-success {
            background: #eafaf1;
            color: #27ae60;
        }

        .alert-error {
            background: #fdeaea;
            color: #e74c3c;
        }
    </style>
@endsection

@section('content')
    <div class="login-container">
        <h2 class="login-title">Login</h2>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('auth.login.verify') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" required class="form-input" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" required class="form-input" placeholder="Password">
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="{{ route('auth.register.index') }}">Daftar di sini</a>
        </div>
    </div>
@endsection