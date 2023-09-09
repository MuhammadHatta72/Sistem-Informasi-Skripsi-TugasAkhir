<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProposalKPSController extends Controller
{
    public  function index()
    {
        $proposals = Proposal::where('status', 'dikirim')->get();

        return view('dosen.KPS.list_proposal', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        return view('dosen.KPS.detail_proposal', compact('proposal'));
    }
}
