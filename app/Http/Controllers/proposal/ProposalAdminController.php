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
        $proposals = Proposal::where('status', 'dikirim')->paginate(10);

        return view('admin.list_proposal', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        $dosens = Dosen::join('users', 'users.id_dosen', '=', 'dosens.id')->where('sub_role', '')->orWhere('sub_role', null)->get();
        return view('admin.detail_proposal', compact('proposal', 'dosens'));
    }

    public function validasi(Request $request)
    {
        if ($request->status == 'Diterima') {
            $request->validate([
                'status' => 'required',
            ]);

            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();
        } else if ($request->status == 'Ditolak') {
            $proposal = Proposal::find($request->id);
            $proposal->status = $request->status;
            $proposal->save();
        }

        return redirect()->route('proposal_admin.index')->with('success', 'Status berhasil diperbarui');
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
