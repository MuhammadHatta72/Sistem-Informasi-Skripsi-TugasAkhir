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
                                            <th>Dosen Pembimbing Abstrak</th>
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
                                        <td>{{ $bimbingan->dosenPembimbingAbstrak->nama ?? '-' }}</td>
                                        <td>
                                            @if($bimbingan->status == 'dikirim')
                                            <span class="badge badge-info">Dikirim</span>
                                            @elseif($bimbingan->status == 'diterima admin')
                                            <span class="badge badge-warning">Diterima Admin</span>
                                            @elseif($bimbingan->status == 'ditolak admin')
                                            <span class="badge badge-danger">Ditolak Admin</span>
                                            @elseif($bimbingan->status == 'diterima kps')
                                            <span class="badge badge-warning">Diterima KPS</span>
                                            @elseif($bimbingan->status == 'ditolak kps')
                                            <span class="badge badge-danger">Ditolak KPS</span>
                                            @elseif($bimbingan->status == 'diproses dosen pembimbing')
                                            <span class="badge badge-warning">Diproses Dosen Pembimbing</span>
                                            @elseif($bimbingan->status == 'ditolak dosen pembimbing')
                                            <span class="badge badge-danger">Ditolak Dosen Pembimbing</span>
                                            @elseif($bimbingan->status == 'lulus bimbingan')
                                            <span class="badge badge-success">Lulus Bimbingan</span>
                                            @else
                                            <span class="badge badge-success">Diterima</span>
                                            @endif
                                        </td>
                                        <td><a class="btn btn-primary" href="{{ route('bimbingan_pengajuan.show', $bimbingan) }}">Detail</a></td>
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

