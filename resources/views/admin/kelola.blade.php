@extends('layouts.app')

@section('title', 'Menu Kelola Sarana-Prasarana Admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Sarana-Prasarana</h1>
        </div>

        <div class="section-body">
            <div id="layoutSidenav_content">
                <main>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="row">
                            <div class="col-xl-6 mb-6">
                                <!-- Dashboard example card 1-->
                                <a class="card lift h-100" href="{{route('sarpras.create')}}">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <i class="fas fa-plus-square" style="font-size: xx-large"></i>
                                                <br><br>
                                                <h5>Tambah Sarana & Prasarana</h5>
                                            </div>
                                            <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"
                                                 alt="..." style="width: 8rem"/>
                                        </div>
                                    </div>
                                </a>
                            </div>
{{--                            <div class="col-xl-4 mb-4">--}}
{{--                                <!-- Dashboard example card 2-->--}}
{{--                                <a class="card lift h-100" href="{{route('pinjam.admin')}}">--}}
{{--                                    <div class="card-body d-flex justify-content-center flex-column">--}}
{{--                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                            <div class="me-3">--}}
{{--                                                <i class="fas fa-handshake" style="font-size: xx-large"></i>--}}
{{--                                                <br><br>--}}
{{--                                                <h5>Peminjaman Umum Sarana & Prasarana</h5>--}}
{{--                                                <div class="text-muted small">Description</div>--}}
{{--                                            </div>--}}
{{--                                            <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"--}}
{{--                                                 alt="..." style="width: 8rem"/>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                            <div class="col-xl-6 mb-6">
                                <!-- Dashboard example card 2-->
                                <a class="card lift h-100" href="{{route('sarpras.index')}}">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <i class="fas fa-edit" style="font-size: xx-large"></i>
                                                <br><br>
                                                <h5>Update Sarana & Prasarana</h5>
                                            </div>
                                            <img src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg"
                                                 alt="..." style="width: 8rem"/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
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
                <a class="nav-link" href="{{ route('validasi.index') }}">Validasi Peminjaman</a>
            </li>
        </ul>
    </li>
    <li class="nav-item {{ request()->is('pelaporan-admin') ? 'active' : '' }}"><a href="{{ route('pelaporan-admin.index') }}" class="nav-link"><i class="fas fa-file-signature"></i><span>Pelaporan</span></a></li>
@endsection

