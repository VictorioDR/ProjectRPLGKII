<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Absensi;
use App\Models\JadwalIbadah;
use App\Models\JadwalPelayanan;
use App\Models\LaporanKeuangan;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah jemaat yang terdaftar
        $jemaatCount = Jemaat::count();

        // Mengambil jumlah absensi jemaat hari ini
        $absensiCount = Absensi::whereDate('created_at', Carbon::today())->count();

        // Mengambil jumlah jadwal ibadah minggu ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $jadwalIbadahCount = JadwalIbadah::whereBetween('tanggal', [$startOfWeek, $endOfWeek])->count();

        // Mengambil jumlah jadwal pelayanan minggu ini
        $jadwalPelayananCount = JadwalPelayanan::whereBetween('tanggal', [$startOfWeek, $endOfWeek])->count();

        // Mengambil jumlah laporan keuangan yang tertunggak
        $laporanKeuanganCount = LaporanKeuangan::where('status', 'tertunggak')->count();

        // Mengambil jumlah pengumuman yang aktif
        $pengumumanCount = Pengumuman::where('status', 'aktif')->count();

        // Mengambil data jadwal pelayanan mingguan terdekat (diurutkan berdasarkan tanggal)
        $jadwalPelayananMingguan = JadwalPelayanan::where('jenis', 'mingguan')
            ->where('tanggal', '>=', Carbon::now())
            ->orderBy('tanggal', 'asc')
            ->limit(5)
            ->get();

        // Mengambil data jadwal pelayanan kategorial terdekat (diurutkan berdasarkan tanggal)
        $jadwalPelayananKategorial = JadwalPelayanan::where('jenis', 'kategorial')
            ->where('tanggal', '>=', Carbon::now())
            ->orderBy('tanggal', 'asc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'jemaatCount',
            'absensiCount',
            'jadwalIbadahCount',
            'jadwalPelayananCount',
            'laporanKeuanganCount',
            'pengumumanCount',
            'jadwalPelayananMingguan',
            'jadwalPelayananKategorial'
        ));
    }
}
