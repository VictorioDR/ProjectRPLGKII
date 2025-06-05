<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('frontend.galeri.index', compact('galeri'));
    }
}
