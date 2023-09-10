@extends('dashboard.mahasiswa')

@section('title', 'Form Pengajuan Skripsi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Skripsi</h1>
        </div>

        <div class="section-body ">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100">
                        <div class="card-header bg-whitesmoke"><h4>Form Pengajuan Skripsi</h4></div>
                        {{-- @if(true)
                        <div class="card-body d-flex justify-content-center flex-column">
                            <p>Anda belum memiliki proposal yang valid</p>
                        </div>
                        @else --}}
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
                            <div class="card-body d-flex justify-content-center flex-column">
                                <form method="POST" action="{{ route('skripsi.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Skripsi</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                               id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Skripsi Anda">
                                        @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="file_skripsi" class="form-label">Upload File</label>
                                        <textarea type="text" class="form-control @error('file_skripsi') is-invalid @enderror"
                                                  id="file_skripsi"
                                                  style="height: 72px"></textarea>
                                        @error('file_skripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="path_dokumen" class="form-label">Path Dokumen</label>
                                        <textarea type="text" class="form-control @error('path_dokumen') is-invalid @enderror"
                                                  id="path_dokumen"
                                                  style="height: 72px" placeholder="Masukkan Link Dokumen Anda" name="path_dokumen">{{ old('path_dokumen') }}</textarea>
                                        @error('path_dokumen')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        {{-- @endif --}}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
