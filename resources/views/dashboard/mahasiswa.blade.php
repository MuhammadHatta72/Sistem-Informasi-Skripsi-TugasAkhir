@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Welcome Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100" href="{{route('daftarsaranaprasarana.user')}}">
                        <div class="card-body d-flex justify-content-center flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <i class="fas fa-building" style="font-size: xxx-large"></i>
                                    <br>
                                    <br>
                                    <h5>Daftar Sarana &amp; Prasarana</h5>
                                    <div class="text-muted small">Lihat daftar sarana dan prasarana yang tersedia dengan mudah.</div>
                                </div>
                                <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"
                                     alt="..." style="width: 8rem"/>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard example card 2-->
                    <a class="card lift h-100" href="{{route('peminjaman-user.index')}}">
                        <div class="card-body d-flex justify-content-center flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <i class="fas fa-history" style="font-size: xxx-large"></i>
                                    <br>
                                    <br>
                                    <h5>Histori</h5>
                                    <div class="text-muted small">Lihat histori peminjaman dengan mudah.</div>
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
                                    <div><h5>Proposal Valid</h5></div>
                                    <div class="display-4 text-white">1</div>
                                </div>
                                <i class="fas fa-clipboard-check" style="font-size:xx-large"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">
                            <a class="text-white stretched-link" href="{{ route('peminjaman-user.index', ['history' => 'valid']) }}"><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 mb-4">
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
                            <a class="text-white stretched-link" href="{{ route('peminjaman-user.index', ['history' => 'proses']) }}"><h6>Detail</h6></a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-lg-6 col-xl-4 mb-4">--}}
{{--                    <div class="card bg-primary text-white">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <div class="me-3">--}}
{{--                                    <div><h5>Peminjaman Selesai</h5></div>--}}
{{--                                    <div class="display-4 text-white">6</div>--}}
{{--                                </div>--}}
{{--                                <i class="fas fa-handshake" style="font-size:xx-large"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer d-flex align-items-center justify-content-between small shadow-dark">--}}
{{--                            <a class="text-white stretched-link" href="#!"><h6>Detail</h6></a>--}}
{{--                            <div class="text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
    <li class="nav-item dropdown {{ (request()->is('daftar-sarana-prasarana-user', 'peminjaman-user*')) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-calendar-check"></i><span>Peminjaman</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('daftarsaranaprasarana.user') }}">Daftar Sarana Prasarana</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('peminjaman-user.index') }}">History User</a>
            </li>
        </ul>
    </li>
@endsection
