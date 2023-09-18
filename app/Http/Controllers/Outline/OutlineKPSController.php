<?php

namespace App\Http\Controllers\Outline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Outline\StoreOutlineMahasiswaRequest;
use App\Http\Requests\Outline\UpdateOutlineMahasiswaRequest;
use App\Models\Dosen;
use App\Models\Outline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutlineKPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlines = Outline::where('status', 'Pengajuan')->paginate(5);
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
        [$listDosen, $slots] = limit();

        $outline = Outline::find($id);

        if (str_contains(url()->previous(), 'history')) {
            return view('dosen.KPS.history_detail_outline', compact('outline', 'listDosen', 'slots'));
        } else {
            return view('dosen.KPS.detail_outline', compact('outline', 'listDosen', 'slots'));
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
        if ($request->status == 'Ditolak') {
            $outline = Outline::find($request->id);
            $outline->status = $request->status;
            $outline->save();
        } else if ($request->status == 'Diterima KPS' || $request->status == 'Revisi') {
            $request->validate([
                'dosen1' => 'required|different:dosen2', // Memastikan dosen1 berbeda dengan dosen2
                'dosen2' => 'required',
            ], [
                'dosen1.different' => 'Dosen 1 tidak boleh sama dengan Dosen 2.', // Pesan khusus untuk validasi ini
            ]);

            $outline = Outline::find($request->id);
            $outline->status = $request->status;
            $outline->id_dosen_penilai_1 = $request->dosen1;
            $outline->id_dosen_penilai_2 = $request->dosen2;
            $outline->save();
        }

        if (str_contains(url()->previous(), 'history')) {
            return redirect()->route('outline_KPS.history')->with('success', 'Status berhasil diperbarui');
        } else {
            return redirect()->route('outline_KPS.index')->with('success', 'Status berhasil diperbarui');
        }
    }

    public function history()
    {
        $outlines = Outline::paginate(5);
        return view('dosen.KPS.history_outline', compact('outlines'));
    }
}
