@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Welcome Dosen</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100" href="{{route('kelola.admin')}}">
                        <div class="card-body d-flex justify-content-center flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <i class="fas fa-database" style="font-size: xxx-large"></i>
                                    <br>
                                    <br>
                                    <h5>Kelola Sarana Prasarana</h5>
                                    <div class="text-muted small">Kelola dan atur data sarana dan prasarana dengan mudah.</div>
                                </div>
                                <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"
                                     alt="..." style="width: 8rem"/>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard example card 2-->
                    <a class="card lift h-100" href="{{route('pelaporan-admin.index')}}">
                        <div class="card-body d-flex justify-content-center flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <i class="fas fa-file-signature" style="font-size: xxx-large"></i>
                                    <br>
                                    <br>
                                    <h5>Pelaporan</h5>
                                    <div class="text-muted small">Laporkan informasi mengenai peminjaman sarana dan prasarana.</div>
                                </div>
                                <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"
                                     alt="..." style="width: 8rem"/>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
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
                            <a class="text-white stretched-link" href="{{ route('peminjaman-admin.index', ['history' => 'valid']) }}"><h6>Detail</h6></a>
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
                            <a class="text-white stretched-link" href="{{ route('peminjaman-admin.index', ['history' => 'proses']) }}"><h6>Detail</h6></a>
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
                            <a class="text-white stretched-link" href="{{ route('validasi.index', ['validasi' => 'proses']) }}"><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-lg-6 col-xl-4 mb-4">--}}
{{--                    <div class="card bg-primary border-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5>Rata-rata peminjaman</h5>--}}
{{--                            <div class="mb-3">--}}
{{--                                <span class="display-3 text-white">100</span>--}}
{{--                                <span class="text-white-50">per tahun</span>--}}
{{--                            </div>--}}
{{--                            <div class="progress bg-white-25 rounded-pill" style="height: 0.5rem"><div class="progress-bar bg-white w-100 rounded-pill" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>--}}
{{--                            <br>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
    @if(auth()->user()->sub_role == 'KPS')
        <li class="nav-item">
            KPS
        </li>
    @elseif(auth()->user()->sub_role == 'dosen_penilai')
        <li class="nav-item">
            Dosen Penilai
        </li>
    @elseif(auth()->user()->sub_role == 'dosen_penguji_proposal')
        <li class="nav-item">
            Dosen Penguji Proposal
        </li>
    @elseif(auth()->user()->sub_role == 'dosen_pembimbing')
        <li class="nav-item">
            Dosen Pembimbing
        </li>
    @elseif(auth()->user()->sub_role == 'dosen_penguji_skripsi')
        <li class="nav-item">
            Dosen Penguji Skripsi
        </li>
    @endif
    <li class="nav-item {{ (request()->is('kelola-ruang')) ? 'active' : '' }}"><a href="{{ route('kelola.admin') }}" class="nav-link"><i class="fas fa-building"></i><span>Kelola Sarana Prasarana</span></a></li>
    <li class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-admin', 'peminjaman-admin*', 'validasi*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-check"></i><span>Peminjaman</span></a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('daftarsaranaprasarana.admin') }}">Pinjam Sarpras</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('peminjaman-admin.index') }}">History Admin</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('validasi.index') }}">Validasi User</a>
            </li>
        </ul>
    </li>
    <li class="nav-item {{ request()->is('pelaporan-admin') ? 'active' : '' }}"><a href="{{ route('pelaporan-admin.index') }}" class="nav-link"><i class="fas fa-file-signature"></i><span>Pelaporan</span></a></li>
@endsection
