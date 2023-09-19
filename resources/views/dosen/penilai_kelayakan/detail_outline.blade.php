<div class="section-body ">
    <div class="row">
        <div class="col-xl-12 mb-4">
            <!-- Dashboard example card 1-->
            <div class="card-body d-flex justify-content-center flex-column">
                <!-- display any success message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @php
                    $judul = $outline->pilihan == 1 ? $outline->judul_1 : $outline->judul_2;
                    $bidang = $outline->pilihan == 1 ? $outline->bidang1->nama : $outline->bidang2->nama;
                    $pendahuluan = $outline->pilihan == 1 ? $outline->pendahuluan_1 : $outline->pendahuluan_2;
                    $teori = $outline->pilihan == 1 ? $outline->teori_1 : $outline->teori_2;
                    $metpen = $outline->pilihan == 1 ? $outline->metpen_1 : $outline->metpen_2;
                @endphp

                <!-- create a form to submit the outline data -->
                <form method="POST" action="{{ route('outline_dosen_penilai.validasi') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" id="status" value="">
                    <input type="hidden" name="id" value="{{ $outline->id }}">
                    <input type="hidden" name="pilihan" id="pilihan" value="">


                    <div class="row mb-3">
                        <div class="col-lg-6 col-sm-6">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   id="nama" name="nama" value="{{ $outline->mahasiswa->nama }}" readonly>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="bidang" class="form-label">Bidang</label>
                            <input type="text" class="form-control @error('bidang') is-invalid @enderror"
                                   id="bidang" name="bidang"
                                   value="{{ $bidang }}"
                                   readonly>
                            @error('bidang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="judul" class="form-label">Judul Outline</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                   id="judul" name="judul"
                                   value="{{ $judul }}"
                                   readonly>
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="pendahuluan" class="form-label">Pendahuluan</label>
                            <textarea type="text" class="form-control @error('pendahuluan') is-invalid @enderror"
                                      id="pendahuluan"
                                      name="pendahuluan"
                                      style="height: 72px" readonly>{{ $pendahuluan }}</textarea>
                            @error('pendahuluan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="teori" class="form-label">Kajian teori</label>
                            <textarea type="text" class="form-control @error('teori') is-invalid @enderror" id="teori"
                                      name="teori"
                                      style="height: 72px" readonly>{{ $teori }}</textarea>
                            @error('teori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="metpen" class="form-label">Metode Penelitian</label>
                            <textarea type="text" class="form-control @error('metpen') is-invalid @enderror" id="metpen"
                                      name="metpen"
                                      style="height: 72px" readonly>{{ $metpen}}</textarea>
                            @error('metpen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="revisi" class="form-label">Revisi</label>
                            <input type="text" class="form-control @error('revisi') is-invalid @enderror"
                                   id="revisi" name="revisi" value="" placeholder="Opsional">
                            @error('revisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="button" class="btn btn-success"
                            onclick="setStatus({{ $outline->id_dosen_penilai_1 == auth()->user()->id_dosen ? "'Diterima DosenPenilai1'" : "'Diterima DosenPenilai2'" }}, '1')">Lulus Outline 1</button>
                    <button type="button" class="btn btn-success mx-2"
                            onclick="setStatus({{ $outline->id_dosen_penilai_1 == auth()->user()->id_dosen ? "'Diterima DosenPenilai1'" : "'Diterima DosenPenilai2'" }}, '2')">Lulus Outline 2</button>
                    <button type="button" class="btn btn-danger "
                            onclick="setStatus( {{ $outline->id_dosen_penilai_1 == auth()->user()->id_dosen ? "'Ditolak DosenPenilai1'" : "'Ditolak DosenPenilai2'" }})">Tidak Lulus</button>
                    <button type="submit" class="btn btn-success d-none" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setStatus(status, pilihan) {
        document.getElementById('status').value = status;
        document.getElementById('pilihan').value = pilihan;
        document.getElementById('submitButton').click();
    }
</script>
