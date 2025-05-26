<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Carbon\Carbon;

class PengumumanController extends Controller
{
    public function publik()
    {
        $today = Carbon::today();

        $pengumuman = Pengumuman::where('status', 'aktif')
            ->whereDate('tanggal_mulai', '<=', $today)
            ->whereDate('tanggal_selesai', '>=', $today)
            ->orderBy('tanggal_mulai', 'desc')
            ->get();

        return view('frontend.pengumuman.index', compact('pengumuman'));
    }
}
