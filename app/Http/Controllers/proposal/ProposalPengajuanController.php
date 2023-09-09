<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class ProposalPengajuanController extends Controller
{
    public function index()
    {
        $proposals = Proposal::where('id_mahasiswa', Auth::user()->mahasiswa->id)->get();
        return view('mahasiswa.proposal_history', compact('proposals'));
    }

    public function create()
    {
        return view('mahasiswa.proposal_pengajuan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'data1' => 'required|string',
            'data2' => 'required|string',
            'data3' => 'required|string',
        ], [
            'judul.required' => 'Judul proposal wajib diisi.',
            'data1.required' => 'Data 1 wajib diisi.',
            'data2.required' => 'Data 2 wajib diisi.',
            'data3.required' => 'Data 3 wajib diisi.',
        ]);

        $proposal = new Proposal();
        $proposal->id_mahasiswa = Auth::user()->mahasiswa->id;
        $proposal->judul = $request->input('judul');
        $proposal->data1 = $request->input('data1');
        $proposal->data2 = $request->input('data2');
        $proposal->data3 = $request->input('data3');

        $proposal->save();

        return redirect()->route('proposal_pengajuan.index')->with('success', 'Proposal berhasil diajukan');
    }
}
