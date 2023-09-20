<?php

namespace App\Http\Controllers\Skripsi;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;
use App\Models\Skripsi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkripsiMahasiswaController extends Controller
{
    public function index()
    {
        $skripsis = Skripsi::where('id_mahasiswa', Auth::user()->mahasiswa->id)->get();
        return view('mahasiswa.skripsi_history', compact('skripsis'));
    }

    public function create(Request $request)
    {
        $jumlah_pengajuan_dieksekusi = Skripsi::where([
            ['id_mahasiswa', Auth::user()->mahasiswa->id],
            ['status', '<>' ,'ditolak'],

        ])->count();
        $data = [
            'status_bimbingan' => true,
            'jumlah_pengajuan_dieksekusi' => $jumlah_pengajuan_dieksekusi,
        ];
        return view('mahasiswa.skripsi_pengajuan', $data);
    }

    public function show(string $id)
    {
        $skripsi = Skripsi::find($id);
        return view('mahasiswa.detail_skripsi_pengajuan', compact('skripsi'));
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

        $name_folder = Auth::user()->mahasiswa->nama .'-'. Auth::user()->mahasiswa->nim;
        //cek apakah folder sudah ada
        if (Storage::exists('public/Pengajuan_Skripsi/' . $name_folder . '/') == false) {
            //buat folder
            Storage::makeDirectory('public/Pengajuan_Skripsi/' . $name_folder . '/');
        }

        $jumlah_pengajuan = Skripsi::where('id_mahasiswa', Auth::user()->mahasiswa->id)->count();
        $file_ke = 0;
        if($jumlah_pengajuan === 0){
            $file_ke = 1;
        }else{
            $file_ke = $jumlah_pengajuan + 1;
        }

        //upload file skla
        $file_skla = $request->file('skla');
        $nama_file_skla = Auth::user()->mahasiswa->nama . "_SKLA-" .$file_ke . "." . $file_skla->getClientOriginalExtension();
        Storage::putFileAs('public/Pengajuan_Skripsi/' . $name_folder . '/', $file_skla, $nama_file_skla);


        //upload file skkm
        $file_skkm = $request->file('skkm');
        $nama_file_skkm = Auth::user()->mahasiswa->nama . "_SKKM-" .$file_ke . "." . $file_skkm->getClientOriginalExtension();
        Storage::putFileAs('public/Pengajuan_Skripsi/' . $name_folder . '/', $file_skkm, $nama_file_skkm);

        //upload file kompen
        $file_kompen = $request->file('kompen');
        $nama_file_kompen = Auth::user()->mahasiswa->nama . "_Kompen-" .$file_ke . "." . $file_kompen->getClientOriginalExtension();
        Storage::putFileAs('public/Pengajuan_Skripsi/' . $name_folder . '/', $file_kompen, $nama_file_kompen);

        // assign id_dosen_pembimbing
        $bimbingan = Bimbingan::where('id_mahasiswa', Auth::user()->mahasiswa->id)->first();
        $skripsi = new Skripsi();
        $skripsi->id_mahasiswa = Auth::user()->mahasiswa->id;
        $skripsi->id_dosen_pembimbing_1 = $bimbingan->id_dosen_pembimbing_1;
        $skripsi->id_dosen_pembimbing_2 = $bimbingan->id_dosen_pembimbing_2;
        /*menambah id dosen pembimbing abstrak*/
        $skripsi->status = 'dikirim';
        $skripsi->file_1 = $nama_file_skla;
        $skripsi->file_2 = $nama_file_skkm;
        $skripsi->file_3 = $nama_file_kompen;
        $skripsi->save();

        return redirect()->route('skripsi.index')->with('success', 'Skripsi berhasil diajukan');
    }
}
