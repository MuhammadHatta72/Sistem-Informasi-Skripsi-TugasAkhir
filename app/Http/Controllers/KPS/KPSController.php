<?php

namespace App\Http\Controllers\KPS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outline;

class KPSController extends Controller
{
    public function index()
    {
        $outlines = Outline::all();
        return view('dashboard.outline_kps', compact('outlines'));
    }
}
