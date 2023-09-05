<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutlineController;
use App\Http\Controllers\PeminjamanAdminController;
use App\Http\Controllers\PeminjamanUserController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\CetakSuratController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\WewenangController;
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
    if (Auth::check()) {
        if (Auth::user()->role == 'superadmin') {
            return view('superadmin.profile_Sadmin');
        } elseif (Auth::user()->role == 'admin') {
            return view('admin.profile_admin');
        } else {
            return view('user.profile_user');
        }
    } else {
        return view('auth.login');
    }
})->name('profile.edit');

Route::middleware('can:superadmin')->group(function () {
    Route::get('kelola-superadmin', function () {
        return view('superadmin.kelola');
    })->name('kelola.superadmin');

    Route::get('kelola-wewenang', function () {
        return view('superadmin.wewenang');
    })->name('kelola.wewenang');

    Route::resource('users', UserController::class);

    Route::resource('wewenang', WewenangController::class);
});

Route::middleware('can:dosen')->group(function () {
    Route::middleware('can:KPS')->group(function () {
        Route::view('dashboard-kps', 'dashboard.dosen_KPS')->name('dashboard.kps');
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


//    lawas
    Route::get('daftar-sarana-prasarana-admin', [SarprasController::class, 'admin'])->name('daftarsaranaprasarana.admin');

    Route::get('kelola-ruang', function () {
        return view('admin.kelola');
    })->name('kelola.admin');

//    Route::get('pelaporan-admin', function () {
//        return view('admin.pelaporan');
//    })->name('pelaporan.admin');

    Route::post('laporan-pdf',[CetakSuratController::class, 'generatePDF'])->name('laporan.pdf');

    Route::post('buktiumum-pdf',[CetakSuratController::class, 'generatebuktiUPDF'])->name('buktiumum.pdf');

    Route::resource('pelaporan-admin', CetakSuratController::class);

    Route::resource('peminjaman-admin', PeminjamanAdminController::class);

    Route::resource('validasi', ValidationController::class);

    Route::resource('sarpras', SarprasController::class);
});

Route::middleware('can:mahasiswa')->group(function () {

    Route::get('daftar-sarana-prasarana-mahasiswa', [SarprasController::class, 'mahasiswa'])->name('daftarsaranaprasarana.mahasiswa');

    Route::post('bukti-pdf',[CetakSuratController::class, 'generatebuktiPDF'])->name('bukti.pdf');

    Route::resource('peminjaman-mahasiswa', PeminjamanUserController::class);

    Route::resource('outline', OutlineController::class);
    Route::resource('proposal', ProposalController::class);
    Route::resource('skripsi', SkripsiController::class);

});



