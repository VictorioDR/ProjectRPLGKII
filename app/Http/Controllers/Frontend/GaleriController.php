<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request) {
        $galeri = Galeri::paginate(9);

        foreach ($galeri as $item) {
            $item->gambar = file_exists(public_path('uploads/galeri/' . $item->gambar))
                ? $item->gambar
                : 'default.jpg';
        }

        return view('frontend.galeri', compact('galeri'));
    }

}
