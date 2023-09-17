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
        $proposals = Proposal::where('status', 'Diterima')->paginate(10);
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
        $dosens = Dosen::join('users', 'users.id_dosen', '=', 'dosens.id')->where('sub_role', '')->orWhere('sub_role', null)->get();
        return view('dosen.penguji_proposal.detail_proposal', compact('proposal', 'dosens'));
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
        if ($request->status == 'Lulus') {
            $request->validate([
                'nilai_1' => 'required',
            ]);

            $proposal = Proposal::find($request->id);
            $proposal->nilai_1 = $request->nilai_1;
            $proposal->status = $request->status;
            $proposal->save();

            return redirect()->route('proposal_dosen_penguji.index')->with('success', 'Selamat Anda Lulus');
        } else if ($request->status == 'Tidak Lulus') {
            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();

            return redirect()->route('proposal_dosen_penguji.index')->with('success', 'Maaf, Anda Tidak Lulus');
        }
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
