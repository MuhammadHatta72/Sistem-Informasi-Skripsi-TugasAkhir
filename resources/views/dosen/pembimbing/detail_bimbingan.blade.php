<!-- bimbingan_pengajuan.blade.php -->
@extends('dashboard.dosen')

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
                        <h4>Detail Pengajuan Bimbingan</h4>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; gap:10px;">
                            <a href="{{ route('bimbingan_dosen_pembimbing.index') }}" class="btn btn-warning">Kembali</a>
                            <form method="POST" action="{{ route('bimbingan_dosen_pembimbing.update', $bimbingan->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="ditolak dosen pembimbing">
                                <button type="submit" onClick="return confirm('Apakah yakin menolak pengajuan bimbingan ?')" class="btn btn-danger">Tolak Pengajuan</button>
                            </form>
                            <form method="POST" action="{{ route('bimbingan_dosen_pembimbing.update', $bimbingan->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="lulus bimbingan">
                                <button type="submit" onClick="return confirm('Apakah yakin menerima pengajuan bimbingan ?')" class="btn btn-success">Terima Pengajuan</button>
                            </form>
                        </div>
                        <hr>
                        <ul class="nav nav-pills" id="tabPengajuan" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#proposalbimbingan"
                                    role="tab" aria-controls="home" aria-selected="true">Proposal Bimbingan</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active align-content-start" id="proposalbimbingan" role="tabpanel"
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
