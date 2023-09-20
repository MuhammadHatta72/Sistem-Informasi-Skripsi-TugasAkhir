@extends('layouts.app')

@section('title', 'Dashboard Dosen')

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
    <li class="nav-item dropdown {{ (request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*')) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-sticky-note"></i><span>Outline</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('outline_dosen_penilai.index') }}">Penilai Kelayakan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('outline_dosen_penilai.index') }}">History</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown {{ (request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*')) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-sticky-note"></i><span>Proposal</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('proposal_dosen_penguji.index') }}">Penguji Proposal</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('proposal_dosen_penguji.index') }}">History</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown {{ (request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*')) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-sticky-note"></i><span>Skripsi</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('bimbingan_dosen_pembimbing.index') }}">Bimbingan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('bimbingan_dosen_pembimbing.index') }}">History Bimbingan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('skripsi.create') }}">Ujian Skripsi</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('skripsi.index') }}">History Skripsi</a>
            </li>
        </ul>
    </li>
{{--    <li class="menu-header">Outline</li>--}}
{{--    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('home') }}" class="nav-link">--}}
{{--            <i class="fas fa-poll-h"></i><span>Penilai Kelayakan</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('home') }}" class="nav-link">--}}
{{--            <i class="fas fa-poll-h"></i><span>History</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="menu-header">Proposal</li>--}}
{{--    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('home') }}" class="nav-link">--}}
{{--            <i class="fas fa-poll-h"></i><span>Penguji Proposal</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('home') }}" class="nav-link">--}}
{{--            <i class="fas fa-poll-h"></i><span>History</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="menu-header">Skripsi</li>--}}
{{--    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('home') }}" class="nav-link">--}}
{{--            <i class="fas fa-poll-h"></i><span>Bimbingan Skripsi</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('home') }}" class="nav-link">--}}
{{--            <i class="fas fa-poll-h"></i><span>Ujian Skripsi</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('home') }}" class="nav-link">--}}
{{--            <i class="fas fa-poll-h"></i><span>History</span>--}}
{{--        </a>--}}
{{--    </li>--}}
@endsection
