<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelayanan;
use Carbon\Carbon;

class JadwalPelayananController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $endOfWeek = Carbon::now()->endOfWeek();

        $jadwal = JadwalPelayanan::whereBetween('tanggal', [$today, $endOfWeek])->get();
        return view('frontend.jadwal.pelayanan', compact('jadwal'));
    }
}
