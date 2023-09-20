@extends('dashboard.mahasiswa')

@section('title', 'History Outline')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>History Pengajuan Outline</h1>
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
                            <h4>Data History Pengajuan Outline </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('outline_mahasiswa.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <ul class="nav nav-pills" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#outline1"
                                           role="tab" aria-controls="home" aria-selected="true">Outline Pertama</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#outline2"
                                           role="tab"
                                           aria-controls="profile" aria-selected="false">Outline Kedua</a>
                                    </li>
                                </ul>
                                <hr>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active align-content-start" id="outline1"
                                         role="tabpanel"
                                         aria-labelledby="outline1">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="judul1" class="form-label">Judul Outline</label>
                                                <input type="text"
                                                       class="form-control @error('judul1') is-invalid @enderror"
                                                       id="judul1" name="judul1" value="{{ $outlines->judul_1 }}">
                                                @error('judul1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-sm-4">
                                                <label for="bidang1">Bidang</label>
                                                <select class="form-control" id="bidang1" name="bidang1">
                                                    <option value="{{ $outlines->bidang_1 }}">{{ $outlines->bidang1->nama }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="pendahuluan1" class="form-label">Ringkasan
                                                    Pendahuluan</label>
                                                <textarea type="text"
                                                          class="form-control @error('pendahuluan1') is-invalid @enderror"
                                                          id="pendahuluan1" name="pendahuluan1"
                                                          style="height: 72px">{{ $outlines->pendahuluan_1 }}</textarea>
                                                @error('pendahuluan1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="teori1" class="form-label">Kajian Teori</label>
                                                <textarea type="text"
                                                          class="form-control @error('teori1') is-invalid @enderror"
                                                          id="teori1" name="teori1"
                                                          style="height: 72px">{{ $outlines->teori_1 }}</textarea>
                                                @error('teori1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="metpen1" class="form-label">Metode Penelitian</label>
                                                <textarea type="text"
                                                          class="form-control @error('metpen1') is-invalid @enderror"
                                                          id="metpen1" name="metpen1"
                                                          style="height: 72px">{{ $outlines->metpen_1 }}</textarea>
                                                @error('metpen1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="outline2" role="tabpanel" aria-labelledby="outline2">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="judul2" class="form-label">Judul Outline</label>
                                                <input type="text"
                                                       class="form-control @error('judul2') is-invalid @enderror"
                                                       id="judul2" name="judul2" value="{{ $outlines->judul_2 }}">
                                                @error('judul2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-sm-4">
                                                <label for="bidang2">Bidang</label>
                                                <select class="form-control" id="bidang2" name="bidang2">
                                                    <option value="{{ $outlines->bidang_2 }}">{{ $outlines->bidang2->nama }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="pendahuluan2" class="form-label">Ringkasan
                                                    Pendahuluan</label>
                                                <textarea type="text"
                                                          class="form-control @error('pendahuluan2') is-invalid @enderror"
                                                          id="pendahuluan2" name="pendahuluan2"
                                                          style="height: 72px">{{ $outlines->pendahuluan_2 }}</textarea>
                                                @error('pendahuluan2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="teori2" class="form-label">Kajian Teori</label>
                                                <textarea type="text"
                                                          class="form-control @error('teori2') is-invalid @enderror"
                                                          id="teori2" name="teori2"
                                                          style="height: 72px">{{ $outlines->teori_2 }}</textarea>
                                                @error('teori2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="metpen2" class="form-label">Metode Penelitian</label>
                                                <textarea type="text"
                                                          class="form-control @error('metpen2') is-invalid @enderror"
                                                          id="metpen2" name="metpen2"
                                                          style="height: 72px">{{ $outlines->metpen_2 }}</textarea>
                                                @error('metpen2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

