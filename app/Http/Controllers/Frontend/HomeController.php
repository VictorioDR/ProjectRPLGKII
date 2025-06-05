<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;
use App\Models\JadwalPelayanan;
use App\Models\LaporanKeuangan;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // Nama hari, tanggal, dan bulan dengan format yang diinginkan.
        $churchDate = Carbon::now()->translatedFormat('l d F Y'); // Contoh: Minggu 05 November 2023

        // Kirim variabel $churchDate ke view (home.blade.php)
        return view('home', compact('churchDate'));
    }

    public function __construct()
    {
        $this->middleware('auth')->only('profile');
    }

    private function getWeeklyDateRange()
    {
        return [
            'start' => Carbon::today(),
            'end' => Carbon::now()->endOfWeek(),
        ];
    }

    private function renderView($viewName)
    {
        return view("frontend.$viewName");
    }

    public function home()
    {
        $dateRange = $this->getWeeklyDateRange();

        $jadwalIbadah = JadwalIbadah::whereBetween('tanggal', [$dateRange['start'], $dateRange['end']])->get();
        $jadwalPelayanan = JadwalPelayanan::whereBetween('tanggal', [$dateRange['start'], $dateRange['end']])->get();
        $laporanKeuangan = LaporanKeuangan::whereBetween('tanggal', [$dateRange['start'], $dateRange['end']])->get();

        $videoIbadahRaya = [
            'title' => 'Ibadah Umum',
            'tanggal' => 'Minggu 29 Maret 2020',
            'url' => 'https://www.youtube.com/embed/dummy-link'
        ];

        return view('frontend.home', compact(
            'jadwalIbadah',
            'jadwalPelayanan',
            'laporanKeuangan',
            'videoIbadahRaya'
        ));
    }

public function sejarahGereja()
{
    return $this->renderView('tentang');
}


    public function strukturPengurus()
    {
        return $this->renderView('tentang.struktur');
    }

    public function buletinGereja()
    {
        return $this->renderView('pengumuman.buletin');
    }

    public function ulangTahunJemaat()
    {
        return $this->renderView('pengumuman.ulang_tahun');
    }

    public function formAspirasi()
    {
        return $this->renderView('aspirasi.form');
    }

    public function galeri()
    {
        return $this->renderView('galeri');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $searchableModels = [
            'post' => ['model' => post::class, 'field' => 'title'],
            'pengumuman' => ['model' => Pengumuman::class, 'field' => 'judul'],
        ];

        $hasil = [];
        foreach ($searchableModels as $key => $search) {
            $hasil[$key] = $search['model']::where($search['field'], 'like', "%$keyword%")->get();
        }

        return view('frontend.search', compact('keyword', 'hasil'));
    }

    public function jadwalIbadahMingguan()
    {
        $dateRange = $this->getWeeklyDateRange();

        $jadwal = JadwalIbadah::whereBetween('tanggal', [$dateRange['start'], $dateRange['end']])->get();
        return view('frontend.jadwal.ibadah', compact('jadwal'));
    }

    public function jadwalPelayananMingguan()
    {
        $dateRange = $this->getWeeklyDateRange();

        $jadwal = JadwalPelayanan::whereBetween('tanggal', [$dateRange['start'], $dateRange['end']])->get();
        return view('frontend.jadwal.pelayanan', compact('jadwal'));
    }

    public function laporanKeuanganMingguan()
    {
        $dateRange = $this->getWeeklyDateRange();

        $laporan = LaporanKeuangan::whereBetween('tanggal', [$dateRange['start'], $dateRange['end']])->get();
        return view('frontend.keuangan.index', compact('laporan'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('frontend.profile', compact('user'));
    }
}
