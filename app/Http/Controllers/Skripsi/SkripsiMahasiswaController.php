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
        $data = [
            'status_bimbingan' => true
        ];
        return view('mahasiswa.skripsi_pengajuan', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'skla' => 'required|mimes:pdf|max:20000',
            'skkm' => 'required|mimes:pdf|max:20000',
            'kompen' => 'required|mimes:pdf|max:20000'
        ], [
            'skla.required' => 'SKLA wajib diisi',
            'skla.mimes' => 'Format file salah',
            'skkm.required' => 'SKKM wajib diisi',
            'skkm.mimes' => 'Format file salah',
            'kompen.required' => 'Kompen wajib diisi',
            'kompen.mimes' => 'Format file salah',
        ]);
        dd($request);

        $skripsi = new Skripsi();
        $skripsi->id_mahasiswa = Auth::user()->mahasiswa->id;
        $skripsi->judul = $request->input('judul');
        $skripsi->status = 'dikirim';
        $skripsi->path_dokumen = $request->input('path_dokumen');
        $skripsi->save();

        return redirect()->route('skripsi.index')->with('success', 'Skripsi berhasil diajukan');
    }
}
