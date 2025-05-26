<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // cek apakah email sudah terdaftar
        $user = User::query()->where('email', $request->email)->first();
        if ($user !== null) {
            return back()->with('success', 'Email sudah terdaftar.');
        }

        // buat user baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_active = 0;
        $user->token_activation = md5($request->email . date('Y-m-dH:i:s'));
        $user->save();

        // kirim email aktivasi
        try {
            Mail::to($user->email)->queue(new RegisterMail($user));
            return redirect(route('auth.login.index'))->with('success', 'Silahkan cek email untuk aktivasi akun.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }

    public function verify($token)
    {
        $user = User::query()->where('token_activation', $token)->first();
        if ($user === null) {
            return redirect(route('auth.login.index'))->with('error', 'Token tidak ditemukan');
        }

        $user->token_activation = null;
        $user->is_active = 1;
        $user->save();
        return redirect(route('auth.login.index'))->with('success', 'Aktivasi Berhasil, silahkan login');
    }
}
