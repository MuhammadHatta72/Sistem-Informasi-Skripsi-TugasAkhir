<?php

namespace App\Http\Controllers\Skripsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skripsi;

class SkripsiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skripsis = Skripsi::where('status', 'dikirim')->get();
        return view('admin.pengajuan_skripsi', compact('skripsis'));
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
        $skripsi = Skripsi::find($id);
        return view('admin.detail_pengajuan_skripsi', compact('skripsi'));
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
        $skripsi = Skripsi::find($id);
        $skripsi->status = $request->status;
        $skripsi->save();

        return redirect()->route('skripsi-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
