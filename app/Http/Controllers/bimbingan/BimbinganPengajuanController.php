<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\Auth;

class BimbinganPengajuanController extends Controller
{
    public function index()
    {
        $bimbingans = Bimbingan::where('id_mahasiswa', Auth::user()->mahasiswa->id)->get();
        return view('mahasiswa.bimbingan_history', compact('bimbingans'));
    }

    public function create(Request $request)
    {
        $data = [
            'status_proposal' => true
        ];
    return view('mahasiswa.bimbingan_pengajuan', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'proposalbimbingan' => 'required|mimes:pdf|max:20000',
        ], [
            'judul.required' => 'Judul bimbingan wajib diisi.',
            'proposalbimbingan' => 'Proposal bimbingan wajib diisi.',
        ]);

        $bimbingan = new Bimbingan();
        $bimbingan->id_mahasiswa = Auth::user()->mahasiswa->id;
        $bimbingan->judul = $request->input('judul');
        $bimbingan->status = 'dikirim';
        $bimbingan->path_dokumen = $request->input('path_dokumen');
        $bimbingan->save();

        return redirect()->route('bimbingan_pengajuan.index')->with('success', 'Bimbingan berhasil diajukan');
    }
}
