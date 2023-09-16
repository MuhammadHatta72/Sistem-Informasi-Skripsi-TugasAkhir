@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('sidebar')
    @parent
    {{-- <li class="nav-item dropdown {{ (request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*')) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-calendar-check"></i><span>Jadwal</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('outline.create') }}">Outline</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('outline.index') }}">Proposal</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('outline.index') }}">Skripsi</a>
            </li>
        </ul>
    </li>--}}
    {{-- <li class="nav-item dropdown {{ (request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*')) ? 'active' : '' }}"> --}}
    <li class="nav-item {{ request()->is('surat-tugas') ? 'active' : '' }}">
        <a href="{{ route('admin.surat_tugas') }}" class="nav-link">
            <i class="fas fa-file"></i><span>Surat Tugas</span>
        </a>
    </li>
    <li class="nav-item dropdown}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-calendar-check"></i><span>Persetujuan</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('persetujuan-skripsi.index') }}">Skripsi</a>
            </li>
        </ul>
    </li>
    <li class="nav-item {{ request()->is('') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">
            <i class="fas fa-user-times"></i><span>Kelola Pengguna</span>
        </a>
    </li>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Welcome Admin</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100" href="">
                        <div class="card-body d-flex justify-content-center flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <i class="fas fa-users" style="font-size: xxx-large"></i>
                                    <br>
                                    <br>
                                    <h5>Daftar User</h5>
                                    <div class="text-muted small">Lihat dan kelola daftar user dengan mudah.</div>
                                </div>
                                <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"
                                     alt="..." style="width: 8rem"/>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100" href="">
                        <div class="card-body d-flex justify-content-center flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <i class="fas fa-handshake" style="font-size: xxx-large"></i>
                                    <br>
                                    <br>
                                    <h5>Lorem</h5>
                                    <div class="text-muted small">Lihat dan kelola daftar wewenang dengan mudah.</div>
                                </div>
                                <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"
                                     alt="..." style="width: 8rem"/>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-xl-6 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div><h5>User OKI</h5></div>
                                    <div class="display-4 text-white">3</div>
                                </div>
                                <i class="fas fa-user-alt" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link" href=""><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div><h5>User Admin</h5></div>
                                    <div class="display-4 text-white">4</div>
                                </div>
                                <i class="fas fa-user-shield" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link" href=""><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


