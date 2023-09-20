<?php

namespace App\Http\Controllers\bimbingan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class BimbinganAdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bimbingans = Bimbingan::where('status', 'dikirim')->get();
        return view('admin.pengajuan_bimbingan', compact('bimbingans'));
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
        $bimbingan = Bimbingan::find($id);
        return view('admin.detail_pengajuan_bimbingan', compact('bimbingan'));
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
        $bimbingan = Bimbingan::find($id);
        $bimbingan->status = $request->status;
        $bimbingan->save();

        return redirect()->route('bimbingan-admin.index')->with('success', 'Status berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
