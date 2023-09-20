@extends('dashboard.dosen')

@section('title', 'Daftar Ujian Proposal Mahasiswa')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Proposal</h5>
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
            <h1>Daftar Ujian Proposal</h1>
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
                            <h4>Data Ujian Proposal</h4>
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
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($proposals as $proposal)
                                        <tr>
                                            <td>{{ $proposal->mahasiswa->nama }}</td>
                                            <td>{{ $proposal->judul }}</td>
                                            <td>
                                                <a href="{{ route('proposal_dosen_penguji.download', $proposal) }}"
                                                    class="btn btn-success">Unduh File</a>
                                            </td>
                                            <td>
                                                @if ($proposal->status == 'Diproses Admin')
                                                    <span class="badge bg-warning text-white w-50">Menunggu Persetujuan
                                                        Admin</span>
                                                @elseif($proposal->status == 'Diterima Admin')
                                                    <span class="badge bg-info text-white w-50">Diterima Admin</span>
                                                @elseif($proposal->status == 'Ditolak Admin')
                                                    <span class="badge bg-danger text-white w-50">Ditolak Admin</span>
                                                @elseif($proposal->status == 'Diterima KPS')
                                                    <span class="badge bg-success text-white w-50">Diterima KPS</span>
                                                @elseif($proposal->status == 'Ditolak KPS')
                                                    <span class="badge bg-danger text-white w-50">Ditolak Admin</span>
                                                @elseif ($proposal->status1 == 'Diterima DosenPenguji1')
                                                    <span class="badge bg-warning text-white w-50">Di Nilai Dosen
                                                        Penguji Proposal 1</span>
                                                @elseif($proposal->status1 == 'Ditolak DosenPenguji1')
                                                    <span class="badge bg-danger text-white w-50">Ditolak Dosen Penguji
                                                        Proposal 1</span>
                                                @elseif ($proposal->status1 == 'Diterima DosenPenguji2')
                                                    <span class="badge bg-warning text-white w-50">Di Nilai Dosen Penguji
                                                        Proposal 2</span>
                                                @elseif($proposal->status2 == 'Ditolak DosenPenguji2')
                                                    <span class="badge bg-danger text-white w-50">Ditolak Dosen Penguji
                                                        Proposal 2</span>
                                                @elseif ($proposal->status == 'Lulus')
                                                    <span class="badge bg-primary text-white w-50">Lulus</span>
                                                @elseif ($proposal->status == 'Lulus dengan Revisi')
                                                    <span class="badge bg-primary text-white w-50">Lulus Dengan
                                                        Revisi</span>
                                                @elseif ($proposal->status == 'Tidak Lulus')
                                                    <span class="badge bg-danger text-white w-50">Tidak Lulus</span>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <button class="badge bg-primary border-0 my-3 mx-3 text-white viewBtn"
                                                    type="button" data-id="{{ $proposal->id }}">
                                                    <i class="fas fa-eye"></i> View
                                                </button>
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
                                        {{ $proposals->withQueryString()->links() }}
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.viewBtn').click(function() {
                var proposalId = $(this).data('id');

                $.ajax({
                    url: '/proposal_dosen_penguji/' + proposalId,
                    type: 'GET',
                    success: function(data) {
                        $('#modalContent').html(data);
                        $('#detailModal').modal('show');
                    },
                    error: function() {
                        alert('Error fetching proposal detail');
                    }
                });
            });
        });
    </script>
@endsection
