<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Outline\OutlineKPSController;
use App\Http\Controllers\Outline\OutlineMahasiswaController;
use App\Http\Controllers\OutlineController;
use App\Http\Controllers\proposal\ProposalDosenPengujiProposalController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\KPS\KPSController;
use App\Http\Controllers\proposal\ProposalPengajuanController;
use App\Http\Controllers\proposal\ProposalKPSController;
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
        Route::resource('outline_KPS', OutlineKPSController::class);
        Route::post('outline_validasi', [OutlineKPSController::class, 'validasi'])->name('outline.validasi');
//        Route::get('/proposal/kps/show/{id}', [ProposalKPSController::class, 'show'])->name('proposal_kps.show');
        Route::post('/proposal/kps/validasi', [ProposalKPSController::class, 'validasi'])->name('proposal_kps.validasi');
        Route::get('outline_history', [OutlineKPSController::class, 'history'])->name('outline.history');
        Route::resource('proposal_kps', ProposalKPSController::class);
//        Route::post('/proposal_kps/{id}', [ProposalKPSController::class, 'show'])->name('proposal_kps.show');
    });
    Route::middleware('can:dosen_penilai')->group(function () {
        Route::view('dashboard-dosen_penilai', 'dashboard.dosen_penilai')->name('dashboard.dosen_penilai');
    });
    Route::middleware('can:dosen_penguji_proposal')->group(function () {
        Route::view('dashboard-dosen_penguji_proposal', 'dashboard.dosen_penguji_proposal')->name('dashboard.dosen_penguji_proposal');
        Route::resource('proposal_dosen_penguji', ProposalDosenPengujiProposalController::class);
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
    Route::resource('skripsi', SkripsiController::class);
    Route::get('/proposal_pengajuan', [ProposalPengajuanController::class, 'index'])->name('proposal_pengajuan.index');
    Route::post('/proposal_pengajuan', [ProposalPengajuanController::class, 'store'])->name('proposal_pengajuan.store');
    Route::get('/proposal_pengajuan/create', [ProposalPengajuanController::class, 'create'])->name('proposal_pengajuan.create');
});
