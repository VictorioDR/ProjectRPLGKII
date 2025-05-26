<?php

namespace App\Http\Controllers\Backend\Informasi;

use App\Http\Controllers\Controller;
use App\Models\VideoIbadah;
use Illuminate\Http\Request;

class VideoIbadahController extends Controller
{
    /**
     * Tampilkan daftar video ibadah.
     */
    public function index()
    {
        $videos = VideoIbadah::all(); // Ambil semua data video ibadah
        return view('backend.informasi.video_ibadah.index', compact('videos'));
    }

    /**
     * Tampilkan halaman untuk menambah video ibadah.
     */
    public function create()
    {
        return view('backend.informasi.video_ibadah.create');
    }

    /**
     * Simpan video ibadah baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link_video' => 'required|url',
            'status' => 'required|in:aktif,non-aktif', // Status video (aktif/non-aktif)
        ]);

        // Simpan video ibadah baru
        VideoIbadah::create($request->all());

        return redirect()->route('video-ibadah.index')->with('success', 'Video Ibadah berhasil ditambahkan.');
    }

    /**
     * Tampilkan halaman untuk mengedit video ibadah tertentu.
     */
    public function edit(VideoIbadah $videoIbadah)
    {
        return view('backend.informasi.video_ibadah.edit', compact('videoIbadah'));
    }

    /**
     * Update data video ibadah di database.
     */
    public function update(Request $request, VideoIbadah $videoIbadah)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link_video' => 'required|url',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        // Update data video ibadah
        $videoIbadah->update($request->all());

        return redirect()->route('video-ibadah.index')->with('success', 'Video Ibadah berhasil diperbarui.');
    }
}
