@extends('dashboard.mahasiswa')

@section('title', 'History Proposal')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Pengajuan Proposal</h1>
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
                            <h4>Data History Pengajuan Proposal</h4>
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
                                        <th>Kategori</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($proposals as $proposal)
                                        <tr>
                                            <td>{{ $proposal->judul }}</td>
                                            <td>{{ $proposal->kategori }}</td>
                                            <td>
                                                <a href="{{ route('file_proposal.download', $proposal) }}"
                                                    class="btn btn-success">Unduh File</a>
                                            </td>
                                            <td>{{ $proposal->status }}</td>
                                            <td class="d-flex justify-content-center">
                                                @if ($proposal->status == 'Proses' || $proposal->status == 'Ditolak')
                                                    <a href="{{ route('proposal_mahasiswa.edit', $proposal) }}">
                                                        <button class="badge bg-warning border-0 my-3 mx-3 text-white"
                                                            type="button">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('proposal_mahasiswa.destroy', $proposal) }}"
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
                                        {{-- {{ $proposals->withQueryString()->links() }} --}}
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
