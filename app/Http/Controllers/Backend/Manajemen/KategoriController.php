<?php

namespace App\Http\Controllers\Backend\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Tampilkan halaman untuk membuat kategori baru.
     */
    public function create()
    {
        return view('backend.manajemen.kategori.create');
    }

    /**
     * Simpan data kategori baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Buat kategori baru
        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman tertentu dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dibuat.');
    }

    /**
     * Tampilkan halaman edit untuk kategori tertentu.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); // Dapatkan kategori

        return view('backend.manajemen.kategori.edit', compact('kategori'));
    }

    /**
     * Update data kategori di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Cari kategori dan update datanya
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus kategori dari database.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        // Hapus kategori
        $kategori->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
