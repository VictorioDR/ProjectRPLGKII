<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function process(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'Link reset password telah dikirim.'])
            : back()->withErrors(['email' => 'Gagal mengirimkan link reset password.']);
    }

}
