<?php

namespace App\Http\Controllers\Outline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Outline\StoreOutlineMahasiswaRequest;
use App\Http\Requests\Outline\UpdateOutlineMahasiswaRequest;
use App\Models\Bidang;
use App\Models\Outline;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutlineMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlines = Outline::where('id_mahasiswa', auth()->user()->mahasiswa->id)->paginate(5);
        return view('mahasiswa.outline_history', compact('outlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = DB::table('bidangs')
            ->join('prodi_bidang', 'bidangs.id', '=', 'prodi_bidang.id_bidang')
            ->where('prodi_bidang.id_prodi', '=', auth()->user()->mahasiswa->id_prodi)
            ->pluck('bidangs.nama', 'bidangs.id');

        return view('mahasiswa.outline_pengajuan', compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOutlineMahasiswaRequest $request)
    {
        $outline = new Outline();
        $outline->id_mahasiswa = auth()->user()->mahasiswa->id;
        $outline->id_bidang_1 = $request->bidang1;
        $outline->id_bidang_2 = $request->bidang2;
        $outline->judul_1 = $request->judul1;
        $outline->judul_2 = $request->judul2;
        $outline->pendahuluan_1 = $request->pendahuluan1;
        $outline->pendahuluan_2 = $request->pendahuluan2;
        $outline->teori_1 = $request->teori1;
        $outline->teori_2 = $request->teori2;
        $outline->metpen_1 = $request->metpen1;
        $outline->metpen_2 = $request->metpen2;
        $outline->status = 'Pengajuan';
        $outline->save();

        return redirect(route('outline_mahasiswa.index'))->with('success', 'Outline berhasil diajukan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Outline $outline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outline $outline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutlineMahasiswaRequest $request, Outline $outline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outline $outline)
    {
        //
    }
}
