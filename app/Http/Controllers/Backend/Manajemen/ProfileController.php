<?php

namespace App\Http\Controllers\Backend\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function show()
    {
        $admin = auth()->user();
        return view('backend.profile.show', compact('admin'));
    }

    public function edit()
    {
        $admin = auth()->user();
        return view('backend.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];

        if (!empty($validated['password'])) {
            $admin->password = bcrypt($validated['password']);
        }

        $admin->save();

        return redirect()->route('dashboard.profile')->with('success', 'Profil admin berhasil diperbarui');
    }
}
