@extends('dashboard.mahasiswa')

@section('title', 'History Outline')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Pengajuan Outline</h1>
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
                            <h4>Data History Pengajuan Outline </h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search nama judul">
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
                                        <th>Judul 1</th>
                                        <th>Judul 2</th>
                                        <th>Dosen Penilai 1</th>
                                        <th>Dosen Penilai 2</th>
                                        <th>Revisi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($outlines as $outline)
                                        <tr>
                                            <td>{{ $outline->judul_1 }}</td>
                                            <td>{{ $outline->judul_2 }}</td>
                                            <td>
                                                {{ $outline->dosenPenilai1->nama ?? '-' }}
                                            </td>
                                            <td>{{ $outline->dosenPenilai2->nama ?? '-' }}</td>
                                            <td>{{ $outline->revisi ?? '-'}}</td>
                                            <td>
                                                @if($outline->status == 'Lulus')
                                                    <span class="badge bg-success text-white">{{ $outline->status }}</span>
                                                @elseif($outline->status == 'Ditolak*')
                                                    <span class="badge bg-danger text-white">{{ $outline->status }}</span>
                                                @else
                                                    <span class="badge bg-warning text-white">{{ $outline->status }}</span>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                @if($outline->status == 'Pengajuan' || $outline->status == 'Ditolak*')
                                                    <a href="{{route('outline_mahasiswa.edit', $outline) }}">
                                                        <button class="badge bg-warning border-0 my-3 mx-3 text-white" type="button">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('outline_mahasiswa.destroy', $outline) }}" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="badge bg-danger border-0 my-3 mx-3 text-white" onclick="return confirm('Yakin Menghapus Pengajuan ?')">
                                                            <i class="fas fa-trash"></i> Delete
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
                                        {{ $outlines->withQueryString()->links() }}
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

