@extends('layouts.auth')

@section('content')
    <form action="{{ route('auth.register.process') }}" method="POST" class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Input Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded px-3 py-2 focus:outline-none" placeholder="Name">
        </div>

        <!-- Input Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded px-3 py-2 focus:outline-none" placeholder="Email">
        </div>

        <!-- Input Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required minlength="8" class="w-full border rounded px-3 py-2 focus:outline-none" placeholder="Password">
        </div>

        <!-- Input Password Confirmation -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" required minlength="8" class="w-full border rounded px-3 py-2 focus:outline-none" placeholder="Confirm Password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded">
            Register
        </button>

        <!-- Login Link -->
        <div class="text-center mt-4">
            <p class="text-sm">Sudah punya akun? <a href="{{ route('auth.login.index') }}" class="text-blue-600 font-bold">Login</a></p>
        </div>
    </form>
@endsection
