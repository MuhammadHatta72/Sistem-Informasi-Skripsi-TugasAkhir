<div class="section-body ">
    <div class="col-12 col-sm-5 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('outline_KPS.validasi') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" id="status" value="">
                        <input type="hidden" name="id" value="{{ $outline->id }}">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#outline1"
                               role="tab" aria-controls="home" aria-selected="true">Outline Pertama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#outline2" role="tab"
                               aria-controls="profile" aria-selected="false">Outline Kedua</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active align-content-start" id="outline1" role="tabpanel"
                             aria-labelledby="outline1">
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="judul1" class="form-label">Judul 1</label>
                                    <input type="text" class="form-control @error('judul1') is-invalid @enderror"
                                           id="judul1" name="judul1" value="{{ $outline->judul_1 }}" readonly>
                                    @error('judul1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="bidang1" class="form-label">Bidang 1</label>
                                    <input type="text" class="form-control @error('bidang1') is-invalid @enderror"
                                           id="bidang1" name="bidang1" value="{{ $outline->bidang1->nama }}" readonly>
                                    @error('bidang1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="pendahuluan1" class="form-label">Ringkasan Pendahuluan</label>
                                    <textarea type="text"
                                              class="form-control @error('pendahuluan1') is-invalid @enderror"
                                              id="pendahuluan1"
                                              name="pendahuluan1"
                                              style="height: 72px" readonly>{{ $outline->pendahuluan_1 }}</textarea>
                                    @error('pendahuluan1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="teori1" class="form-label">Kajian Teori</label>
                                    <textarea type="text" class="form-control @error('teori1') is-invalid @enderror"
                                              id="teori1"
                                              name="teori1"
                                              style="height: 72px" readonly>{{ $outline->teori_1 }}</textarea>
                                    @error('teori1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="metpen1" class="form-label">Metode Penelitian</label>
                                    <textarea type="text" class="form-control @error('metpen1') is-invalid @enderror"
                                              id="metpen1"
                                              name="metpen1"
                                              style="height: 72px" readonly>{{ $outline->metpen_1 }}</textarea>
                                    @error('metpen1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="outline2" role="tabpanel" aria-labelledby="outline2">
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="judul2" class="form-label">Judul 1</label>
                                    <input type="text" class="form-control @error('judul2') is-invalid @enderror"
                                           id="judul2" name="judul2" value="{{ $outline->judul_2 }}" readonly>
                                    @error('judul2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="bidang2" class="form-label">Bidang 2</label>
                                    <input type="text" class="form-control @error('bidang2') is-invalid @enderror"
                                           id="bidang2" name="bidang2" value="{{ $outline->bidang2->nama }}" readonly>
                                    @error('bidang2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="pendahuluan2" class="form-label">Ringkasan Pendahuluan</label>
                                    <textarea type="text"
                                              class="form-control @error('pendahuluan2') is-invalid @enderror"
                                              id="pendahuluan2"
                                              name="pendahuluan2"
                                              style="height: 72px" readonly>{{ $outline->pendahuluan_2 }}</textarea>
                                    @error('pendahuluan2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="teori2" class="form-label">Kajian Teori</label>
                                    <textarea type="text" class="form-control @error('teori2') is-invalid @enderror"
                                              id="teori2"
                                              name="teori2"
                                              style="height: 72px" readonly>{{ $outline->teori_2 }}</textarea>
                                    @error('teori2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="metpen2" class="form-label">Metode Penelitian</label>
                                    <textarea type="text" class="form-control @error('metpen2') is-invalid @enderror"
                                              id="metpen2"
                                              name="metpen2"
                                              style="height: 72px" readonly>{{ $outline->metpen_2 }}</textarea>
                                    @error('metpen2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-sm-4">
                            <label for="dosen1">Dosen Penilai 1</label>
                            <select class="form-control" id="dosen1" name="dosen1">
                                @foreach($listDosen as $index => $dosen)
                                    <option value="{{ $dosen->id_dosen }}" {{ $dosen->id_dosen == $outline->id_dosen_penilai_1 ? 'selected' : '' }}>
                                        {{ $dosen->nama }} | {{ $slots[$index] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-4">
                            <label for="dosen2">Dosen Penilai 2</label>
                            <select class="form-control" id="dosen2" name="dosen2">
                                @foreach($listDosen as $index => $dosen)
                                    <option value="{{ $dosen->id_dosen }}" {{ $dosen->id_dosen == $outline->id_dosen_penilai_1 ? 'selected' : '' }}>
                                        {{ $dosen->nama }} | {{ $slots[$index] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mx-2" onclick="setStatus('Diterima KPS')">Terima</button>
                    <button type="button" class="btn btn-danger" onclick="setStatus('Ditolak KPS')">Tolak</button>
                    <button type="submit" class="btn btn-success d-none" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setStatus(status) {
        document.getElementById('status').value = status;
        document.getElementById('submitButton').click();
    }
</script>
