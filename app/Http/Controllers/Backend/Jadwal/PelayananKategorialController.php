<?php

namespace App\Http\Controllers\Backend\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelayananKategorial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PelayananKategorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['getByKategori', 'apiGetByKategori']);
    }

    public function index()
    {
        $jadwal = JadwalPelayananKategorial::orderByDesc('tanggal')->get();
        return view('backend.jadwal_pelayanan_kategorial.index', compact('jadwal'));
    }

    public function create()
    {
        return view('backend.jadwal_pelayanan_kategorial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'petugas' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        JadwalPelayananKategorial::create($validated);

        return redirect()->route('jadwal-pelayanan-kategorial.index')->with('success', 'Jadwal pelayanan kategorial berhasil ditambahkan');
    }

    public function show($id)
    {
        $jadwal = JadwalPelayananKategorial::findOrFail($id);
        return view('backend.jadwal_pelayanan_kategorial.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = JadwalPelayananKategorial::findOrFail($id);
        return view('backend.jadwal_pelayanan_kategorial.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'petugas' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        $jadwal = JadwalPelayananKategorial::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal-pelayanan-kategorial.index')->with('success', 'Jadwal pelayanan kategorial berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPelayananKategorial::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-pelayanan-kategorial.index')->with('success', 'Jadwal pelayanan kategorial berhasil dihapus');
    }

    public function getByKategori($kategori)
    {
        $now = Carbon::today();

        $jadwal = JadwalPelayananKategorial::where('kategori', $kategori)
            ->where('tanggal', '>=', $now)
            ->where('status', 'active')
            ->orderBy('tanggal')
            ->get();

        return view('frontend.jadwal_pelayanan_kategorial', compact('jadwal', 'kategori'));
    }

    public function apiGetByKategori($kategori)
    {
        $now = Carbon::today();

        $jadwal = JadwalPelayananKategorial::where('kategori', $kategori)
            ->where('tanggal', '>=', $now)
            ->where('status', 'active')
            ->orderBy('tanggal')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $jadwal
        ]);
    }
}
