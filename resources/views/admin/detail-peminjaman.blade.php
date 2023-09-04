@extends('layouts.app')

@section('title', 'Detail Peminjaman')

<div class="modal fade" id="tolakModal{{$validasi->id}}" tabindex="-1" role="dialog"
     aria-labelledby="tolakModalLabel{{$validasi->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakModalLabel{{$validasi->id}}">Tolak Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('validasi.update', ['validasi' => $validasi->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="catatan_admin">Catatan Admin</label>
                        <textarea class="form-control" id="catatan_admin" name="catatan_admin" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Tolak Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="terimaModal{{$validasi->id}}" tabindex="-1" role="dialog"
     aria-labelledby="terimaModalLabel{{$validasi->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="terimaModalLabel{{$validasi->id}}">Terima Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('validasi.update', ['validasi' => $validasi->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Terima Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Peminjaman</h1>
        </div>

        <div class="section-body">
            <div id="layoutSidenav_content">
                <main>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header bg-whitesmoke"><h4>Detail Peminjaman</h4></div>
                            <div class="card-body ps-5 pe-15">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Peminjaman</label>
                                    <input type="text" class="form-control"
                                           id="nama" name="nama" value="{{ $validasi->user->name }}" readonly disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Ruangan</label>
                                    <input type="text" class="form-control"
                                           id="nama" name="nama" value="{{ $validasi->saranaPrasarana->nama }}" readonly
                                           disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kegiatan</label>
                                    <input type="text" class="form-control"
                                           id="nama" name="nama" value="{{ $validasi->kegiatan }}" readonly disabled>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6 col-sm-6">
                                        <label for="mulai" class="form-label">Tanggal Mulai</label>
                                        <input type="text"
                                               class="form-control"
                                               id="mulai" name="mulai"
                                               value="{{ $validasi->tanggal_mulai }}" readonly disabled>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <label for="selesai" class="form-label">Tanggal Selesai</label>
                                        <input type="text"
                                               class="form-control"
                                               id="selesai" name="selesai"
                                               value="{{ $validasi->tanggal_selesai }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6 col-sm-6">
                                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                        <input type="time"
                                               class="form-control"
                                               id="jam_mulai" name="jam_mulai" value="{{ $validasi->jam_mulai }}" readonly disabled>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                        <input type="time"
                                               class="form-control"
                                               id="jam_selesai" name="jam_selesai" value="{{ $validasi->jam_selesai }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6 col-sm-6">
                                        <label for="kapasitas" class="form-label">Penanggung Jawab</label>
                                        <input type="text"
                                               class="form-control"
                                               id="kapasitas" name="kapasitas"
                                               value="{{ $validasi->penanggung_jawab }}" readonly disabled>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <label for="daya-listrik" class="form-label">Daya Listrik</label>
                                        <input type="text"
                                               class="form-control"
                                               id="daya-listrik" name="daya-listrik"
                                               value="{{ $validasi->daya_listrik }}" readonly disabled>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="text"
                                               class="form-control"
                                               id="status" name="status"
                                               value="{{ $validasi->status }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-1 col-sm-1">
                                        <label for="Proposal" class="form-label">Proposal</label>
                                            <a class="btn btn-primary border-0 my-3 mr-2 d-block" href="{{ asset('storage/' . $validasi->dokumen) }}" target="_blank">
                                                <i class="fas fa-file-alt"></i>
                                            </a>
                                    </div>
                                </div>
                                @if($validasi->status == 'Proses')
                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-sm-3">
                                            <a href="#" data-toggle="modal"
                                               data-target="#tolakModal{{$validasi->id}}">
                                                <button style="min-width: 100px"
                                                        class="badge bg-danger border-0 my-1 text-white w-100"
                                                        type="button">
                                                    <i class="fas fa-user-times"></i> Tolak
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-sm-3">
                                            <a href="#" data-toggle="modal"
                                               data-target="#terimaModal{{$validasi->id}}">
                                                <button style="min-width: 100px"
                                                        class="badge bg-success border-0 my-1 text-white w-100"
                                                        type="button">
                                                    <i class="fas fa-user-cog"></i> Terima
                                                </button>
                                            </a>
                                        </div>
                                    </div>

                                @endif

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
