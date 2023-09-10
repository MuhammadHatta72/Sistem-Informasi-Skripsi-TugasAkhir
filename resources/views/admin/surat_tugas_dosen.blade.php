@extends('dashboard.admin')

@section('title', 'Daftar Surat Tugas Dosen')

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
            <h1>Daftar Surat Tugas Dosen</h1>
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
                            <h4>Data Surat Tugas</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control"
                                            placeholder="Cari Surat Tugas">
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
                                        <th>Nama Dosen</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($dosens as $dosen)
                                    <form method="POST" action="{{route('admin.print_surat_tugas', $dosen->id)}}">
                                        @csrf
                                        <tr>
                                            <td>{{$dosen->nama}}</td>
                                            <td>
                                                <select class="form-control" name="pilihan_cetak">
                                                    <option value="">Pilih Sebagai</option>
                                                    <option value="Dosen Penguji">Dosen Penguji</option>
                                                    <option value="Dosen Pembimbing">Dosen Pembimbing</option>
                                              </select>
                                            </td>
                                            <td>
                                                <button type="submit" href="" class="btn btn-warning">Cetak PDF</button>
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
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
        
    </script>
@endsection
