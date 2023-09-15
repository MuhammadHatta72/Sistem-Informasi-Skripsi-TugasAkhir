@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Welcome Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-6 col-xl-6 mb-4">
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
                            <a class="text-white stretched-link" href=""></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 mb-4">
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
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
    <li
        class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-sticky-note"></i><span>Outline</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('outline_mahasiswa.create', ['id' => auth()->user()->id]) }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('outline_mahasiswa.index') }}">History</a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-file-alt"></i><span>Ujian Proposal</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('proposal_pengajuan.create') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('proposal_pengajuan.index') }}">History</a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-chalkboard-teacher"></i><span>Bimbingan Skripsi</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('bimbingan_pengajuan.create') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('bimbingan_pengajuan.index') }}">History</a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-scroll"></i><span>Ujian Skripsi</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('skripsi.create') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('skripsi.index') }}">History</a>
            </li>
        </ul>
    </li>
@endsection
