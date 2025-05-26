<?php

namespace App\Http\Controllers\Backend\Informasi;

use App\Http\Controllers\Controller;
use App\Models\AspirasiJemaat;
use App\Models\Jemaat;
use Illuminate\Http\Request;

class AspirasiJemaatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $aspirasi = AspirasiJemaat::with('jemaat')->orderByDesc('created_at')->get();
        return view('backend.aspirasi.index', compact('aspirasi'));
    }

    public function create()
    {
        $jemaat = Jemaat::orderBy('nama')->get();
        return view('backend.aspirasi.create', compact('jemaat'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jemaat_id' => 'nullable|exists:jemaat,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'aspirasi' => 'required|string',
            'status' => 'required|in:pending,reviewed,addressed'
        ]);

        AspirasiJemaat::create($validated);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi jemaat berhasil ditambahkan');
    }

    public function show($id)
    {
        $aspirasi = AspirasiJemaat::with('jemaat')->findOrFail($id);
        return view('backend.aspirasi.show', compact('aspirasi'));
    }

    public function edit($id)
    {
        $aspirasi = AspirasiJemaat::findOrFail($id);
        $jemaat = Jemaat::orderBy('nama')->get();
        return view('backend.aspirasi.edit', compact('aspirasi', 'jemaat'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jemaat_id' => 'nullable|exists:jemaat,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'aspirasi' => 'required|string',
            'status' => 'required|in:pending,reviewed,addressed'
        ]);

        $aspirasi = AspirasiJemaat::findOrFail($id);
        $aspirasi->update($validated);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi jemaat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $aspirasi = AspirasiJemaat::findOrFail($id);
        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi jemaat berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,addressed'
        ]);

        $aspirasi = AspirasiJemaat::findOrFail($id);
        $aspirasi->update(['status' => $validated['status']]);

        return redirect()->route('aspirasi.index')->with('success', 'Status aspirasi berhasil diperbarui');
    }
}
