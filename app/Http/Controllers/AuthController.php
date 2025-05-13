<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function verify(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('user')->attempt(['email'=> $request->email, 'password' => $request->password])){
            $user = Auth::guard('user')->user();

            // cek apakah user sudah diaktivasi
            if (!$user->is_active) {
                Auth::guard('user')->logout();
                return redirect()->route('auth.index')->with('pesan', 'Akun belum diaktivasi. Silakan cek email Anda untuk aktivasi akun.');
            }
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }else{
            return redirect(route('auth.index'))->with('pesan','Kombinasi email dan password salah');
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerProcess(Request $request){
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

        // buat user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_active = 0;
        $user->token_activation = md5($request->email . date('Y-m-dH:i:s'));
        $user->save();

        try {
            Mail::to($user->email)->queue(new RegisterMail($user));
            return redirect(route('auth.index'))->with('success', 'Silahkan cek email untuk aktivasi akun.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }

    public function registerVerify($token)
    {
        $user = User::query()->where('token_activation', $token)->first();
        if ($user === null) {
            return redirect(route('auth.index'))->with('error', 'Token tidak ditemukan');
        }
        $user->token_activation = null;
        $user->is_active = 1;
        $user->save();
        return redirect(route('auth.index'))->with('success', 'Aktivasi Berhasil, silahkan login');
    }
}
