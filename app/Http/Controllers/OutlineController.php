<?php

namespace App\Http\Controllers;

use App\Models\Outline;
use App\Http\Requests\StoreOutlineRequest;
use App\Http\Requests\UpdateOutlineRequest;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class OutlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.mahasiswa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.outline_pengajuan');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreOutlineRequest $request)
    {
        // Validasi request data
        $request->validate([
            'judul' => 'required|string|max:255',
            'bab1' => 'required|string',
            'bab2' => 'required|string',
            'bab3' => 'required|string',
        ]);

        // Periksa apakah pengguna memiliki peran "mahasiswa"
        if (auth()->user()->role == 'mahasiswa') {
            $outline = new Outline();

            $outline->id_mahasiswa = auth()->user()->id;
            $outline->judul = $request->judul;
            $outline->bab1 = $request->bab1;
            $outline->bab2 = $request->bab2;
            $outline->bab3 = $request->bab3;
            $outline->save();

            return redirect()->route('mahasiswa_outline.index')->with('success', 'Outline berhasil dikirim');
        } else {
            abort(403, 'Anda tidak memiliki izin untuk mengirimkan outline');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Outline $outline)
    {
        // check if the user is authorized to view the outline
        if (Auth::user()->role == 'mahasiswa' && Auth::user()->id == $outline->id_mahasiswa) {
            // the user is the owner of the outline
            return view('user.outline_detail', compact('outline'));
        } elseif (Auth::user()->role == 'dosen' && Auth::user()->sub_role == 'KPS') {
            // the user is the KPS
            return view('dosen.outline_detail', compact('outline'));
        } else {
            // the user is not authorized to view the outline
            abort(403, 'Anda tidak memiliki akses untuk melihat outline ini');
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
    public function update(UpdateOutlineRequest $request, Outline $outline)
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
}
