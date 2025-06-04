<?php

namespace App\Http\Controllers\Backend\Laporan;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['public']);
    }

    public function index()
    {
        $laporan = LaporanKeuangan::orderByDesc('tanggal')->get();
        $totalPemasukan = $laporan->where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = $laporan->where('jenis', 'pengeluaran')->sum('jumlah');

        return view('keuangan.index', compact('laporan', 'totalPemasukan', 'totalPengeluaran'));
    }

    public function create()
    {
        return view('keuangan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        LaporanKeuangan::create($validated);

        return redirect()->route('keuangan.index')->with('success', 'Laporan keuangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        return view('keuangan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        $laporan->update($validated);

        return redirect()->route('keuangan.index')->with('success', 'Laporan keuangan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('keuangan.index')->with('success', 'Laporan keuangan berhasil dihapus');
    }

    public function public()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $laporan = LaporanKeuangan::whereBetween('tanggal', [$startOfWeek, $endOfWeek])
            ->orderBy('tanggal')
            ->get();

        return view('keuangan.index', compact('laporan'));
    }
    public function export()
    {
        // Implementasi export Excel menggunakan Laravel Excel
        return Excel::download(new LaporanKeuanganExport, 'laporan-keuangan.xlsx');
    }
}
