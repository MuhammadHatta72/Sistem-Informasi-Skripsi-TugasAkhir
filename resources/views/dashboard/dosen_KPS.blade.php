@extends('dashboard.dosen')

@section('title', 'Dashboard Dosen')

@section('sidebar')
    <li class="menu-header">Menu</li>
    <li class="nav-item {{ request()->is('dashboard-kps') ? 'active' : '' }}">
        <a href="{{ route('dashboard.kps') }}" class="nav-link">
            <i class="fas fa-poll-h"></i><span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown {{ request()->is('outline*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-sticky-note"></i><span>Outline</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('outline_KPS.index') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('outline_KPS.history') }}">History</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown {{ request()->is('proposal*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-file-alt"></i><span>Ujian Proposal</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('proposal_kps.index') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('proposal_kps.history') }}">History</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown {{ request()->is('bimbingan*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-chalkboard-teacher"></i><span>Bimbingan Skripsi</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('bimbingan-kps.index') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('bimbingan-kps.history') }}">History</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown {{ request()->is('skripsi*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-scroll"></i><span>Ujian Skripsi</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('skripsi-kps.index') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('skripsi-kps.history') }}">History</a>
            </li>
        </ul>
    </li>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Welcome Kepala Program Studi</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8 col-xl-4 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div>
                                        <h5>Proposal Valid</h5>
                                    </div>
                                    <div class="display-4 text-white">1</div>
                                </div>
                                <i class="fas fa-clipboard-check" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link" href="">
                                <h6>Detail</h6>
                            </a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-4 mb-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div>
                                        <h5>Proposal Proses</h5>
                                    </div>
                                    <div class="display-4 text-white">1</div>
                                </div>
                                <i class="fas fa-envelope-open-text" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link" href="">
                                <h6>Detail</h6>
                            </a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div>
                                        <h5>Pemintaan Validasi Proposal</h5>
                                    </div>
                                    <div class="display-4 text-white">1</div>
                                </div>
                                <i class="fas fa-clipboard-check" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link" href="">
                                <h6>Detail</h6>
                            </a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
