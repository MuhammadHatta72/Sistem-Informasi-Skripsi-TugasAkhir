
<div class="section-body">
    <div class="row">
        <div class="col-xl-12 mb-4">
            <!-- Dashboard example card 1-->
            <div class="card-body d-flex justify-content-center flex-column">
                <!-- Menampilkan pesan sukses -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Menampilkan pesan error -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Membuat form untuk mengirim data proposal -->
                <form method="POST" action="{{ route('proposal_kps.validasi') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" id="status" value="">
                    <input type="hidden" name="id" value="{{ $proposal->id }}">

                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="judul" class="form-label">Judul Proposal</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                id="judul" name="judul" value="{{ $proposal->judul }}" readonly>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="bab1" class="form-label">Data 1</label>
                            <textarea type="text" class="form-control @error('bab1') is-invalid @enderror" id="bab1" name="bab1"
                                style="height: 72px" readonly>{{ $proposal->data1 }}</textarea>
                            @error('bab1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="bab2" class="form-label">Data 2</label>
                            <textarea type="text" class="form-control @error('bab2') is-invalid @enderror" id="bab2" name="bab2"
                                style="height: 72px" readonly>{{ $proposal->data2 }}</textarea>
                            @error('bab2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <label for="bab3" class="form-label">Data 3</label>
                            <textarea type="text" class="form-control @error('bab3') is-invalid @enderror" id="bab3" name="bab3"
                                style="height: 72px" readonly>{{ $proposal->data3 }}</textarea>
                            @error('bab3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-sm-4">
                            <label for="dosen1">Dosen Penilai 1</label>
                            <select class="form-control" id="dosen1" name="dosen1">
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-4">
                            <label for="dosen2">Dosen Penilai 2</label>
                            <select class="form-control" id="dosen2" name="dosen2">
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="setStatus('Diterima')">Terima</button>
                    <button type="button" class="btn btn-danger" onclick="setStatus('Ditolak')">Tolak</button>
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
