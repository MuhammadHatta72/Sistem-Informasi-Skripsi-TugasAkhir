@extends('dashboard.mahasiswa')

@section('title', 'Form Pengajuan Proposal')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Proposal</h1>
        </div>

        <div class="section-body ">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100">
                        <div class="card-header bg-whitesmoke">
                            <h4>Form Pengajuan Proposal</h4>
                        </div>
                        {{-- @if (true)
                            Anda belum memiliki outline yang valid
                        @else --}}
                        <!-- display any success message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body d-flex justify-content-center flex-column">
                            <form method="POST" action="{{ route('proposal_pengajuan.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Proposal</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judul" name="judul" value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="data1" class="form-label">Data 1</label>
                                    <textarea type="text" class="form-control @error('data1') is-invalid @enderror" id="data1" name="data1"
                                        style="height: 72px"></textarea>
                                    @error('data1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="data2" class="form-label">Data 2</label>
                                    <textarea type="text" class="form-control @error('data2') is-invalid @enderror" id="data2" name="data2"
                                        style="height: 72px"></textarea>
                                    @error('data2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="data3" class="form-label">Data 3</label>
                                    <textarea type="text" class="form-control @error('data3') is-invalid @enderror" id="data3" name="data3"
                                        style="height: 72px"></textarea>
                                    @error('data3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        {{-- @endif --}}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
