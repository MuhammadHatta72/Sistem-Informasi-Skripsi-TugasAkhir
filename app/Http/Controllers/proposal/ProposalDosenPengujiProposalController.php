<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\Dosen;

class ProposalDosenPengujiProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::where('status', '!=', 'Ditolak')->paginate(10);
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
    public function show(string $id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('dosen.penguji_proposal.detail_proposal', compact('proposal'));
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
            'status' => 'required',
        ]);

        $proposal = Proposal::findOrFail($request->id);
        $proposal->status = $request->status;
        $proposal->save();

        return redirect()->route('proposal_dosen_penguji.index')->with('success', 'Proposal berhasil divalidasi');
    }
}
