@extends('layouts.app')

@section('title', 'Dashboard Dosen')

@section('navbar')
    @if(auth()->user()->sub_role != null)
        @php
            $currentRoute = Route::currentRouteName();
            $subRole = auth()->user()->sub_role;
        @endphp
        @if ($currentRoute != 'home')
            <a href="{{ route('home') }}" class="dropdown-item has-icon text-success">
                <i class="fas fa-home"></i> Kembali ke Dashboard Utama
            </a>
            <div class="dropdown-divider"></div>
        @endif

        @if ($subRole == 'KPS' && $currentRoute != 'dashboard.kps' && $currentRoute == 'home')
            <a href="{{ route('dashboard.kps') }}" class="dropdown-item has-icon text-success">
                <i class="fas fa-sign-in-alt"></i> Login Sebagai KPS
            </a>
        @elseif ($subRole == 'dosen_penilai' && $currentRoute != 'dashboard.dosen_penilai' && $currentRoute == 'home')
            <a href="{{ route('dashboard.dosen_penilai') }}" class="dropdown-item has-icon text-success">
                <i class="fas fa-sign-in-alt"></i> Login Sebagai Dosen Penilai
            </a>
        @elseif ($subRole == 'dosen_penguji_proposal' && $currentRoute != 'dashboard.dosen_penguji_proposal' && $currentRoute == 'home')
            <a href="{{ route('dashboard.dosen_penguji_proposal') }}" class="dropdown-item has-icon text-success">
                <i class="fas fa-sign-in-alt"></i> Login Sebagai Dosen Penguji Proposal
            </a>
        @elseif ($subRole == 'dosen_pembimbing' && $currentRoute != 'dashboard.dosen_pembimbing' && $currentRoute == 'home')
            <a href="{{ route('dashboard.dosen_pembimbing') }}" class="dropdown-item has-icon text-success">
                <i class="fas fa-sign-in-alt"></i> Login Sebagai Dosen Pembimbing
            </a>
        @elseif ($subRole == 'dosen_penguji_skripsi' && $currentRoute != 'dashboard.dosen_penguji_skripsi' && $currentRoute == 'home')
            <a href="{{ route('dashboard.dosen_penguji_skripsi') }}" class="dropdown-item has-icon text-success">
                <i class="fas fa-sign-in-alt"></i> Login Sebagai Dosen Penguji Skripsi
            </a>
            <div class="dropdown-divider"></div>
        @endif
    @endif
    @parent
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Welcome Dosen</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8 col-xl-4 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div><h5>Proposal Valid</h5></div>
                                    <div class="display-4 text-white">1</div>
                                </div>
                                <i class="fas fa-clipboard-check" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link"
                               href=""><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-4 mb-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div><h5>Proposal Proses</h5></div>
                                    <div class="display-4 text-white">1</div>
                                </div>
                                <i class="fas fa-envelope-open-text" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link"
                               href=""><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div><h5>Pemintaan Validasi Proposal</h5></div>
                                    <div class="display-4 text-white">1</div>
                                </div>
                                <i class="fas fa-clipboard-check" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link"
                               href=""><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
@endsection
