<?php

namespace App\Http\Controllers\Skripsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skripsi;
use App\Models\Dosen;

class SkripsiKPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skripsis = Skripsi::where('status', 'diproses')->get();
        return view('dosen.KPS.list_skripsi', compact('skripsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skripsi = Skripsi::find($id);
        $dosens = Dosen::all();
        return view('dosen.KPS.detail_skripsi', compact('skripsi', 'dosens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'dosen_penguji_skripsi' => 'required',
            'dosen_pembimbing_1' => 'required',
            'dosen_pembimbing_2' => 'required',
        ], [
            'dosen_penguji_skripsi.required' => 'Dosen penguji skripsi wajib diisi',
            'dosen_pembimbing_1.required' => 'Dosen pembimbing 1 wajib diisi',
            'dosen_pembimbing_2.required' => 'Dosen pembimbing 2 wajib diisi',
        ]);

        $skripsi = Skripsi::find($id);
        $skripsi->id_dosen_penguji_skripsi = $request->dosen_penguji_skripsi;
        $skripsi->id_dosen_pembimbing_1 = $request->dosen_pembimbing_1;
        $skripsi->id_dosen_pembimbing_2 = $request->dosen_pembimbing_2;
        $skripsi->status = 'dikirim';
        $skripsi->save();

        return redirect()->route('skripsi-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function history()
    {
        $skripsis = Skripsi::where('status', 'diterima')->get();
        return view('dosen.KPS.history_skripsi', compact('skripsis'));
    }

    public function historyShow(string $id)
    {
        $skripsi = Skripsi::find($id);
        return view('dosen.KPS.history_detail_skripsi', compact('skripsi'));
    }
}
