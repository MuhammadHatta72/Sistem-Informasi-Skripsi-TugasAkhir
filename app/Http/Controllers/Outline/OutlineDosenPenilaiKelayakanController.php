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
        $outlines = Outline::where('status', '!=', 'Ditolak')
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
        ]);

        $outline = Outline::findOrFail($request->id);
//        dd($request->all(), $outline->id_dosen_penilai_1, $outline->id_dosen_penilai_2, auth()->user()->id_dosen);
        if ($outline->id_dosen_penilai_1 == auth()->user()->id_dosen) {
            $outline->status1 = $request->status;
            $outline->status = $request->status;
        }

        if ($outline->id_dosen_penilai_2 == auth()->user()->id_dosen) {
            $outline->status2 = $request->status;
            $outline->status = $request->status;
        }

        if ($outline->pilihan == null or $outline->pilihan == $request->pilihan) {
            $outline->pilihan = $request->pilihan;
        } else {
            return redirect()->route('outline_dosen_penilai.index')->with('error', 'Outline yang dipilih tidak sama dengan dosen penilai lainnya');
        }

        if ($outline->status1 === 'Diterima DosenPenilai1' and $outline->status2 === 'Diterima DosenPenilai2') {
            $outline->status = 'Lulus';
        } else if ($outline->status1 === 'Ditolak DosenPenilai1' and $outline->status2 === 'Ditolak DosenPenilai2') {
            $outline->status = 'Ditolak';
        }

        $outline->revisi = $outline->revisi . "\n" . $request->revisi;
        $outline->save();

        return redirect()->route('outline_dosen_penilai.index')->with('success', 'Berhasil memvalidasi outline');
    }
}
