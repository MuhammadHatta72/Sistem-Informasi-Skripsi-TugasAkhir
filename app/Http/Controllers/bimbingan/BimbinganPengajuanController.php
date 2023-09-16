<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Outline\StoreOutlineMahasiswaRequest;
use App\Http\Requests\Outline\UpdateOutlineMahasiswaRequest;
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
            'proposalbimbingan.required' => 'Proposal bimbingan wajib diisi.',
            'proposalbimbingan.mimes' => 'Proposal bimbingan harus berupa file PDF.',
            'proposalbimbingan.max' => 'Ukuran proposal bimbingan maksimal 20MB.',
        ]);

        $proposalbimbingan = $request->file('proposalbimbingan');

        if ($proposalbimbingan) {
            $fileExtension = $proposalbimbingan->getClientOriginalExtension();
            $fileName = 'proposal_' . time() . '.' . $fileExtension;
            $proposalbimbingan->move(public_path('storage/proposalbimbingan'), $fileName);

            $bimbingan = new Bimbingan();
            $bimbingan->id_mahasiswa = Auth::user()->mahasiswa->id;
            $bimbingan->judul = $request->input('judul');
            $bimbingan->status = 'pengajuan';
            $bimbingan->proposalbimbingan = $fileName;
            $bimbingan->save();

            return redirect()->route('bimbingan_pengajuan.index')->with('success', 'Bimbingan berhasil diajukan');
        }

        return back()->withErrors(['proposalbimbingan' => 'File proposal tidak ditemukan.']);
    }

    public function show(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBimbinganPengajuanRequest $request, Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimbingan $bimbingan)
    {
        //
    }

}
