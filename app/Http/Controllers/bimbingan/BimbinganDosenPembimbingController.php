<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BimbinganDosenPembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bimbingans = Bimbingan::where('status', 'diterima kps')
        ->orWhere('status', 'diproses dosen pembimbing')
        ->paginate(10);
        return view('dosen.pembimbing.list_bimbingan', compact('bimbingans'));
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
        return view('dosen.pembimbing.detail_bimbingan', compact('bimbingan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    public function update(Request $request, string $id)
    {
        $bimbingan = Bimbingan::find($id);
        $bimbingan->status = $request->status;
        $bimbingan->save();

        return redirect()->route('bimbingan_dosen_pembimbing.index')->with('success', 'Bimbingan berhasil divalidasi');
    }
}
