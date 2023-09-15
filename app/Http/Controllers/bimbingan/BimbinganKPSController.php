<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Bimbingan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BimbinganKPSController extends Controller
{
    public  function index()
    {
        $bimbingans = Bimbingan::where('status', 'dikirim')->paginate(10);

        return view('dosen.KPS.list_bimbingan', compact('bimbingans'));
    }

    public function show($id)
    {
        $bimbingan = Bimbingan::find($id);
        $dosens = Dosen::join('users', 'users.id_dosen', '=', 'dosens.id')->where('sub_role', '')->orWhere('sub_role', null)->get();
        return view('dosen.KPS.detail_bimbingan', compact('bimbingan', 'dosens'));
    }

    // public function validasi(Request $request)
    // {
    //     if ($request->status == 'Diterima') {
    //         if ($request->dosen1 == $request) {
    //             // dosen2 || $request->dosen1 == $request->dosen3 || $request->dosen2 == $request->dosen3
    //             return redirect()->route('bimbingan_kps.index')->with('error', 'Dosen Pembimbing Bimbingan, Dosen Pembimbing 1, dan Dosen Pembimbing 2 tidak boleh sama');
    //         }
    //         $request->validate([
    //             'dosen1' => 'required',
    //             // 'dosen2' => 'required',
    //             // 'dosen3' => 'required',
    //         ]);

    //         $bimbingan = Bimbingan::find($request->id);
    //         $bimbingan->id_dosen_pembimbing = $request->dosen1;
    //         // $bimbingan->id_dosen_pembimbing_1 = $request->dosen2;
    //         // $bimbingan->id_dosen_pembimbing_2 = $request->dosen3;
    //         $bimbingan->status = $request->status;
    //         $bimbingan->save();
    //     } else if ($request->status == 'Ditolak') {
    //         $bimbingan = Bimbingan::find($request->id);
    //         $bimbingan->status = $request->status;
    //         $bimbingan->save();
    //     }

    //     return redirect()->route('bimbingan_kps.index')->with('success', 'Status berhasil diperbarui');
    // }

    public function validasi(Request $request)
    {
        if ($request->status == 'Diterima') {
            if ($request->dosen1 == $request) {
                return redirect()->route('bimbingan_kps.index')->with('error', 'Dosen Pembimbing Bimbingan tidak boleh sama');
            }
            $request->validate([
                'dosen1' => 'required',
                // 'dosen2' => 'required',
                // 'dosen3' => 'required',
            ]);

            $bimbingan = Bimbingan::find($request->id);
            $bimbingan->id_dosen_pembimbing = $request->dosen1;
            // $bimbingan->id_dosen_pembimbing_1 = $request->dosen2;
            // $bimbingan->id_dosen_pembimbing_2 = $request->dosen3;
            $bimbingan->status = $request->status;
            $bimbingan->save();

            $dosen1 = User::where('id_dosen', $request->dosen1)->first();
            $dosen1->sub_role = 'dosen_pembimbing';
            $dosen1->save();
        } else if ($request->status == 'Ditolak') {
            $bimbingan = Bimbingan::find($request->id);
            $bimbingan->status = $request->status;
            $bimbingan->save();
        }

        return redirect()->route('bimbingan_kps.index')->with('success', 'Status berhasil diperbarui');
    }


    public function history()
    {
        $bimbingans = Bimbingan::paginate(10);
        return view('dosen.KPS.history_bimbingan', compact('bimbingans'));
    }
}