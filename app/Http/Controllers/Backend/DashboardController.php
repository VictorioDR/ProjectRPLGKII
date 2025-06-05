<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AspirasiJemaat;
use App\Models\JadwalIbadah;
use App\Models\JadwalPelayanan;
use App\Models\JadwalPelayananKategorial;
use App\Models\JadwalPelayananMingguan;
use App\Models\Jemaat;
use App\Models\LaporanKeuangan;
use App\Models\Pengumuman;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah data utama
        $jemaatCount = Jemaat::count();
        $aspirasiCount = AspirasiJemaat::count();

        // Range minggu ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Jumlah jadwal ibadah dan pelayanan minggu ini
        $jadwalIbadahCount = JadwalIbadah::whereBetween('tanggal', [$startOfWeek, $endOfWeek])->count();
        $jadwalPelayananCount = JadwalPelayanan::whereBetween('waktu', [$startOfWeek, $endOfWeek])->count();

        // Laporan keuangan (dihitung total data)
        $laporanKeuanganCount = LaporanKeuangan::count();

        // Jumlah pengumuman aktif berdasarkan tanggal hari ini
        $pengumumanCount = Pengumuman::where('aktif', true)
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->count();

        // Jadwal Pelayanan Mingguan mendatang
        $jadwalPelayananMingguan = JadwalPelayananMingguan::whereDate('tanggal', '>=', now())
            ->orderBy('tanggal')
            ->limit(5)
            ->get();

        // Jadwal Pelayanan Kategorial mendatang
        $jadwalPelayananKategorial = JadwalPelayananKategorial::whereDate('tanggal', '>=', now())
            ->orderBy('tanggal')
            ->limit(5)
            ->get();

        return view('backend.dashboard.index', compact(
            'jemaatCount',
            'aspirasiCount',
            'jadwalIbadahCount',
            'jadwalPelayananCount',
            'laporanKeuanganCount',
            'pengumumanCount',
            'jadwalPelayananMingguan',
            'jadwalPelayananKategorial'
        ));
    }

    public function profile()
    {
        return view('frontend.user.profile');
    }
}
