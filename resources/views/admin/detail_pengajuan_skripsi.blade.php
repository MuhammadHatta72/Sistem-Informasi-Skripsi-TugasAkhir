<!-- outline_pengajuan.blade.php -->
@extends('dashboard.admin')

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
                        <h4>Detail Pengajuan Skripsi</h4>
                    </div>
                    <div class="card-body">
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
                            <div style="display: flex; gap:10px;">
                                <form method="POST" action="{{ route('persetujuan-skripsi.update', $skripsi->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="ditolak">
                                    <button type="submit" onClick="return confirm('Apakah yakin menolak pengajuan skripsi ?')" class="btn btn-danger">Tolak Pengajuan</button>
                                </form>
                                <form method="POST" action="{{ route('persetujuan-skripsi.update', $skripsi->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="diproses">
                                    <button type="submit" onClick="return confirm('Apakah yakin menerima pengajuan skripsi ?')" class="btn btn-success">Terima Pengajuan</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
