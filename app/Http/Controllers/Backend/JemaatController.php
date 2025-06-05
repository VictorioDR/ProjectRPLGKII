<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;

class JemaatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // hanya user login yang bisa akses
    }

    public function index()
    {
        $jemaat = Jemaat::orderBy('nama')->get();
        return view('backend.jemaat.index', compact('jemaat'));
    }

    public function create()
    {
        return view('backend.jemaat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:jemaat,email',
            'status' => 'required|in:aktif,tidak_aktif,pindah,meninggal',
        ]);

        Jemaat::create($validated);

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil ditambahkan');
    }

    public function show($id)
    {
        $jemaat = Jemaat::findOrFail($id);
        return view('backend.jemaat.show', compact('jemaat'));
    }

    public function edit($id)
    {
        $jemaat = Jemaat::findOrFail($id);
        return view('backend.jemaat.edit', compact('jemaat'));
    }

    public function update(Request $request, $id)
    {
        $jemaat = Jemaat::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:jemaat,email,' . $jemaat->id,
            'status' => 'required|in:aktif,tidak_aktif,pindah,meninggal',
        ]);

        $jemaat->update($validated);

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jemaat = Jemaat::findOrFail($id);
        $jemaat->delete();

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dihapus');
    }
}
