<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use Carbon\Carbon;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $endOfWeek = Carbon::now()->endOfWeek();

        $laporan = LaporanKeuangan::whereBetween('tanggal', [$today, $endOfWeek])->get();
        return view('frontend.keuangan.index', compact('laporSan'));
    }
}

