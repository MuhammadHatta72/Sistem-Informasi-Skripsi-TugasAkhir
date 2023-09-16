@extends('dashboard.mahasiswa')

@section('title', 'History Bimbingan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Pengajuan Bimbingan</h1>
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
                            <h4>Data History Pengajuan Bimbingan </h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search judul skripsi">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing 1</th>
                                            <th>Dosen Pembimbing 2</th>
                                            <th>Dosen Pembimbing Intern</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   @forelse($bimbingans as $bimbingan)
                                   <tbody>
                                    <tr>
                                        <td>{{$bimbingan->judul}}</td>
                                        <td>{{ $bimbingan->dosenPembimbing1->nama ?? '-' }}</td>
                                        <td>{{ $bimbingan->dosenPembimbing2->nama ?? '-' }}</td>
                                        <td>{{ $bimbingan->dosenPembimbingIntern->nama ?? '-' }}</td>
                                        <td>
                                            @if($bimbingan->status == 'Lulus')
                                                <span class="badge bg-success text-white">{{ $bimbingan->status }}</span>
                                            @elseif($bimbingan->status == 'Ditolak*')
                                                <span class="badge bg-danger text-white">{{ $bimbingan->status }}</span>
                                            @else
                                                <span class="badge bg-warning text-white">{{ $bimbingan->status }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            @if($bimbingan->status == 'Pengajuan' || $bimbingan->status == 'Ditolak*')
                                                <a href="{{route('bimbingan_pengajuan.edit', $bimbingan) }}">
                                                    <button class="badge bg-warning border-0 my-3 mx-3 text-white" type="button">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                </a>
                                                <form action="{{ route('bimbingan_pengajuan.destroy', $bimbingan) }}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="badge bg-danger border-0 my-3 mx-3 text-white" onclick="return confirm('Yakin Menghapus Pengajuan ?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
<td>

</td>
                                    </tr>
                                   </tbody>
                                   @empty
                                        <tr>
                                             <td colspan="7" class="text-center p-5">
                                                  Data tidak tersedia
                                             </td>
                                        </tr>
                                   @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
{{--                                        {{ $bimbingans->withQueryString()->links() }}--}}
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

