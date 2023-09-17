<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Bimbingan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BimbinganKPSController extends Controller
{
    public  function index()
    {
        $bimbingans = Bimbingan::where('status', 'diterima admin')->paginate(10);

        return view('dosen.KPS.list_bimbingan', compact('bimbingans'));
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

    public function show($id)
    {
        $bimbingan = Bimbingan::find($id);
        $dosens = Dosen::all();
        return view('dosen.KPS.detail_bimbingan', compact('bimbingan', 'dosens'));
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'dosen_pembimbing_1' => 'required',
            'dosen_pembimbing_2' => 'required',
            'dosen_pembimbing_abstrak' => 'required',
        ], [
            'dosen_pembimbing_1.required' => 'Dosen pembimbing 1 wajib diisi',
            'dosen_pembimbing_2.required' => 'Dosen pembimbing 2 wajib diisi',
            'dosen_pembimbing_abstrak.required' => 'Dosen pembimbing Abstrak wajib diisi',
        ]);

        $bimbingan = Bimbingan::find($id);
        $bimbingan->id_dosen_pembimbing_1 = $request->dosen_pembimbing_1;
        $bimbingan->id_dosen_pembimbing_2 = $request->dosen_pembimbing_2;
        $bimbingan->id_dosen_pembimbing_abstrak = $request->dosen_pembimbing_abstrak;
        $bimbingan->status = 'diterima kps';
        $bimbingan->save();

        return redirect()->route('bimbingan-kps.index')->with('success', 'Status berhasil diperbarui');
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
        $bimbingans = Bimbingan::where('status', 'diterima kps')->get();
        return view('dosen.KPS.history_bimbingan', compact('bimbingans'));
    }

    public function historyShow(string $id)
    {
        $bimbingan = Bimbingan::find($id);
        return view('dosen.KPS.history_detail_bimbingan', compact('bimbingan'));
    }
}
