@extends('dashboard.mahasiswa')

@section('title', 'History Bimbingan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Pengajuan Bimbingan</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data History Pengajuan Bimbingan</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control"
                                            placeholder="Search nama kegiatan">
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
                                        <th>Judul</th>
                                        <th>Data 1</th>
                                        <th>Data 2</th>
                                        <th>Data 3</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                @forelse($bimbingans as $bimbingan)
                                        <tr>
                                            <td>{{ $bimbingan->judul }}</td>
                                            <td>{{ $bimbingan->data1 }}</td>
                                            <td>{{ $bimbingan->data2 }}</td>
                                            <td>{{ $bimbingan->data3 }}</td>
                                            <td>{{ $bimbingan->status }}</td>
                                            <td class="d-flex justify-content-center">
                                                @if ($bimbingan->status == 'Proses' || $bimbingan->status == 'Ditolak')
                                                    <a href="{{ route('bimbingan_mahasiswa.edit', $bimbingan) }}">
                                                        <button class="badge bg-warning border-0 my-3 mx-3 text-white"
                                                            type="button">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('bimbingan_mahasiswa.destroy', $bimbingan) }}"
                                                        method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="badge bg-danger border-0 my-3 mx-3 text-white"
                                                            onclick="return confirm('Yakin Menghapus Pengajuan ?')">
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
                                        {{-- {{ $bimbingans->withQueryString()->links() }} --}}
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
