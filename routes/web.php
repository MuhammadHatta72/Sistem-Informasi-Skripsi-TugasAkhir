<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Outline\OutlineDosenPenilaiKelayakanController;
use App\Http\Controllers\Outline\OutlineKPSController;
use App\Http\Controllers\Outline\OutlineMahasiswaController;
use App\Http\Controllers\OutlineController;
use App\Http\Controllers\proposal\ProposalDosenPengujiProposalController;
use App\Http\Controllers\proposal\ProposalPengajuanController;
use App\Http\Controllers\proposal\ProposalKPSController;
use App\Http\Controllers\proposal\ProposalAdminController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\Bimbingan\BimbinganDosenPembimbingController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\Bimbingan\BimbinganPengajuanController;
use App\Http\Controllers\Bimbingan\BimbinganAdminController;
use App\Http\Controllers\Bimbingan\BimbinganKPSController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\Skripsi\SkripsiMahasiswaController;
use App\Http\Controllers\Skripsi\SkripsiAdminController;
use App\Http\Controllers\Skripsi\SkripsiKPSController;
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
    Route::get('surat-tugas', [AdminController::class, 'surat_tugas'])->name('admin.surat_tugas');
    Route::post('surat-tugas', [AdminController::class, 'surat_tugas_store'])->name('admin.print_surat_tugas');
    Route::resource('skripsi-admin', SkripsiAdminController::class);
    Route::resource('bimbingan-admin', BimbinganAdminController::class);
    Route::resource('proposal_admin', ProposalAdminController::class);
    Route::get('/proposal_download/{proposalId}', [ProposalAdminController::class, 'download'])->name('proposal_admin.download');
    Route::post('/proposal/admin/validasi', [ProposalAdminController::class, 'validasi'])->name('proposal_admin.validasi');
});

Route::middleware('can:dosen')->group(function () {

    Route::middleware('can:KPS')->group(function () {
        Route::view('dashboard-kps', 'dashboard.dosen_KPS')->name('dashboard.kps');
        Route::resource('outline_KPS', OutlineKPSController::class);
        Route::post('outline_KPS_validasi', [OutlineKPSController::class, 'validasi'])->name('outline_KPS.validasi');

        Route::post('/proposal/kps/validasi', [ProposalKPSController::class, 'validasi'])->name('proposal_kps.validasi');
        Route::get('outline_history', [OutlineKPSController::class, 'history'])->name('outline_KPS.history');
        Route::resource('proposal_kps', ProposalKPSController::class);
        //        Route::post('/proposal_kps/{id}', [ProposalKPSController::class, 'show'])->name('proposal_kps.show');
        Route::get('/proposal_history', [ProposalKPSController::class, 'history'])->name('proposal_kps.history');
        Route::resource('bimbingan-kps', BimbinganKPSController::class);
        Route::get('/bimbingan-history', [BimbinganKPSController::class, 'history'])->name('bimbingan-kps.history');
        Route::get('/bimbingan-history-detail-kps', [BimbinganKPSController::class, 'historyShow'])->name('bimbingan-kps.history-detail');
        Route::resource('skripsi-kps', SkripsiKPSController::class);
        Route::get('/skripsi-history-kps', [SkripsiKPSController::class, 'history'])->name('skripsi-kps.history');
        Route::get('/skripsi-history-detail-kps', [SkripsiKPSController::class, 'historyShow'])->name('skripsi-kps.history-detail');
    });

    Route::middleware('can:dosen_penilai')->group(function () {
        Route::view('dashboard-dosen_penilai', 'dashboard.dosen_penilai')->name('dashboard.dosen_penilai');
        Route::resource('outline_dosen_penilai', OutlineDosenPenilaiKelayakanController::class);
    });

    Route::middleware('can:dosen_penguji_proposal')->group(function () {
        Route::view('dashboard-dosen_penguji_proposal', 'dashboard.dosen_penguji_proposal')->name('dashboard.dosen_penguji_proposal');
        Route::resource('proposal_dosen_penguji', ProposalDosenPengujiProposalController::class);
        Route::post('proposal_dosen_penguji_validasi', [ProposalDosenPengujiProposalController::class, 'validasi'])->name('proposal_dosen_penguji.validasi');
    });

    Route::middleware('can:dosen_pembimbing')->group(function () {
        Route::view('dashboard-dosen_pembimbing', 'dashboard.dosen_pembimbing')->name('dashboard.dosen_pembimbing');
        Route::resource('bimbingan_dosen_pembimbing', BimbinganDosenPembimbingController::class);
        Route::post('bimbingan_dosen_pembimbing', [BimbinganDosenPembimbingController::class, 'update'])->name('bimbingan_dosen_pembimbing.update');
    });

    Route::middleware('can:dosen_penguji_skripsi')->group(function () {
        Route::view('dashboard-dosen_penguji_skripsi', 'dashboard.dosen_penguji_skripsi')->name('dashboard.dosen_penguji_skripsi');
    });
});

Route::middleware('can:mahasiswa')->group(function () {
    Route::resource('outline_mahasiswa', OutlineMahasiswaController::class);
    Route::resource('bimbingan_pengajuan', BimbinganPengajuanController::class);
    Route::resource('skripsi', SkripsiMahasiswaController::class);
    Route::get('/proposal_pengajuan', [ProposalPengajuanController::class, 'index'])->name('proposal_pengajuan.index');
    Route::post('/proposal_pengajuan', [ProposalPengajuanController::class, 'store'])->name('proposal_pengajuan.store');
    Route::get('/proposal_pengajuan/create', [ProposalPengajuanController::class, 'create'])->name('proposal_pengajuan.create');
    Route::get('/file_template', [ProposalPengajuanController::class, 'download'])->name('file_template.download');
    Route::get('/file_proposal', [ProposalPengajuanController::class, 'file'])->name('file_proposal.download');

    Route::get('/bimbingan_pengajuan', [BimbinganPengajuanController::class, 'index'])->name('bimbingan_pengajuan.index');
    Route::post('/bimbingan_pengajuan', [BimbinganPengajuanController::class, 'store'])->name('bimbingan_pengajuan.store');
    Route::get('/bimbingan_pengajuan/create', [BimbinganPengajuanController::class, 'create'])->name('bimbingan_pengajuan.create');
});
