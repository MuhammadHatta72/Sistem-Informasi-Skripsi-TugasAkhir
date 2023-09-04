@extends('layouts.app')

@section('title', 'Validasi Proposal Admin')

@section('content')
    @foreach($peminjamans as $peminjaman)
        <div class="modal fade" id="tolakModal{{$peminjaman->id}}" tabindex="-1" role="dialog"
             aria-labelledby="tolakModalLabel{{$peminjaman->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tolakModalLabel{{$peminjaman->id}}">Tolak Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('validasi.update', ['validasi' => $peminjaman->id]) }}" method="POST">
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

        <div class="modal fade" id="terimaModal{{$peminjaman->id}}" tabindex="-1" role="dialog"
             aria-labelledby="terimaModalLabel{{$peminjaman->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="terimaModalLabel{{$peminjaman->id}}">Terima Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('validasi.update', ['validasi' => $peminjaman->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Terima Peminjaman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <section class="section">
        <div class="section-header">
            <h1>Validasi Peminjaman</h1>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>

        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search nama kegiatan">
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
                                        <th>Peminjam</th>
                                        <th>Kegiatan</th>
                                        <th>Ruangan</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Dokumen</th>
                                        <th>Status</th>
                                        <th>Catatan Admin</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($peminjamans as $peminjaman)
                                        <tr>
                                            <th>{{ $peminjaman->user->name }}</th>
                                            <td>{{ $peminjaman->kegiatan }}</td>
                                            <td>{{ $peminjaman->saranaPrasarana->nama }}</td>
                                            <td>{{ $peminjaman->tanggal_mulai }}
                                                sampai {{ $peminjaman->tanggal_selesai }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a class="btn btn-primary border-0 my-3 mr-2" href="{{ asset('storage/' . $peminjaman->dokumen) }}" target="_blank">
                                                    <i class="fas fa-file-alt"></i>
                                                </a>
                                            </td>
                                            <td>{{ $peminjaman->status }}</td>
                                            <td>
                                                @if($peminjaman->catatan_admin == null)
                                                    -
                                                @else
                                                    {{ $peminjaman->catatan_admin }}
                                                @endif
                                            </td>
                                            <td class="">
                                                <div class="btn-group-vertical my-3">
                                                    @if($peminjaman->status == 'Proses')
                                                        <a href="#" data-toggle="modal"
                                                           data-target="#tolakModal{{$peminjaman->id}}">
                                                            <button style="min-width: 100px"
                                                                class="badge bg-danger border-0 my-1 text-white w-100"
                                                                type="button">
                                                                <i class="fas fa-user-times"></i> Tolak
                                                            </button>
                                                        </a>
                                                        <a href="#" data-toggle="modal"
                                                           data-target="#terimaModal{{$peminjaman->id}}">
                                                            <button style="min-width: 100px"
                                                                class="badge bg-success border-0 my-1 text-white w-100"
                                                                type="button">
                                                                <i class="fas fa-user-cog"></i> Terima
                                                            </button>
                                                        </a>
                                                    @else
                                                        {{-- <a href="{{route('peminjaman-admin.edit', ['peminjaman_admin' => $peminjaman->id]) }}">
                                                            <button class="badge bg-warning border-0 my-3 mx-3 text-white"
                                                                    type="button">
                                                                <i class="fas fa-user-cog"></i> Edit
                                                            </button>
                                                        </a> --}}
                                                    @endif
                                                    <a href="{{ route('validasi.show', ['validasi' => $peminjaman->id]) }}">
                                                        <button style="min-width: 100px" class="badge bg-info border-0 my-1 text-white w-100"
                                                                type="button">
                                                            <i class="fas fa-user-cog"></i> Detail
                                                        </button>
                                                    </a>
                                                </div>

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
                                        {{ $peminjamans->withQueryString()->links() }}
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
