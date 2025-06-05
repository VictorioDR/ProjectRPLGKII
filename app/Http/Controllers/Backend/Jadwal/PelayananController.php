<?php

namespace App\Http\Controllers\Backend\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelayanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['jadwalPublic']);
    }

    public function index()
    {
        $jadwal = JadwalPelayanan::orderByDesc('tanggal')->get();
        return view('backend.jadwal_pelayanan.index', compact('jadwal'));
    }

    public function create()
    {
        return view('backend.jadwal_pelayanan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'wl' => 'nullable|string|max:255',
            'singers' => 'nullable|string',
            'firman_tuhan' => 'nullable|string|max:255',
            'multimedia' => 'nullable|string',
            'musik_sound' => 'nullable|string',
            'koordinator_ibadah' => 'nullable|string|max:255',
            'musik' => 'nullable|string',
            'sifat' => 'required|in:umum,khusus',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        JadwalPelayanan::create($validated);

        return redirect()->route('jadwal-pelayanan.index')->with('success', 'Jadwal pelayanan berhasil ditambahkan');
    }

    public function show($id)
    {
        $jadwal = JadwalPelayanan::findOrFail($id);
        return view('backend.jadwal_pelayanan.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = JadwalPelayanan::findOrFail($id);
        return view('backend.jadwal_pelayanan.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'wl' => 'nullable|string|max:255',
            'singers' => 'nullable|string',
            'firman_tuhan' => 'nullable|string|max:255',
            'multimedia' => 'nullable|string',
            'musik_sound' => 'nullable|string',
            'koordinator_ibadah' => 'nullable|string|max:255',
            'musik' => 'nullable|string',
            'sifat' => 'required|in:umum,khusus',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        $jadwal = JadwalPelayanan::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal-pelayanan.index')->with('success', 'Jadwal pelayanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPelayanan::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-pelayanan.index')->with('success', 'Jadwal pelayanan berhasil dihapus');
    }

    public function jadwalPublic()
    {
        $now = Carbon::today();

        $jadwalMendatang = JadwalPelayanan::where('tanggal', '>=', $now)
            ->where('status', 'active')
            ->where('sifat', 'umum')
            ->orderBy('tanggal')
            ->get();

        return view('frontend.jadwal_pelayanan', compact('jadwalMendatang'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = JadwalPelayanan::query();

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('jenis', 'like', "%$keyword%")
                    ->orWhere('tempat', 'like', "%$keyword%")
                    ->orWhere('wl', 'like', "%$keyword%")
                    ->orWhere('deskripsi', 'like', "%$keyword%");
            });
        }

        if ($startDate) {
            $query->where('tanggal', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('tanggal', '<=', $endDate);
        }

        $jadwal = $query->orderByDesc('tanggal')->get();

        return view('backend.jadwal_pelayanan.index', compact('jadwal'));
    }
}
