@extends('dashboard.dosen_KPS')

@section('title', 'Dashboard Dosen')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Outline</h5>
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
            <h1>History Pengajuan Outline</h1>
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
                            <h4>Data History Pengajuan Outline</h4>
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
                                        <th>Nama</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($outlines as $outline)
                                        <tr>
                                            <td>{{ $outline->mahasiswa->nama }}</td>
                                            <td>{{ $outline->judul }}</td>
                                            <td>
                                                @if($outline->status == 'Proses')
                                                    <span class="badge bg-warning text-white w-50">Proses</span>
                                                @elseif($outline->status == 'Diterima')
                                                    <span class="badge bg-success text-white w-50">Diterima</span>
                                                @elseif($outline->status == 'Ditolak')
                                                    <span class="badge bg-danger text-white w-50">Ditolak</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <button class="badge bg-primary border-0 my-3 mx-3 text-white viewBtn w-25"
                                                        type="button" data-id="{{ $outline->id }}">
                                                    <i class="fas fa-eye"></i> View
                                                </button>
                                                <a href="{{route('outline_KPS.edit', $outline) }}">
                                                    <button class="badge bg-warning border-0 my-3 mx-3 text-white w-100" type="button">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                </a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.viewBtn').click(function () {
                var outlineId = $(this).data('id');

                $.ajax({
                    url: '/outline_KPS/' + outlineId,
                    type: 'GET',
                    success: function (data) {
                        $('#modalContent').html(data);
                        $('#detailModal').modal('show');
                    },
                    error: function () {
                        alert('Error fetching outline detail');
                    }
                });
            });
        });
    </script>

@endsection
