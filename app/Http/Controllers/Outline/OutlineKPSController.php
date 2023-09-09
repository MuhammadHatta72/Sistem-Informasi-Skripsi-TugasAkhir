<?php

namespace App\Http\Controllers\Outline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Outline\StoreOutlineMahasiswaRequest;
use App\Http\Requests\Outline\UpdateOutlineMahasiswaRequest;
use App\Models\Outline;
use App\Models\User;
use Illuminate\Http\Request;

class OutlineKPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlines = Outline::paginate(5);
        return view('dosen.KPS.list_outline', compact('outlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.outline_pengajuan');
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
    public function show($id)
    {
        $outline = Outline::find($id);
        $dosens = User::with('dosen')->where('sub_role', null)->where('role', 'dosen')->get();
        return view('dosen.KPS.detail_outline', compact('outline', 'dosens'));
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

    public function validasi(Request $request)
    {
        if ($request->status == 'Diterima') {
            if ($request->dosen1 == $request->dosen2) {
                return redirect()->route('outline_KPS.index')->with('error', 'Dosen penilai tidak boleh sama');
            }
            $request->validate([
                'dosen1' => 'required',
                'dosen2' => 'required',
            ]);

            $outline = Outline::find($request->id);
            $outline->id_dosen_penilai_1 = $request->dosen1;
            $outline->id_dosen_penilai_2 = $request->dosen2;
            $outline->status = $request->status;
            $outline->save();
        } else if ($request->status == 'Ditolak') {
            $outline = Outline::find($request->id);
            $outline->status = $request->status;
            $outline->save();
        }

        return redirect()->route('outline_KPS.index')->with('success', 'Status berhasil diperbarui');
    }
}
