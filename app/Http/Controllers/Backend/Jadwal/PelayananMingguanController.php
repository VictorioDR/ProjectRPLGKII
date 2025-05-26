<?php

namespace App\Http\Controllers\Backend\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelayananMingguan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PelayananMingguanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['public']);
    }

    public function index()
    {
        $jadwal = JadwalPelayananMingguan::orderByDesc('tanggal')->get();
        return view('backend.jadwal_pelayanan_mingguan.index', compact('jadwal'));
    }

    public function create()
    {
        return view('backend.jadwal_pelayanan_mingguan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'petugas' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        JadwalPelayananMingguan::create($validated);

        return redirect()->route('jadwal-pelayanan-mingguan.index')->with('success', 'Jadwal pelayanan mingguan berhasil ditambahkan');
    }

    public function show($id)
    {
        $jadwal = JadwalPelayananMingguan::findOrFail($id);
        return view('backend.jadwal_pelayanan_mingguan.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = JadwalPelayananMingguan::findOrFail($id);
        return view('backend.jadwal_pelayanan_mingguan.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'petugas' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        $jadwal = JadwalPelayananMingguan::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal-pelayanan-mingguan.index')->with('success', 'Jadwal pelayanan mingguan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPelayananMingguan::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-pelayanan-mingguan.index')->with('success', 'Jadwal pelayanan mingguan berhasil dihapus');
    }

    public function public()
    {
        $now = Carbon::today();

        $jadwal = JadwalPelayananMingguan::where('tanggal', '>=', $now)
            ->where('status', 'active')
            ->orderBy('tanggal')
            ->get();

        return view('frontend.jadwal_pelayanan_mingguan', compact('jadwal'));
    }
}
