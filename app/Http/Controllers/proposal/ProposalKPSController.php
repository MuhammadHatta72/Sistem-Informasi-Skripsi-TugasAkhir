<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProposalKPSController extends Controller
{
    public  function index()
    {
        $proposals = Proposal::where('status', 'diproses')->paginate(10);

        return view('dosen.KPS.list_proposal', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        $dosens = Dosen::join('users', 'users.id_dosen', '=', 'dosens.id')->where('sub_role', '')->orWhere('sub_role', null)->get();
        return view('dosen.KPS.detail_proposal', compact('proposal', 'dosens'));
    }

    public function validasi(Request $request)
    {
        if ($request->status == 'Diterima') {
            if ($request->dosen1 === $request->dosen2) {
                return redirect()->route('proposal_kps.index')->with('error', 'Dosen Penguji Proposal tidak boleh sama');
            }
            $request->validate([
                'dosen1' => 'required',
                'dosen2' => 'required',
                // 'dosen3' => 'required',
            ]);

            $proposal = Proposal::find($request->id);
            $proposal->id_dosen_penguji_proposal_1 = $request->dosen1;
            $proposal->id_dosen_penguji_proposal_2 = $request->dosen2;
            $proposal->status = $request->status;
            $proposal->save();

            $dosen1 = User::where('id_dosen', $request->dosen1)->first();
            $dosen1->sub_role = 'dosen_penguji_proposal';
            $dosen1->save();

            $dosen2 = User::where('id_dosen', $request->dosen2)->first();
            $dosen2->sub_role = 'dosen_penguji_proposal';
            $dosen2->save();
        } else if ($request->status == 'Ditolak') {
            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();
        }

        return redirect()->route('proposal_kps.index')->with('success', 'Status berhasil diperbarui');
    }


    public function history()
    {
        $proposals = Proposal::paginate(10);
        return view('dosen.KPS.history_proposal', compact('proposals'));
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
