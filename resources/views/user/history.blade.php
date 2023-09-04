@extends('layouts.app')

@section('title', 'Menu History User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Peminjaman</h1>
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
                            <h4>Data Peminjaman yang Sedang Belangsung</h4>
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
                                        <th>Kegiatan</th>
                                        <th>Ruangan</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Proposal</th>
                                        <th>Status</th>
                                        <th>Catatan Admin</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($peminjamans as $peminjaman)
                                        <tr>
                                            <td>{{ $peminjaman->kegiatan }}</td>
                                            <td>{{ $peminjaman->saranaPrasarana->nama }}</td>
                                            <td>{{ $peminjaman->tanggal_mulai }} sampai {{ $peminjaman->tanggal_selesai }}</td>
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
                                            <td class="d-flex justify-content-center">
                                                @if($peminjaman->status == 'Proses' || $peminjaman->status == 'Ditolak')
                                                    <a href="{{route('peminjaman-user.edit', ['peminjaman_user' => $peminjaman->id]) }}">
                                                        <button class="badge bg-warning border-0 my-3 mx-3 text-white" type="button">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('peminjaman-user.destroy', ['peminjaman_user' => $peminjaman->id]) }}" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="badge bg-danger border-0 my-3 mx-3 text-white" onclick="return confirm('Yakin Menghapus Peminjaman ?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('bukti.pdf') }}" method="POST" target="_blank">
                                                        @csrf
                                                        <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">
                                                        <button type="submit" class="badge bg-success border-0 mt-3 mr-2 text-white">
                                                            <i class="fas fa-print"></i> Cetak Bukti Peminjaman
                                                        </button>
                                                    </form>
                                                @endif
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
