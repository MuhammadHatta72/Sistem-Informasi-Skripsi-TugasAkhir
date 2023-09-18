@extends('dashboard.kps')

@section('title', 'History Pengajuan Bimbingan Mahasiswa')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Pengajuan Bimbingan Mahasiswa</h1>
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
                            <h4>Data History Pengajuan Bimbingan Mahasiswa </h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control"
                                               placeholder="Search nama skripsi">
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
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    @forelse($bimbingans as $bimbingan)
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span class="badge badge-info text-white">{{ $bimbingan->mahasiswa->nim }}</span>
                                            </td>
                                            <td>{{ $bimbingan->mahasiswa->nama }}</td>
                                            <td>
                                                <a href="{{ route('bimbingan-kps.history-detail', $bimbingan->id) }}"
                                                   class="btn btn-warning">Detail</a>
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

