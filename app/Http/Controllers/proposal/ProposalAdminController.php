<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class ProposalAdminController extends Controller
{
    public function index()
    {
        $proposals = Proposal::where('status', 'Diproses Admin')->paginate(10);

        return view('admin.list_proposal', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        [$listDosen, $slots] = limit();

        return view('admin.detail_proposal', compact('proposal', 'listDosen', 'slots'));
    }

    public function validasi(Request $request)
    {
        if ($request->status == 'Diterima Admin') {
            if ($request->dosen1 === $request->dosen2) {
                return redirect()->route('proposal_admin.index')->with('error', 'Dosen Penguji Proposal tidak boleh sama');
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
        } else if ($request->status == 'Ditolak Admin') {
            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();

            return redirect()->route('proposal_admin.index')->with('success', 'Proposal berhasil ditolak');
        }

        return redirect()->route('proposal_admin.index')->with('success', 'Dosen Penguji Proposal berhasil ditambahkan');
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
