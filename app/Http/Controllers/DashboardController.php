<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function dosen()
    {
        return view('dashboard.dosen');
    }

    public function mahasiswa()
    {
        return view('dashboard.mahasiswa');
    }
}
