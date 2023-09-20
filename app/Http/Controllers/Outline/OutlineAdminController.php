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

class OutlineAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlines = Outline::where('status', 'Diterima KPS')->paginate(5);
        return view('admin.list_outline', compact('outlines'));
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
        $dosens = Dosen::join('users', 'users.id_dosen', '=', 'dosens.id')
            ->where(function($query) {
                $query->where('sub_role', null)
                    ->orWhere('sub_role', ' ')
                    ->orWhere('sub_role', 'dosen_penilai');
            })
            ->get();

        $listDosen = [];
        $slots = [];

        foreach($dosens as $dosen) {
            $countPenilai = DB::table('outlines')
                ->where('id_dosen_penilai_1', $dosen->id_dosen)
                ->orWhere('id_dosen_penilai_2', $dosen->id_dosen)
                ->count();

            if($countPenilai <= $dosen->limit_subrole) {
                $listDosen[] = $dosen;
                $slots[] = $dosen->limit_subrole - $countPenilai;
            }
        }

        $outline = Outline::find($id);

//        if (str_contains(url()->previous(), 'history')) {
//            return view('admin.history_detail_outline', compact('outline', 'listDosen', 'slots'));
//        } else {
            return view('admin.detail_outline', compact('outline', 'listDosen', 'slots'));
//        }
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

            $dosen1 = User::where('id_dosen', $request->dosen1)->first();
            $dosen2 = User::where('id_dosen', $request->dosen2)->first();

            if ($dosen1->sub_role == null || $dosen1->sub_role == '') {
                $dosen1->sub_role = 'dosen_penilai';
            }
            if ($dosen2->sub_role == null || $dosen2->sub_role == ''){
                $dosen2->sub_role = 'dosen_penilai';
            }

            $countPenilai = DB::table('outlines')
                ->where('id_dosen_penilai_1', $outline->id_dosen_penilai_1)
                ->orWhere('id_dosen_penilai_2', $outline->id_dosen_penilai_2)
                ->count();

            if($countPenilai == 1 and $request->status == 'Revisi') {
                $dosen1_old = User::where('id_dosen', $outline->id_dosen_penilai_1)->first();
                $dosen2_old = User::where('id_dosen', $outline->id_dosen_penilai_2)->first();
                $dosen1_old->sub_role = null;
                $dosen2_old->sub_role = null;
                $dosen1_old->save();
                $dosen2_old->save();
            }

            $outline->id_dosen_penilai_1 = $request->dosen1;
            $outline->id_dosen_penilai_2 = $request->dosen2;
            $outline->pilihan = $request->pilihan;
            $outline->save();
            $dosen1->save();
            $dosen2->save();
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
