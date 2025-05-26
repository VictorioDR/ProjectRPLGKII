@extends('layouts.auth')

@section('content')
    <form action="{{ route('auth.login.verify') }}" method="POST" class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Input Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required class="w-full border rounded px-3 py-2 focus:outline-none" placeholder="Email Address">
        </div>

        <!-- Input Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required class="w-full border rounded px-3 py-2 focus:outline-none" placeholder="Password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded">
            Login
        </button>

        <!-- Register Link -->
        <div class="text-center mt-4">
            <p class="text-sm">Belum punya akun? <a href="{{ route('auth.register.index') }}" class="text-blue-600 font-bold">Daftar di sini</a></p>
        </div>
    </form>
@endsection
