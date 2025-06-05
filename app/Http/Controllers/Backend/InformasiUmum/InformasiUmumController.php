<?php

namespace App\Http\Controllers\Backend\InformasiUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiUmum;

class InformasiUmumController extends Controller
{
    /**
     * Tampilkan daftar informasi umum.
     */
    public function index()
    {
        $informasiList = InformasiUmum::all(); // Ambil semua data informasi
        return view('backend.informasi_umum.index', compact('informasiList'));
    }

    /**
     * Tampilkan halaman untuk menambah informasi umum.
     */
    public function create()
    {
        return view('backend.informasi_umum.create');
    }

    /**
     * Simpan informasi umum baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|in:aktif,non-aktif', // Contoh status
        ]);

        // Simpan informasi umum baru
        InformasiUmum::create($request->all());

        return redirect()->route('informasi-umum.index')->with('success', 'Informasi Umum berhasil ditambahkan.');
    }

    /**
     * Tampilkan halaman untuk mengedit informasi umum.
     */
    public function edit(InformasiUmum $informasiUmum)
    {
        return view('backend.informasi_umum.edit', compact('informasiUmum'));
    }

    /**
     * Update data informasi umum di database.
     */
    public function update(Request $request, InformasiUmum $informasiUmum)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        // Update data informasi umum
        $informasiUmum->update($request->all());

        return redirect()->route('informasi-umum.index')->with('success', 'Informasi Umum berhasil diperbarui.');
    }
}
