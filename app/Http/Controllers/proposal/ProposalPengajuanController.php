<?php

namespace App\Http\Controllers\proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

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
            'kategori' => 'required|string|max:255',
            'file' => 'required|mimes:doc,docx,pdf|max:2048',

        ], [
            'judul.required' => 'Judul proposal wajib diisi.',
            'kategori.required' => 'Kategori proposal wajib diisi.',
            'file.required' => 'File proposal wajib diisi.',
        ]);

        $proposal = new Proposal();
        $proposal->id_mahasiswa = Auth::user()->mahasiswa->id;
        $proposal->judul = $request->input('judul');
        $proposal->kategori = $request->input('kategori');
        $proposal->file = $request->file('file')->store('assets/proposal', 'public');


        $proposal->save();

        return redirect()->route('proposal_pengajuan.index')->with('success', 'Proposal berhasil diajukan');
    }

    public function download()
    {
        $templateFile = public_path() . "/template/template_proposal.docx";
        $headers = array(
            'Content-Type: application/docx',
        );
        return response()->download($templateFile, 'template_proposal.docx', $headers);
    }

    // public function file()
    // {
    //     $file = public_path() . "/proposal";
    //     $proposal = Proposal::where('id_mahasiswa', Auth::user()->mahasiswa->id)->first();
    //     $file = $proposal->file;
    //     $headers = array(
    //         'Content-Type: application/pdf',
    //     );
    //     return response()->download(storage_path("app/$file"), 'proposal_mahasiswa.pdf', $headers);
    // }

    public function file()
    {
        $proposal = Proposal::where('id_mahasiswa', Auth::user()->mahasiswa->id)->first();

        if ($proposal) {
            $file = $proposal->file;
            $headers = [
                'Content-Type: application/pdf',
            ];

            $filePath = storage_path("app/public/{$file}");

            return response()->download($filePath, 'proposal_mahasiswa.pdf', $headers);
        } else {
            return abort(404);
        }
    }
}
