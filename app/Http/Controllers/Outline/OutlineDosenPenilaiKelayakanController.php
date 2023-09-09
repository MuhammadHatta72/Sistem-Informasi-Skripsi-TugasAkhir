<?php

namespace App\Http\Controllers\Outline;

use App\Http\Controllers\Controller;
use App\Models\Outline;
use Illuminate\Http\Request;

class OutlineDosenPenilaiKelayakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlines = Outline::where('status', '!=','Ditolak')
            ->where('id_dosen_penilai_1', auth()->user()->dosen->id)
            ->orWhere('id_dosen_penilai_2', auth()->user()->dosen->id)
            ->paginate(5);
        return view('dosen.penilai_kelayakan.list_outline', compact('outlines'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $outline = Outline::findOrFail($id);
        return view('dosen.penilai_kelayakan.detail_outline', compact('outline'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function validasi(Request $request)
    {

        $request->validate([
            'status' => 'required',
            'nilai' => 'required',
        ]);

        $outline = Outline::findOrFail($request->id);
        if (auth()->user()->dosen->id == $outline->id_dosen_penilai_1) {
            $outline->nilai1 = $request->nilai;
        } else if (auth()->user()->dosen->id == $outline->id_dosen_penilai_2) {
            $outline->nilai2 = $request->nilai;
        }

//            check previous status
        if ($outline->status == 'Tidak Lulus' || $request->status == 'Tidak Lulus') {
            $outline->status = 'Tidak Lulus';
        } else {
            $outline->status = $request->status;
        }

        $outline->save();

        return redirect()->route('outline_dosen_penilai.index')->with('success', 'Berhasil memvalidasi outline');
    }
}
