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

    public function download($id)
    {
        $proposal = Proposal::find($id);
        $file = $proposal->file;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download(storage_path("app/$file"), 'proposal_mahasiswa.pdf', $headers);
    }
}
