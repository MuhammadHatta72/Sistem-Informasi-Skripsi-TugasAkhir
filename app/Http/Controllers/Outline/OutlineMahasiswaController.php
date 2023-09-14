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
        $request->validated([
            'judul' => 'required|string|max:255',
            'bab1' => 'required|string',
            'bab2' => 'required|string',
            'bab3' => 'required|string',
        ]);

        $outline = new Outline();
        $outline->id_mahasiswa = auth()->user()->mahasiswa->id;
        $outline->judul = $request->judul;
        $outline->id_dosen_penilai_1 = null;
        $outline->id_dosen_penilai_2 = null;
        $outline->id_jadwal = null;
        $outline->bab1 = $request->bab1;
        $outline->bab2 = $request->bab2;
        $outline->bab3 = $request->bab3;
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
