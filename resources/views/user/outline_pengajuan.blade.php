@extends('dashboard.mahasiswa')

@section('title', 'Form Pengajuan Outline')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Outline</h1>
        </div>

        <div class="section-body ">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100">
                        <div class="card-header bg-whitesmoke"><h4>Form Pengajuan Outline</h4></div>
                        <div class="card-body d-flex justify-content-center flex-column">
                            <form method="POST" action="{{ route('outline.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="kegiatan" class="form-label">Judul Outline</label>
                                    <input type="text" class="form-control @error('kegiatan') is-invalid @enderror"
                                           id="kegiatan" name="kegiatan" value="{{ old('kegiatan') }}">
                                    @error('kegiatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fasilitas" class="form-label">Data 1</label>
                                    <textarea type="text" class="form-control @error('fasilitas') is-invalid @enderror"
                                              id="fasilitas"
                                              style="height: 72px"></textarea>
                                    @error('fasilitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fasilitas" class="form-label">Data 2</label>
                                    <textarea type="text" class="form-control @error('fasilitas') is-invalid @enderror"
                                              id="fasilitas"
                                              style="height: 72px"></textarea>
                                    @error('fasilitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fasilitas" class="form-label">Data 3</label>
                                    <textarea type="text" class="form-control @error('fasilitas') is-invalid @enderror"
                                              id="fasilitas"
                                              style="height: 72px"></textarea>
                                    @error('fasilitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
