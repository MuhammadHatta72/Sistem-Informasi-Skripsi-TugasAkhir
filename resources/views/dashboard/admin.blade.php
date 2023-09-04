@extends('layouts.app')

@section('title', 'Dashboard Super Admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Welcome SuperAdmin</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-xl-6 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100" href="{{route('users.index')}}">
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
                    <a class="card lift h-100" href="{{route('wewenang.index')}}">
                        <div class="card-body d-flex justify-content-center flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <i class="fas fa-handshake" style="font-size: xxx-large"></i>
                                    <br>
                                    <br>
                                    <h5>Daftar Wewenang</h5>
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
                            <a class="text-white stretched-link" href="{{ route('users.index', ['user' => 'oki']) }}"><h6>Detail</h6></a>
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
                            <a class="text-white stretched-link" href="{{ route('users.index', ['user' => 'admin']) }}"><h6>Detail</h6></a>
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
    <li class="nav-item {{ request()->is('kelola-superadmin', 'users*') ? 'active' : '' }}"><a href="{{route('kelola.superadmin')}}" class="nav-link"><i class="fas fa-users"></i><span>Kelola Pengguna</span></a></li>
    <li class="nav-item {{ request()->is('kelola-wewenang', 'wewenang*') ? 'active' : '' }}"><a href="{{route('kelola.wewenang')}}" class="nav-link"><i class="fas fa-handshake"></i><span>Kelola Wewenang</span></a></li>
@endsection
