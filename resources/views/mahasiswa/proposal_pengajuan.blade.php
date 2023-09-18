@extends('dashboard.mahasiswa')

@section('title', 'Form Pengajuan Proposal')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Proposal</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <!-- Dashboard example card 1-->
                    <div class="card lift h-100">
                        @if(is_null($outline))
                            <div class="card-header bg-whitesmoke">
                                <h4>Form Pengajuan Proposal</h4>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger">
                                    Anda belum memiliki outline yang lulus
                                </div>
                            </div>
                        @else
                            @if($outline->pilihan == 1)
                                @php
                                $judul = $outline->judul_1;
                                $bidang = $outline->bidang1->nama;
                                @endphp
                            @endif

                            <div class="card-header bg-whitesmoke">
                                <h4>Form Pengajuan Proposal</h4>
                            </div>
                            <!-- Display any success message -->
                            @if (session('success'))
                                <div class="alert alert-success mt-3 ml-3 mr-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <form method="POST" action="{{ route('proposal_pengajuan.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Proposal</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                               id="judul" name="judul" value="{{ $judul }}" readonly>
                                        @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" class="form-control @error('ketegori') is-invalid @enderror"
                                               id="kategori" name="kategori" value="{{ $bidang }}" readonly>
                                        @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="file" class="form-label">Template Proposal</label><br>
                                        <a href="{{ route('file_template.download') }}" class="btn btn-success">Unduh
                                            Template</a>
                                    </div>

                                    <div class=" mb-3">
                                        <label for="file" class="form-label">Upload Proposal</label>
                                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                                               id="file" name="file" value="{{ old('file') }}">
                                        @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




{{--                        @if ()--}}
{{--                            Anda belum memiliki outline yang valid--}}
{{--                        @else--}}
<!-- display any success message -->
{{--                         @endif--}}
