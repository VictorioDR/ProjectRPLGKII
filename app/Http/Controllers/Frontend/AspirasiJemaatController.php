<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AspirasiJemaat;
use Illuminate\Http\Request;

class AspirasiJemaatController extends Controller
{
    /**
     * Tampilkan form aspirasi jemaat untuk publik.
     */
    public function formPublic()
    {
        return view('frontend.aspirasi.form');
    }

    /**
     * Simpan aspirasi jemaat dari form publik.
     */
    public function storePublic(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'aspirasi' => 'required|string'
        ]);

        AspirasiJemaat::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'aspirasi' => $validated['aspirasi'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Aspirasi Anda telah kami terima.');
    }
}
