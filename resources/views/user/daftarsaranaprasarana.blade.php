@extends('layouts.app')

@section('title', 'Menu Validasi User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman User</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Sarana & Prasarana</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search nama ruangan">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama Ruangan</th>
                                        <th>Pengurus</th>
                                        <th>Fasilitas</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($sarpras as $sarpra)
                                        <tr>
                                            <td>{{ $sarpra->nama }}</td>
                                            <td>{{ $sarpra->wewenang->name }}</td>
                                            <td>{{ $sarpra->fasilitas }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{route('peminjaman-user.create', ['sarpras' => $sarpra->id]) }}">
                                                    <button class="badge bg-success border-0 mt-3 mr-2 text-white"
                                                            type="button">
                                                        <i class="fas fa-user-cog"></i> Pinjam
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $sarpras->withQueryString()->links() }}
                                    </ul>
                                </nav>
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
