\@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>

        <div class="section-body">
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4" />
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header bg-whitesmoke"><h4>Foto Profil</h4></div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    @if(auth()->user()->logo <> null)
                                        <img class="img-account-profile rounded-circle mb-2" src="storage/<?= auth()->user()->logo; ?>" alt="Tidak ada gambar" style="width: 12rem"/>
                                    @else
                                        <img class="img-account-profile rounded-circle mb-2" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" alt="" style="width: 12rem"/>
                                    @endif                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">JPG / PNG < 5 MB</div>
                                    <!-- Profile picture upload button-->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header bg-whitesmoke"><h4>Detail Akun</h4></div>
                                <div class="card-body">
                                    <form class="row g-3">
                                        <!-- Form Group (username)-->
                                        <div class="mb-3 col-md-12">
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{ auth()->user()->name }}" disabled readonly />
                                        </div>
{{--                                        <div class="mb-3 col-md-6">--}}
{{--                                            <label class="small mb-1" for="inputOrgName">Organisasi</label>--}}
{{--                                            <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Admin JTI" disabled readonly/>--}}
{{--                                        </div>--}}
                                        <!-- Form Group (email address)-->
                                        <!-- Form Row-->
                                            <!-- Form Group (phone number)-->
                                            <div class="mb-3 col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ auth()->user()->email }}" disabled readonly/>
                                            </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="small mb-1" for="inputEmailAddress">Nomor Telepon</label>
                                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ auth()->user()->phone }}" disabled readonly/>
                                        </div>
                                            <div class="mb-3 col">
                                                <label class="small mb-1" for="penanggungjawab">Penanggung Jawab</label>
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="{{ auth()->user()->nama_pj }} " disabled readonly />
                                            </div>
                                        <div class="mb-3 col">
                                            <label class="small mb-1" for="NIP">NIP</label>
                                            <input class="form-control" id="NIP" type="tel" placeholder="Enter your phone number" value="{{ auth()->user()->ninduk_pj }} " disabled readonly />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
