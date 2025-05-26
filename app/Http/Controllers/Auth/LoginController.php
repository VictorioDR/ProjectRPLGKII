<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();

            // Cek apakah user sudah diaktivasi
            if (!$user->is_active) {
                Auth::logout();
                return redirect()->route('auth.login.index')
                    ->with('pesan', 'Akun belum diaktivasi. Silakan cek email Anda untuk aktivasi akun.');
            }

            // Login berhasil, redirect ke halaman yang diinginkan
            return redirect()->intended('/dashboard');
        }

        return redirect()->route('auth.login.index')->with('pesan', 'Kombinasi email dan password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}
