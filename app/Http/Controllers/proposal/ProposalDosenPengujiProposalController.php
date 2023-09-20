<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProposalDosenPengujiProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::where('status', 'Diterima KPS')->paginate(10);
        return view('dosen.penguji_proposal.list_proposal', compact('proposals'));
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
    public function show($id)
    {
        $proposal = Proposal::find($id);
        [$listDosen, $slots] = limit();
        return view('dosen.penguji_proposal.detail_proposal', compact('proposal', 'listDosen', 'slots'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function validasi(Request $request)
    {
        $request->validate([
            'nilai' => 'required',
        ]);

        $proposal = Proposal::find($request->id);
        if ($proposal->id_dosen_penguji_proposal_1 == Auth::user()->dosen->id) {
            $proposal->nilai_1 = $request->nilai;
            $proposal->status1 = $request->status;
        } else if ($proposal->id_dosen_penguji_proposal_2 == Auth::user()->dosen->id) {
            $proposal->nilai_2 = $request->nilai;
            $proposal->status2 = $request->status;
        }

        if ($proposal->status1 == 'Diterima DosenPenguji1' && $proposal->status2 == 'Diterima DosenPenguji2') {
            $proposal->status = 'Lulus';
        } elseif ($proposal->status1 == 'Diterima DosenPenguji1' && $proposal->status2 == 'Diterima DosenPenguji2') {
            $proposal->status = 'Lulus dengan Revisi';
        } elseif ($proposal->status1 == 'Ditolak DosenPenguji1' || $proposal->status2 == 'Ditolak DosenPenguji2') {
            $proposal->status = 'Tidak Lulus';
        }
        $proposal->save();

        return redirect()->route('proposal_dosen_penguji.index')->with('success', 'Berhasil Menilai Proposal');
    }

    public function download($id)
    {
        $proposal = Proposal::find($id);
        $file = $proposal->file;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download(storage_path("app/public/$file"), 'proposal_mahasiswa.pdf', $headers);
    }
}
