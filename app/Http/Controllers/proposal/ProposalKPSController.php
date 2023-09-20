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
        $proposals = Proposal::where('status', 'Diterima Admin')->paginate(10);

        return view('dosen.KPS.list_proposal', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        [$listDosen, $slots] = limit();
        return view('dosen.KPS.detail_proposal', compact('proposal', 'listDosen', 'slots'));
    }

    public function validasi(Request $request)
    {
        if ($request->status == 'Diterima KPS') {
            $request->validate([
                'status' => 'required',
            ]);

            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();
        } else if ($request->status == 'Ditolak KPS') {
            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();

            return redirect()->route('proposal_kps.index')->with('success', 'Dosen Penguji Proposal tidak sesuai');
        }

        return redirect()->route('proposal_kps.index')->with('success', 'Proposal berhasil diterima');
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
