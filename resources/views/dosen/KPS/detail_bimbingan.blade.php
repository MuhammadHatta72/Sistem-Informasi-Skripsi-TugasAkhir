<!-- outline_pengajuan.blade.php -->
@extends('dashboard.dosen_KPS')

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
                          <div class="form-group mt-3">
                            <label>Pilih Dosen Pembimbing Intern</label>
                            <select class="form-control" name="dosen_pembimbing_intern" required>
                              <option value="">Pilih Dosen</option>
                              @foreach ($dosens as $dosen)
                                  <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                              @endforeach
                            </select>
                          </div>
                          <button type="submit" onClick="return confirm('Apakah Anda yakin, sudah memilih dosen tersebut?')" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header bg-whitesmoke">
                      <h4>Detail Pengajuan Bimbingan</h4>
                  </div>
                  <div class="card-body">
                      <ul class="list-group list-group-flush my-4">
                          <li class="list-group-item">Status : {{$bimbingan->status}}</li>
                        </ul>
                          <ul class="nav nav-pills" id="tabPengajuan" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#skla1"
                                     role="tab" aria-controls="home" aria-selected="true">Proses Bimbingan</a>
                              </li>
                          </ul>
                          <hr>
                          <div class="tab-content" id="myTabContent2">
                              <div class="tab-pane fade show active align-content-start" id="skla1" role="tabpanel"
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

                          <hr>
                          <a href="{{ route('bimbingan-kps.index') }}" class="btn btn-warning">Kembali</a>
                  </div>
              </div>
            </div>
        </div>
    </section>
@endsection
