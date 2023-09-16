@extends('dashboard.mahasiswa')

@section('title', 'History Skripsi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Pengajuan Skripsi</h1>
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
                            <h4>Data History Pengajuan Skripsi </h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search nama skripsi">
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
                                            <th>Status</th>
                                            <th>Nilai 1</th>
                                            <th>Nilai 2</th>
                                            <th>Nilai 3</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   @forelse($skripsis as $skripsi)
                                   <tbody>
                                    <tr>
                                        <td>
                                            @if($skripsi->status == 'dikirim')
                                            <span class="badge badge-info">Dikirim</span>
                                            @elseif($skripsi->status == 'diproses')
                                            <span class="badge badge-warning">Diproses</span>
                                            @elseif($skripsi->status == 'ditolak')
                                            <span class="badge badge-danger">Ditolak</span>
                                            @else
                                            <span class="badge badge-success">Diterima</span>
                                            @endif
                                        </td>
                                        <td>{{$skripsi->nilai1 == null ? 'Proses' : $skripsi->nilai1}}</td>
                                        <td>{{$skripsi->nilai2 == null ? 'Proses' : $skripsi->nilai2}}</td>
                                        <td>{{$skripsi->nilai3 == null ? 'Proses' : $skripsi->nilai3}}</td>
                                        <td><a class="btn btn-primary" href="{{ route('skripsi.show', $skripsi) }}">Detail</a></td>
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
{{--                                        {{ $skripsis->withQueryString()->links() }}--}}
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

