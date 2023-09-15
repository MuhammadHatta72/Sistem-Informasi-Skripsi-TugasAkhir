@extends('dashboard.dosen_pembimbing')

@section('title', 'Dashboard Dosen Pembimbing Bimbingan')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="section-body ">
        <div class="row">
            <div class="col-xl-12 mb-4">
                <!-- Dashboard example card 1-->
                <div class="card-body d-flex justify-content-center flex-column">
                    <!-- display any success message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- create a form to submit the bimbingan data -->
                    <form method="POST" action="{{ route('bimbingan_dosen_pembimbing.validasi') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="status" id="status" value="">
                        <input type="hidden" name="id" value="{{ $bimbingan->id }}">

                        <div class="row mb-3">
                            <div class="col-lg-6 col-sm-6">
                                <label for="nama" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ $bimbingan->mahasiswa->nama }}" readonly>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="judul" class="form-label">Judul Bimbingan</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    id="judul" name="judul" value="{{ $bimbingan->judul }}" readonly>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 col-sm-12">
                                <label for="data1" class="form-label">Data 1</label>
                                <textarea type="text" class="form-control @error('data1') is-invalid @enderror" id="data1" name="data1"
                                    style="height: 72px" readonly>{{ $bimbingan->data1 }}</textarea>
                                @error('data1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 col-sm-12">
                                <label for="data2" class="form-label">Data 2</label>
                                <textarea type="text" class="form-control @error('data2') is-invalid @enderror" id="data2" name="data2"
                                    style="height: 72px" readonly>{{ $bimbingan->data2 }}</textarea>
                                @error('data2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 col-sm-12">
                                <label for="data3" class="form-label">Data 3</label>
                                <textarea type="text" class="form-control @error('data3') is-invalid @enderror" id="data3" name="data3"
                                    style="height: 72px" readonly>{{ $bimbingan->data3 }}</textarea>
                                @error('data3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="row mb-3">
                            <div class="col-lg-12 col-sm-12">
                                <label for="nilai" class="form-label">Nilai</label>
                                <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                    id="nilai" name="nilai" value="{{ $bimbingan->nilai }}">
                                @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        <button type="button" class="btn btn-primary" onclick="setStatus('Lulus')">Lulus</button>
                        <button type="button" class="btn btn-danger" onclick="setStatus('Tidak Lulus')">Tidak
                            Lulus</button>
                        <button type="submit" class="btn btn-success d-none" id="submitButton">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function setStatus(status) {
            document.getElementById('status').value = status;
            document.getElementById('submitButton').click();
        }
    </script>
