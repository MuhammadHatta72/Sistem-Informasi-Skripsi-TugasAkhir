<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProposalKPSController extends Controller
{
    public  function index()
    {
        $proposals = Proposal::where('status', 'dikirim')->paginate(10);

        return view('dosen.KPS.list_proposal', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        $dosens = User::with('dosen')->where('sub_role', null)->where('role', 'dosen')->get();
        return view('dosen.KPS.detail_proposal', compact('proposal', 'dosens'));
    }

    public function validasi(Request $request)
    {
        if ($request->status == 'Diterima') {
            if ($request->dosen1 == $request->dosen2) {
                return redirect()->route('proposal_kps.index')->with('error', 'Dosen penilai tidak boleh sama');
            }
            $request->validate([
                'dosen1' => 'required',
                'dosen2' => 'required',
            ]);

            $proposal = Proposal::find($request->id);
            $proposal->id_dosen_penilai_1 = $request->dosen1;
            $proposal->id_dosen_penilai_2 = $request->dosen2;
            $proposal->status = $request->status;
            $proposal->save();
        } else if ($request->status == 'Ditolak') {
            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();
        }

        return redirect()->route('proposal_kps.index')->with('success', 'Status berhasil diperbarui');
    }
}
