<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;
use App\Models\Dosen;

class BimbinganDosenPembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bimbingans = Bimbingan::where('status', '!=', 'Ditolak')->paginate(10);
        return view('dosen.penguji_bimbingan.list_bimbingan', compact('bimbingans'));
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
        $bimbingan = Bimbingan::findOrFail($id);
        return view('dosen.pembimbing_bimbingan.detail_bimbingan', compact('bimbingan'));
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

        $bimbingan = Bimbingan::findOrFail($request->id);
        $bimbingan->status = $request->status;
        $bimbingan->save();

        return redirect()->route('bimbingan_dosen_pembimbing.index')->with('success', 'Bimbingan berhasil divalidasi');
    }
}
