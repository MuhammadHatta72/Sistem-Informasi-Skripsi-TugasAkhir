<?php

namespace App\Http\Controllers\Outline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Outline\StoreOutlineMahasiswaRequest;
use App\Http\Requests\Outline\UpdateOutlineMahasiswaRequest;
use App\Models\Dosen;
use App\Models\Outline;
use App\Models\User;
use Illuminate\Http\Request;

class OutlineKPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlines = Outline::where('status', 'Proses')->paginate(5);
        return view('dosen.KPS.list_outline', compact('outlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
//        check if source route is from history or not
        if (str_contains(url()->previous(), 'history')) {
            $outline = Outline::find($id);
            $dosens = Dosen::join('users', 'users.id_dosen', '=', 'dosens.id')->where('sub_role', '')->orWhere('sub_role', null)->get();
            return view('dosen.KPS.history_detail_outline', compact('outline', 'dosens'));
        } else {
            $outline = Outline::find($id);
            $dosens = Dosen::join('users', 'users.id_dosen', '=', 'dosens.id')->where('sub_role', '')->orWhere('sub_role', null)->get();
            return view('dosen.KPS.detail_outline', compact('outline', 'dosens'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outline $outline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutlineMahasiswaRequest $request, Outline $outline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outline $outline)
    {
        //
    }

    public function validasi(Request $request)
    {
        if (str_contains(url()->previous(), 'history')) {
            if ($request->status == 'Revisi') {
                if ($request->dosen1 == $request->dosen2) {
                    return redirect()->route('outline_KPS.index')->with('error', 'Dosen penilai tidak boleh sama');
                }
                $request->validate([
                    'dosen1' => 'required',
                    'dosen2' => 'required',
                ]);
                $outline = Outline::find($request->id);
                $outline->status = 'Diterima';
                $dosen1_old = User::where('id_dosen', $outline->id_dosen_penilai_1)->first();
                $dosen2_old = User::where('id_dosen', $outline->id_dosen_penilai_2)->first();
                $dosen1_old->sub_role = null;
                $dosen2_old->sub_role = null;
                $dosen1_old->save();
                $dosen2_old->save();
                $dosen1 = User::where('id_dosen', $request->dosen1)->first();

                $dosen2 = User::where('id_dosen', $request->dosen2)->first();
                $dosen1->sub_role = 'dosen_penilai';
                $dosen2->sub_role = 'dosen_penilai';

                $outline->id_dosen_penilai_1 = $request->dosen1;
                $outline->id_dosen_penilai_2 = $request->dosen2;
                $outline->save();
                $dosen1->save();
                $dosen2->save();
            } else if ($request->status == 'Ditolak') {
                $outline = Outline::find($request->id);
                $outline->status = $request->status;
                $outline->save();
            }

            return redirect()->route('outline_KPS.history')->with('success', 'Status berhasil diperbarui');
        } else {
            if ($request->status == 'Diterima') {
                if ($request->dosen1 == $request->dosen2) {
                    return redirect()->route('outline_KPS.index')->with('error', 'Dosen penilai tidak boleh sama');
                }
                $request->validate([
                    'dosen1' => 'required',
                    'dosen2' => 'required',
                ]);
                $outline = Outline::find($request->id);
                $outline->status = $request->status;

                $dosen1 = User::where('id_dosen', $request->dosen1)->first();
                $dosen2 = User::where('id_dosen', $request->dosen2)->first();
                $dosen1->sub_role = 'dosen_penilai';
                $dosen2->sub_role = 'dosen_penilai';

                $outline->id_dosen_penilai_1 = $request->dosen1;
                $outline->id_dosen_penilai_2 = $request->dosen2;
                $outline->save();
                $dosen1->save();
                $dosen2->save();
            } else if ($request->status == 'Ditolak') {
                $outline = Outline::find($request->id);
                $outline->status = $request->status;
                $outline->save();
            }

            return redirect()->route('outline_KPS.index')->with('success', 'Status berhasil diperbarui');
        }


    }

    public function history()
    {
        $outlines = Outline::paginate(5);
        return view('dosen.KPS.history_outline', compact('outlines'));
    }
}
