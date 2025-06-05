<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;
use Carbon\Carbon;

class JadwalIbadahController extends Controller
{
    public function index()
    {
        // Ambil hari ini dan akhir minggu
        $today = Carbon::today();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Filter jadwal ibadah yang berada antara hari ini hingga akhir pekan
        $jadwal_ibadah = JadwalIbadah::whereBetween('tanggal', [$today, $endOfWeek])->get();

        // Kirim data ke view
        return view('frontend.jadwal-ibadah', compact('jadwal_ibadah'));
    }
}
