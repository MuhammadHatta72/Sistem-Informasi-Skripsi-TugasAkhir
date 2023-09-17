<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Outline\StoreOutlineMahasiswaRequest;
use App\Http\Requests\Outline\UpdateOutlineMahasiswaRequest;
use Illuminate\Http\Request;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BimbinganPengajuanController extends Controller
{
    public function index()
    {
        $bimbingans = Bimbingan::where('id_mahasiswa', Auth::user()->mahasiswa->id)->get();
        return view('mahasiswa.bimbingan_history', compact('bimbingans'));
    }

    public function create(Request $request)
    {
        $jumlah_pengajuan_dieksekusi = Bimbingan::where([
            ['id_mahasiswa', Auth::user()->mahasiswa->id],
            ['status', '<>' ,'ditolak'],

        ])->count();
        $data = [
            'status_proposal' => true,
            'jumlah_pengajuan_dieksekusi' => $jumlah_pengajuan_dieksekusi,
        ];
        return view('mahasiswa.bimbingan_pengajuan', $data);
    }

    public function show(String  $id)
    {
        $bimbingan = Bimbingan::find($id);
        return view('mahasiswa.detail_bimbingan_pengajuan', compact('bimbingan'));
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

        $name_folder = Auth::user()->mahasiswa->nama .'-'. Auth::user()->mahasiswa->nim;
        //cek apakah folder sudah ada
        if (Storage::exists('public/proposalbimbingan/' . $name_folder . '/') == false) {
            //buat folder
            Storage::makeDirectory('public/proposalbimbingan/' . $name_folder . '/');
        }

        $jumlah_pengajuan = Bimbingan::where('id_mahasiswa', Auth::user()->mahasiswa->id)->count();
        $file_ke = 0;
        if($jumlah_pengajuan === 0){
            $file_ke = 1;
        }else{
            $file_ke = $jumlah_pengajuan + 1;
        }

        //upload proposalbimbingan
        $file_proposalbimbingan = $request->file('proposalbimbingan');
        $nama_file_proposalbimbingan = Auth::user()->mahasiswa->nama . "_proposalbimbingan-" .$file_ke . "." . $file_proposalbimbingan->getClientOriginalExtension();
        Storage::putFileAs('public/proposalbimbingan/' . $name_folder . '/', $file_proposalbimbingan, $nama_file_proposalbimbingan);

        $bimbingan = new Bimbingan();
        $bimbingan->id_mahasiswa = Auth::user()->mahasiswa->id;
        $bimbingan->judul = $request->input('judul');
        $bimbingan->status = 'dikirim';
        $bimbingan->proposalbimbingan = $nama_file_proposalbimbingan;
        $bimbingan->save();

        return redirect()->route('bimbingan_pengajuan.index')->with('success', 'Bimbingan berhasil diajukan');
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
