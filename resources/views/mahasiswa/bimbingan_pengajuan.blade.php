@extends('dashboard.mahasiswa')

@section('title', 'Form Pengajuan Bimbingan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Bimbingan</h1>
        </div>

        <div class="section-body ">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100">
                        <div class="card-header bg-whitesmoke"><h4>Form Pengajuan Bimbingan</h4></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(is_null($proposal))
                            <div class="card-body">
                                <div class="alert alert-danger">
                                    Anda belum melakukan ujian proposal atau Anda telah mengajukan bimbingan sebelumnya
                                </div>
                            </div>
                        @else
                            <div class="card-body d-flex justify-content-center flex-column">
                                <form method="POST" action="{{ route('bimbingan_pengajuan.store')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Skripsi</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                               id="judul" name="judul" value="{{ $proposal->judul }}" readonly>
                                        @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="bidang" class="form-label">Bidang</label>
                                        <input type="text" class="form-control @error('bidang') is-invalid @enderror"
                                               id="bidang" name="bidang" value="{{ $proposal->kategori }}" readonly>
                                        @error('bidang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="proposalbimbingan" class="form-label">Proposal yang telah
                                            disetujui</label>
                                        <input type="file" accept=".pdf"
                                               class="form-control @error('proposalbimbingan') is-invalid @enderror"
                                               id="proposalbimbingan" name="proposalbimbingan"
                                               value="{{ old('judul') }}">
                                        @error('proposalbimbingan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" onClick="return confirm('Pastikan data yang dikirim benar !')"
                                            class="btn btn-primary">Submit
                                    </button>
                                </form>
                            </div>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
