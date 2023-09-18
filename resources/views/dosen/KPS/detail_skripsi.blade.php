<!-- outline_pengajuan.blade.php -->
@extends('dashboard.kps')

@section('title', 'Detail Pengajuan Skripsi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Skripsi</h1>
        </div>

        <div class="section-body ">
            <div class="col-12 col-sm-5 col-lg-12">
                <div class="card">
                    <div class="card-header bg-whitesmoke">
                        <h4>Pemilihan Dosen</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('skripsi-kps.index') }}" class="btn btn-warning">Kembali</a>
                        <form action="{{ route('skripsi-kps.update', $skripsi->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-3">
                                <label>Pilih Dosen Penguji</label>
                                <select class="form-control" name="dosen_penguji_skripsi" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Pilih Dosen Pembimbing 1</label>
                                <select class="form-control" name="dosen_pembimbing_1" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Pilih Dosen Pembimbing 2</label>
                                <select class="form-control" name="dosen_pembimbing_2" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                    onClick="return confirm('Apakah Anda yakin, sudah memilih dosen tersebut?')"
                                    class="btn btn-primary">Submit
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-whitesmoke">
                        <h4>Detail Pengajuan Skripsi</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush my-4">
                            <li class="list-group-item">Status : {{$skripsi->status}}</li>
                            <li class="list-group-item">Nilai 1
                                : {{$skripsi->nilai1 == null ? 'Nilai belum diberikan' : $skripsi->nilai1}}</li>
                            <li class="list-group-item">Nilai 2
                                : {{$skripsi->nilai2 == null ? 'Nilai belum diberikan' : $skripsi->nilai2}}</li>
                            <li class="list-group-item">Nilai 3
                                : {{$skripsi->nilai3 == null ? 'Nilai belum diberikan' : $skripsi->nilai3}}</li>
                        </ul>
                        <ul class="nav nav-pills" id="tabPengajuan" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#skla1"
                                   role="tab" aria-controls="home" aria-selected="true">SKLA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#skkm1" role="tab"
                                   aria-controls="profile" aria-selected="false">SKKM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#kompen1" role="tab"
                                   aria-controls="profile" aria-selected="false">KOMPEN</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active align-content-start" id="skla1" role="tabpanel"
                                 aria-labelledby="skla1">
                                <object
                                        data="{{ asset('storage/Pengajuan_Skripsi/' . $skripsi->mahasiswa->nama . '-' . $skripsi->mahasiswa->nim . '/' . $skripsi->file_1) }}"
                                        type="application/pdf"
                                        width="100%"
                                        height="800"
                                >

                                    <iframe
                                            src="{{ asset('storage/Pengajuan_Skripsi/' . $skripsi->mahasiswa->nama . '-' . $skripsi->mahasiswa->nim . '/' . $skripsi->file_1) }}"
                                            width="500"
                                            height="678"
                                    >
                                        <p>This browser does not support PDF!</p>
                                    </iframe>
                                </object>
                            </div>
                            <div class="tab-pane fade" id="skkm1" role="tabpanel" aria-labelledby="skkm1">
                                <object
                                        data="{{ asset('storage/Pengajuan_Skripsi/' . $skripsi->mahasiswa->nama . '-' . $skripsi->mahasiswa->nim . '/' . $skripsi->file_2) }}"
                                        type="application/pdf"
                                        width="100%"
                                        height="800"
                                >

                                    <iframe
                                            src="{{ asset('storage/Pengajuan_Skripsi/' . $skripsi->mahasiswa->nama . '-' . $skripsi->mahasiswa->nim . '/' . $skripsi->file_2) }}"
                                            width="500"
                                            height="678"
                                    >
                                        <p>This browser does not support PDF!</p>
                                    </iframe>
                                </object>
                            </div>
                            <div class="tab-pane fade" id="kompen1" role="tabpanel" aria-labelledby="kompen1">
                                <object
                                        data="{{ asset('storage/Pengajuan_Skripsi/' . $skripsi->mahasiswa->nama . '-' . $skripsi->mahasiswa->nim . '/' . $skripsi->file_3) }}"
                                        type="application/pdf"
                                        width="100%"
                                        height="800"
                                >

                                    <iframe
                                            src="{{ asset('storage/Pengajuan_Skripsi/' . $skripsi->mahasiswa->nama . '-' . $skripsi->mahasiswa->nim . '/' . $skripsi->file_3) }}"
                                            width="500"
                                            height="678"
                                    >
                                        <p>This browser does not support PDF!</p>
                                    </iframe>
                                </object>
                            </div>
                        </div>

                        <hr>
                        <a href="{{ route('skripsi-kps.index') }}" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
