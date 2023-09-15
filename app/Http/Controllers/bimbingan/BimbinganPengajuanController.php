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
        return view('mahasiswa.bimbingan_pengajuan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'data1' => 'required|string',
            'data2' => 'required|string',
            'data3' => 'required|string',
        ], [
            'judul.required' => 'Judul bimbingan wajib diisi.',
            'data1.required' => 'Data 1 wajib diisi.',
            'data2.required' => 'Data 2 wajib diisi.',
            'data3.required' => 'Data 3 wajib diisi.',
        ]);

        $bimbingan = new Bimbingan();
        $bimbingan->id_mahasiswa = Auth::user()->mahasiswa->id;
        $bimbingan->judul = $request->input('judul');
        $bimbingan->data1 = $request->input('data1');
        $bimbingan->data2 = $request->input('data2');
        $bimbingan->data3 = $request->input('data3');

        $bimbingan->save();

        return redirect()->route('bimbingan_pengajuan.index')->with('success', 'Bimbingan berhasil diajukan');
    }
}
