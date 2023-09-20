<?php

namespace App\Http\Controllers\Skripsi;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;
use App\Models\Skripsi;
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;

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

        $dosens = Dosen::join('users', 'dosens.id', '=', 'users.id_dosen')
            ->where('users.role', '<>', 'kps')
            ->get();

        $listDosen = [];
        $slots = [];

        foreach ($dosens as $dosen) {
            $countPenilaiOutline = DB::table('outlines')
                ->where('status', '!=', 'Lulus')
                ->where('id_dosen_penilai_1', $dosen->id_dosen)
                ->orWhere('id_dosen_penilai_2', $dosen->id_dosen)
                ->count();

            $countPenilaiProposal = DB::table('proposals')
                ->where('status', '!=', 'Lulus')
                ->where('id_dosen_penguji_proposal_1', $dosen->id_dosen)
                ->orWhere('id_dosen_penguji_proposal_2', $dosen->id_dosen)
                ->count();

            $countPembimbingSkripsi = DB::table('bimbingans')
                ->where('id_dosen_pembimbing_1', $dosen->id_dosen)
                ->orWhere('id_dosen_pembimbing_2', $dosen->id_dosen)
                ->orWhere('id_dosen_pembimbing_abstrak', $dosen->id_dosen)
                ->count();

            $countPengujiSkripsi = DB::table('skripsis')
                ->where('id_dosen_penguji_skripsi', $dosen->id_dosen)
                ->count();

            $total = $countPenilaiOutline + $countPenilaiProposal + $countPembimbingSkripsi + $countPengujiSkripsi;

            if ($total <= $dosen->limit) {
                $listDosen[] = $dosen;
                $slots[] = $dosen->limit - $total;
            }
        }
        return view('dosen.KPS.detail_skripsi', compact('skripsi', 'listDosen', 'slots'));
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
        ], [
            'dosen_penguji_skripsi.required' => 'Dosen penguji skripsi wajib diisi',
        ]);


        $skripsi = Skripsi::find($id);
        $bimbingan = Bimbingan::where('id_mahasiswa', $skripsi->id_mahasiswa)->first();
        $skripsi->id_dosen_penguji_skripsi = $request->dosen_penguji_skripsi;
        $skripsi->id_dosen_pembimbing_1 = $bimbingan->id_dosen_pembimbing_1;
        $skripsi->id_dosen_pembimbing_2 = $bimbingan->id_dosen_pembimbing_2;
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
