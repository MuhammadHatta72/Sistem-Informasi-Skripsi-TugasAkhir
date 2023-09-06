<?php

namespace App\Http\Controllers;

use App\Models\Outline;
use App\Http\Requests\StoreOutlineRequest;
use App\Http\Requests\UpdateOutlineRequest;

class OutlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('user.outline_history');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Outline $outline)
    {
        //
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
