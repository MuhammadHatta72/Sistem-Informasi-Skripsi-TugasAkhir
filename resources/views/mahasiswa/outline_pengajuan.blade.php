<!-- outline_pengajuan.blade.php -->
@extends('dashboard.mahasiswa')

@section('title', 'Form Pengajuan Outline')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Outline</h1>
        </div>

        <div class="section-body ">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <!-- Dashboard example card 1-->
                    <a class="card lift h-100">
                        <div class="card-header bg-whitesmoke">
                            <h4>Form Pengajuan Outline</h4>
                        </div>
                        <div class="card-body d-flex justify-content-center flex-column">
                            <!-- display any errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- display any success message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <!-- create a form to submit the outline data -->
                            <form method="POST" action="{{ route('outline.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Outline</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judul" name="judul" value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="bab1" class="form-label">Data 1</label>
                                    <textarea type="text" class="form-control @error('bab1') is-invalid @enderror" id="bab1" name="bab1"
                                        style="height: 72px">{{ old('bab1') }}</textarea>
                                    @error('bab1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="bab2" class="form-label">Data 2</label>
                                    <textarea type="text" class="form-control @error('bab2') is-invalid @enderror" id="bab2" name="bab2"
                                        style="height: 72px">{{ old('bab2') }}</textarea>
                                    @error('bab2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="bab3" class="form-label">Data 3</label>
                                    <textarea type="text" class="form-control @error('bab3') is-invalid @enderror" id="bab3" name="bab3"
                                        style="height: 72px">{{ old('bab3') }}</textarea>
                                    @error('bab3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
