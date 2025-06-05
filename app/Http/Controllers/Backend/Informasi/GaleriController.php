<?php

namespace App\Http\Controllers\Backend\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Tampilkan daftar galeri.
     */
    public function index()
    {
        $galeriList = Galeri::all(); // Ambil semua data galeri
        return view('backend.informasi.galeri.index', compact('galeriList'));
    }

    /**
     * Tampilkan halaman untuk menambah galeri baru.
     */
    public function create()
    {
        return view('backend.informasi.galeri.create');
    }

    /**
     * Simpan galeri baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar harus valid
            'status' => 'required|in:aktif,non-aktif',
        ]);

        // Proses upload gambar jika ada file gambar
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('galeri', 'public');
        }

        // Simpan data galeri
        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'status' => $request->status,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    /**
     * Tampilkan halaman untuk mengedit galeri tertentu.
     */
    public function edit(Galeri $galeri)
    {
        return view('backend.informasi.galeri.edit', compact('galeri'));
    }

    /**
     * Update galeri di database.
     */
    public function update(Request $request, Galeri $galeri)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('galeri', 'public');
            $galeri->gambar = $gambarPath;
        }

        // Update data galeri
        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $galeri->gambar, // Tetap gunakan gambar lama jika tidak diubah
            'status' => $request->status,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }
}
