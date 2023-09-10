<?php

namespace App\Http\Controllers\Skripsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skripsi;
use Illuminate\Support\Facades\Auth;

class SkripsiMahasiswaController extends Controller
{
    public function index()
    {
        $skripsis = Skripsi::where('id_mahasiswa', Auth::user()->mahasiswa->id)->get();
        return view('mahasiswa.skripsi_history', compact('skripsis'));
    }

    public function create(Request $request)
    {
        return view('mahasiswa.skripsi_pengajuan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'path_dokumen' => 'required|string',
        ], [
            'judul.required' => 'Judul skripsi wajib diisi.',
            'path_dokumen.required' => 'Path dokumen wajib diisi.',
        ]);

        $skripsi = new Skripsi();
        $skripsi->id_mahasiswa = Auth::user()->mahasiswa->id;
        $skripsi->judul = $request->input('judul');
        $skripsi->status = 'dikirim';
        $skripsi->path_dokumen = $request->input('path_dokumen');
        $skripsi->save();

        return redirect()->route('skripsi.index')->with('success', 'Skripsi berhasil diajukan');
    }
}
