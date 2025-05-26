<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;
use Carbon\Carbon;

class JadwalIbadahController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $endOfWeek = Carbon::now()->endOfWeek();

        $jadwal = JadwalIbadah::whereBetween('tanggal', [$today, $endOfWeek])->get();
        return view('frontend.jadwal.ibadah', compact('jadwal'));
    }
}
