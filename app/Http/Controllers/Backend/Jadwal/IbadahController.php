<?php

namespace App\Http\Controllers\Backend\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IbadahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['jadwalPublic', 'kalender']);
    }

    public function index()
    {
        $jadwal = JadwalIbadah::orderByDesc('tanggal')->get();
        return view('jadwal_ibadah.index', compact('jadwal'));
    }

    public function create()
    {
        return view('jadwal_ibadah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'tema' => 'nullable|string|max:255',
            'pengkhotbah' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        JadwalIbadah::create($validated);

        return redirect()->route('jadwal-ibadah.index')->with('success', 'Jadwal ibadah berhasil ditambahkan');
    }

    public function show($id)
    {
        $jadwal = JadwalIbadah::findOrFail($id);
        return view('jadwal_ibadah.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = JadwalIbadah::findOrFail($id);
        return view('jadwal_ibadah.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required|string|max:255',
            'tema' => 'nullable|string|max:255',
            'pengkhotbah' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,cancelled,completed'
        ]);

        $jadwal = JadwalIbadah::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal-ibadah.index')->with('success', 'Jadwal ibadah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalIbadah::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-ibadah.index')->with('success', 'Jadwal ibadah berhasil dihapus');
    }

    public function jadwalPublic()
    {
        $now = Carbon::today();

        $jadwalMendatang = JadwalIbadah::where('tanggal', '>=', $now)
            ->where('status', 'active')
            ->orderBy('tanggal')
            ->get();

        $jadwalSelesai = JadwalIbadah::where(function ($query) use ($now) {
            $query->where('tanggal', '<', $now)
                ->orWhere('status', 'completed');
        })
            ->orderByDesc('tanggal')
            ->limit(5)
            ->get();

        return view('jadwal_ibadah', compact('jadwalMendatang', 'jadwalSelesai'));
    }

    public function kalender()
    {
        $jadwal = JadwalIbadah::where('status', 'active')
            ->orderBy('tanggal')
            ->get();

        return view('kalender_ibadah', compact('jadwal'));
    }
}
