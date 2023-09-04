@extends('layouts.app')

@section('title', 'Menu Pelaporan Admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pelaporan</h1>
        </div>

        <div class="section-body">
            <div id="layoutSidenav_content">
                <main>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header bg-whitesmoke"><h4>Filter Laporan</h4></div>
                            <div class="card-body">
                                <form method="GET">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-3">
                                            <label for="startDate">Mulai Tanggal</label>
                                            <div class="input-group">
                                                <input name="startDate" class="form-control" type="date"
                                                       value="{{ request()->input('startDate') }}"/>
                                                <span id="startDateSelected"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-3">
                                            <label for="endDate">Sampai Tanggal</label>
                                            <div class="input-group">
                                                <input name="endDate" class="form-control" type="date"
                                                       value="{{ request()->input('endDate') }}"/>
                                                <span id="endDateSelected"></span>
                                            </div>
                                        </div>
                                                <div class="col-lg-1 col-sm-2 mt-1">
                                                    <div class="input-group-append mt-1">
                                                        <button class="btn btn-primary mt-4">Filter</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-sm-2 mt-1">
                                                    <div class="input-group-append mt-1">
                                                        <a href="{{ route('pelaporan-admin.index') }}"
                                                           class="btn btn-secondary mt-4">Reset</a>
                                                    </div>
                                                </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-header bg-whitesmoke"><h4>Laporan Peminjaman Ruangan</h4></div>
                            <div class="card-body">
                                <form action="{{ route('laporan.pdf') }}" method="POST" target="_blank">
                                    @csrf
                                    <input type="hidden" name="sDate" value="{{ request()->input('startDate') }}">
                                    <input type="hidden" name="eDate" value="{{ request()->input('endDate') }}">
                                    <button type="submit" class="badge bg-success border-0 mt-3 mr-2 text-white">
                                        <i class="fas fa-print"></i> Cetak Laporan Data Peminjaman
                                    </button>
                                </form>
                                <hr>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Peminjam</th>
                                            <th>Kegiatan</th>
                                            <th>Penanggung Jawab</th>
                                            <th>NIM</th>
                                            <th>Ruangan</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Status</th>
                                        </tr>
                                        @forelse($peminjamans as $peminjaman)
                                            <tr>
                                                <th>{{ $peminjaman->user->name }}</th>
                                                <td>{{ $peminjaman->kegiatan }}</td>
                                                <td>{{ $peminjaman->penanggung_jawab }}</td>
                                                <td>{{ $peminjaman->nim }}</td>
                                                <td>{{ $peminjaman->saranaPrasarana->nama }}</td>
                                                <td>{{ $peminjaman->tanggal_mulai }}
                                                    sampai {{ $peminjaman->tanggal_selesai }}</td>
                                                <td>{{ $peminjaman->status }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
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
    <li class="nav-item {{ (request()->is('kelola-ruang')) ? 'active' : '' }}"><a href="{{ route('kelola.admin') }}"
                                                                                  class="nav-link"><i
                class="fas fa-building"></i><span>Kelola Sarana Prasarana</span></a></li>
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
    <li class="nav-item {{ request()->is('pelaporan-admin') ? 'active' : '' }}"><a
            href="{{ route('pelaporan-admin.index') }}" class="nav-link"><i class="fas fa-file-signature"></i><span>Pelaporan</span></a>
    </li>
@endsection
