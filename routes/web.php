<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Outline\OutlineMahasiswaController;
use App\Http\Controllers\OutlineController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\KPS\KPSController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});
Route::get('/log-in', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return (new DashboardController)->admin();
            } elseif (Auth::user()->role == 'dosen') {
                return (new DashboardController)->dosen();
            } else {
                return (new DashboardController)->mahasiswa();
            }
        } else {
            return view('auth.login');
        }
    })->name('home');
});

Route::get('edit-profile', function () {
})->name('profile.edit');

Route::middleware('can:admin')->group(function () {
});

Route::middleware('can:dosen')->group(function () {
    Route::middleware('can:KPS')->group(function () {
        Route::view('dashboard-kps', 'dashboard.dosen_KPS')->name('dashboard.kps');
        Route::get('/kps_outline', [KPSController::class, 'index'])->name('KPSoutline.index');
        Route::get('/outline_kps', [OutlineController::class, 'index'])->name('outline_kps.index');
    });
    Route::middleware('can:dosen_penilai')->group(function () {
        Route::view('dashboard-dosen_penilai', 'dashboard.dosen_penilai')->name('dashboard.dosen_penilai');
    });
    Route::middleware('can:dosen_penguji_proposal')->group(function () {
        Route::view('dashboard-dosen_penguji_proposal', 'dashboard.dosen_penguji_proposal')->name('dashboard.dosen_penguji_proposal');
    });
    Route::middleware('can:dosen_pembimbing')->group(function () {
        Route::view('dashboard-dosen_pembimbing', 'dashboard.dosen_pembimbing')->name('dashboard.dosen_pembimbing');
    });
    Route::middleware('can:dosen_penguji_skripsi')->group(function () {
        Route::view('dashboard-dosen_penguji_skripsi', 'dashboard.dosen_penguji_skripsi')->name('dashboard.dosen_penguji_skripsi');
    });
});

Route::middleware('can:mahasiswa')->group(function () {
    Route::resource('outline_mahasiswa', OutlineMahasiswaController::class);
    Route::resource('proposal', ProposalController::class);
    Route::resource('skripsi', SkripsiController::class);
    Route::post('/outline_pengajuan', [OutlineController::class, 'store'])->name('outline.store');
    Route::view('mahasiswa.outline_pengajuan', 'mahasiswa.outline_pengajuan')->name('outline_pengajuan');
    Route::get('/mahasiswa_outline', [OutlineController::class, 'index'])->name('mahasiswa_outline.index');
});
