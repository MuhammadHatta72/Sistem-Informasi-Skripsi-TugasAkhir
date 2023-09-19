<!-- outline_pengajuan.blade.php -->
@extends('dashboard.mahasiswa')

@section('title', 'Form Pengajuan Outline')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengajuan Outline</h1>
        </div>

        <div class="section-body ">
            <div class="col-12 col-sm-5 col-lg-12">
                <div class="card">
                    <div class="card-header bg-whitesmoke">
                        <h4>Form Pengajuan Outline</h4>
                    </div>

                    @if(!is_null($outline))
                        <div class="card-body">
                            <div class="alert alert-info d-flex justify-content-between align-items-center">
                                <div>
                                    <h5><i class="fas fa-info"></i> Informasi</h5>
                                    <p>Anda sudah mengajukan outline</p>
                                </div>
                                <a href=" {{ route('outline_mahasiswa.index') }}" id="test" class="btn btn-primary">
                                    <i class="fas fa-history"></i> Riwayat Outline
                                </a>
                                <script>
                                    document.querySelector('#test').addEventListener('click', function() {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: 'You won\'t be able to revert this!',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Perform the action (e.g., submit the form)
                                                document.querySelector('#form-id').submit();
                                            }
                                        })
                                    });
                                </script>
                            </div>
                        </div>



                    @else
                        <div class="card-body">
                            <form method="POST" action="{{ route('outline_mahasiswa.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <ul class="nav nav-pills" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#outline1"
                                           role="tab" aria-controls="home" aria-selected="true">Outline Pertama</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#outline2"
                                           role="tab"
                                           aria-controls="profile" aria-selected="false">Outline Kedua</a>
                                    </li>
                                </ul>
                                <hr>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active align-content-start" id="outline1"
                                         role="tabpanel"
                                         aria-labelledby="outline1">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="judul1" class="form-label">Judul Outline</label>
                                                <input type="text"
                                                       class="form-control @error('judul1') is-invalid @enderror"
                                                       id="judul1" name="judul1" value="{{ old('judul1') }}">
                                                @error('judul1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-sm-4">
                                                <label for="bidang1">Bidang</label>
                                                <select class="form-control" id="bidang1" name="bidang1">
                                                    @foreach($bidangs as $id => $nama)
                                                        <option
                                                            value="{{ $id }}">{{ $nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="pendahuluan1" class="form-label">Ringkasan
                                                    Pendahuluan</label>
                                                <textarea type="text"
                                                          class="form-control @error('pendahuluan1') is-invalid @enderror"
                                                          id="pendahuluan1" name="pendahuluan1"
                                                          style="height: 72px">{{ old('pendahuluan1') }}</textarea>
                                                @error('pendahuluan1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="teori1" class="form-label">Kajian Teori</label>
                                                <textarea type="text"
                                                          class="form-control @error('teori1') is-invalid @enderror"
                                                          id="teori1" name="teori1"
                                                          style="height: 72px">{{ old('teori1') }}</textarea>
                                                @error('teori1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="metpen1" class="form-label">Metode Penelitian</label>
                                                <textarea type="text"
                                                          class="form-control @error('metpen1') is-invalid @enderror"
                                                          id="metpen1" name="metpen1"
                                                          style="height: 72px">{{ old('metpen1') }}</textarea>
                                                @error('metpen1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="outline2" role="tabpanel" aria-labelledby="outline2">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="judul2" class="form-label">Judul Outline</label>
                                                <input type="text"
                                                       class="form-control @error('judul2') is-invalid @enderror"
                                                       id="judul2" name="judul2" value="{{ old('judul2') }}">
                                                @error('judul2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-sm-4">
                                                <label for="bidang2">Bidang</label>
                                                <select class="form-control" id="bidang2" name="bidang2">
                                                    @foreach($bidangs as $id => $nama)
                                                        <option
                                                            value="{{ $id }}">{{ $nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="pendahuluan2" class="form-label">Ringkasan
                                                    Pendahuluan</label>
                                                <textarea type="text"
                                                          class="form-control @error('pendahuluan2') is-invalid @enderror"
                                                          id="pendahuluan2" name="pendahuluan2"
                                                          style="height: 72px">{{ old('pendahuluan2') }}</textarea>
                                                @error('pendahuluan2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="teori2" class="form-label">Kajian Teori</label>
                                                <textarea type="text"
                                                          class="form-control @error('teori2') is-invalid @enderror"
                                                          id="teori2" name="teori2"
                                                          style="height: 72px">{{ old('teori2') }}</textarea>
                                                @error('teori2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="metpen2" class="form-label">Metode Penelitian</label>
                                                <textarea type="text"
                                                          class="form-control @error('metpen2') is-invalid @enderror"
                                                          id="metpen2" name="metpen2"
                                                          style="height: 72px">{{ old('metpen2') }}</textarea>
                                                @error('metpen2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
