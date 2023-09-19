<!-- outline_pengajuan.blade.php -->
@extends('dashboard.kps')

@section('title', 'Detail Pengajuan Bimbingan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Bimbingan</h1>
        </div>

        <div class="section-body ">
            <div class="col-12 col-sm-5 col-lg-12">
                <div class="card">
                    <div class="card-header bg-whitesmoke">
                        <h4>Pemilihan Dosen</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('bimbingan-kps.index') }}" class="btn btn-warning">Kembali</a>
                        <form action="{{ route('bimbingan-kps.update', $bimbingan->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-3">
                                <label>Pilih Dosen Pembimbing 1</label>
                                <select class="form-control" name="dosen_pembimbing_1" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach($listDosen as $index => $dosen)
                                        <option value="{{ $dosen->id_dosen }}" {{ $dosen->id_dosen == $bimbingan->id_dosen_pembimbing_1 ? 'selected' : '' }}>
                                            {{ $dosen->nama }} | {{ $slots[$index] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Pilih Dosen Pembimbing 2</label>
                                <select class="form-control" name="dosen_pembimbing_2" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach($listDosen as $index => $dosen)
                                        <option value="{{ $dosen->id_dosen }}" {{ $dosen->id_dosen == $bimbingan->id_dosen_pembimbing_2 ? 'selected' : '' }}>
                                            {{ $dosen->nama }} | {{ $slots[$index] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if($bimbingan->mahasiswa->kelas->jenis != 'internasional')
                                <div class="form-group mt-3">
                                    <label>Pilih Dosen Pembimbing Abstrak</label>
                                    <select class="form-control" name="dosen_pembimbing_abstrak" required>
                                        <option value="">Pilih Dosen</option>
                                        @foreach($listDosen as $index => $dosen)
                                            <option value="{{ $dosen->id_dosen }}" {{ $dosen->id_dosen == $bimbingan->id_dosen_pembimbing_abstrak ? 'selected' : '' }}>
                                                {{ $dosen->nama }} | {{ $slots[$index] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <button type="submit"
                                    onClick="return confirm('Apakah Anda yakin, sudah memilih dosen tersebut?')"
                                    class="btn btn-primary">Submit
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-whitesmoke">
                        <h4>Detail Pengajuan Bimbingan</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="tabPengajuan" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#proposalbimbingan"
                                   role="tab" aria-controls="home" aria-selected="true">Proses Bimbingan</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active align-content-start" id="proposalbimbingan"
                                 role="tabpanel"
                                 aria-labelledby="proposalbimbingan">
                                <object
                                        data="{{ asset('storage/proposalbimbingan/' . $bimbingan->mahasiswa->nama . '-' . $bimbingan->mahasiswa->nim . '/' . $bimbingan->proposalbimbingan) }}"
                                        type="application/pdf"
                                        width="100%"
                                        height="800"
                                >

                                    <iframe
                                            src="{{ asset('storage/proposalbimbingan/' . $bimbingan->mahasiswa->nama . '-' . $bimbingan->mahasiswa->nim . '/' . $bimbingan->proposalbimbingan) }}"
                                            width="500"
                                            height="678"
                                    >
                                        <p>This browser does not support PDF!</p>
                                    </iframe>
                                </object>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
