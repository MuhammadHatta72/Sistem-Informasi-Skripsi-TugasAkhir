@extends('dashboard.kps')

@section('title', 'Daftar Pengajuan Bimbingan')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Bimbingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modalContent"></div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="section-header">
            <h1>Daftar Pengajuan Bimbingan</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                            <h4>Data Pengajuan Bimbingan</h4>
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
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($bimbingans as $bimbingan)
                                        <tr>
                                            <td>
                                                <span class="badge badge-info text-white">{{ $bimbingan->mahasiswa->nim }}</span>
                                            </td>
                                            <td>{{ $bimbingan->mahasiswa->nama }}</td>
                                            <td>
                                                <a href="{{ route('bimbingan-kps.show', $bimbingan->id) }}"
                                                   class="btn btn-warning">Detail</a>
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
                                        {{ $bimbingans->withQueryString()->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.viewBtn').click(function () {
                var bimbinganId = $(this).data('id');

                $.ajax({
                    url: '/bimbingan_kps/1',
                    type: 'GET',
                    success: function (data) {
                        $('#modalContent').html(data);
                        $('#detailModal').modal('show');
                    },
                    error: function () {
                        alert('Error fetching bimbingan detail');
                    }
                });
            });
        });
    </script>
@endsection
