@extends('dashboard.admin')

@section('title', 'Dashboard Admin')
@push('customCSS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pengajuan Outline</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>

        @endif
        <div class="section-body ">
            <div class="row">
                <div class="col-6 col-sm-5 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action=""
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" id="status" value="">
                                <input type="hidden" name="pilihan" id="pilihan" value="">
                                <input type="hidden" name="id" value="{{ $outline->id }}">
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
                                        <div class="row mb-3">
                                            <div class="col-lg-12 col-sm-12">
                                                <label for="judul1" class="form-label">Judul 1</label>
                                                <input type="text"
                                                       class="form-control @error('judul1') is-invalid @enderror"
                                                       id="judul1" name="judul1" value="{{ $outline->judul_1 }}"
                                                       readonly>
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
                                                <input type="text"
                                                       class="form-control @error('bidang1') is-invalid @enderror"
                                                       id="bidang1" name="bidang1" value="{{ $outline->bidang1->nama }}"
                                                       readonly>
                                                @error('bidang1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-12 col-sm-12">
                                                <label for="pendahuluan1" class="form-label">Ringkasan
                                                    Pendahuluan</label>
                                                <textarea type="text"
                                                          class="form-control @error('pendahuluan1') is-invalid @enderror"
                                                          id="pendahuluan1"
                                                          name="pendahuluan1"
                                                          style="height: 72px"
                                                          readonly>{{ $outline->pendahuluan_1 }}</textarea>
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
                                                <textarea type="text"
                                                          class="form-control @error('teori1') is-invalid @enderror"
                                                          id="teori1"
                                                          name="teori1"
                                                          style="height: 72px"
                                                          readonly>{{ $outline->teori_1 }}</textarea>
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
                                                <textarea type="text"
                                                          class="form-control @error('metpen1') is-invalid @enderror"
                                                          id="metpen1"
                                                          name="metpen1"
                                                          style="height: 72px"
                                                          readonly>{{ $outline->metpen_1 }}</textarea>
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
                                                <input type="text"
                                                       class="form-control @error('judul2') is-invalid @enderror"
                                                       id="judul2" name="judul2" value="{{ $outline->judul_2 }}"
                                                       readonly>
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
                                                <input type="text"
                                                       class="form-control @error('bidang2') is-invalid @enderror"
                                                       id="bidang2" name="bidang2" value="{{ $outline->bidang2->nama }}"
                                                       readonly>
                                                @error('bidang2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-12 col-sm-12">
                                                <label for="pendahuluan2" class="form-label">Ringkasan
                                                    Pendahuluan</label>
                                                <textarea type="text"
                                                          class="form-control @error('pendahuluan2') is-invalid @enderror"
                                                          id="pendahuluan2"
                                                          name="pendahuluan2"
                                                          style="height: 72px"
                                                          readonly>{{ $outline->pendahuluan_2 }}</textarea>
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
                                                <textarea type="text"
                                                          class="form-control @error('teori2') is-invalid @enderror"
                                                          id="teori2"
                                                          name="teori2"
                                                          style="height: 72px"
                                                          readonly>{{ $outline->teori_2 }}</textarea>
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
                                                <textarea type="text"
                                                          class="form-control @error('metpen2') is-invalid @enderror"
                                                          id="metpen2"
                                                          name="metpen2"
                                                          style="height: 72px"
                                                          readonly>{{ $outline->metpen_2 }}</textarea>
                                                @error('metpen2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action=""
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" id="status" value="">
                                <input type="hidden" name="pilihan" id="pilihan" value="">
                                <input type="hidden" name="id" value="{{ $outline->id }}">
                                <ul class="nav nav-pills" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#outline1"
                                           role="tab" aria-controls="home" aria-selected="true">Jadwal</a>
                                    </li>
                                </ul>
                                <hr>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active align-content-start" id="outline1"
                                         role="tabpanel"
                                         aria-labelledby="outline1">
                                        <div class="row">

                                            <div id='calendar'></div>
                                            <script>
                                                $(document).ready(function () {
                                                    // Array warna-warna yang tersedia
                                                    var availableColors = [
                                                        '#343A40', // Dark
                                                        '#6C757D', // Secondary
                                                        '#198754', // Success
                                                        '#DC3545', // Danger
                                                        '#FFC107', // Warning
                                                        '#0D6EFD', // Primary
                                                        '#6610F2', // Indigo
                                                        '#6F42C1', // Purple
                                                        '#D63384', // Pink
                                                        '#FD7E14', // Orange
                                                        '#20C997', // Teal
                                                        '#0DCAF0', // Cyan
                                                        '#E83E8C', // Fuchsia
                                                        '#FD7E14', // Yellow
                                                        '#007BFF', // Blue
                                                        '#FFC107', // Amber
                                                        '#28A745', // Green
                                                        '#17A2B8', // Info
                                                        '#6C757D', // Gray
                                                    ];

                                                    $('#calendar').fullCalendar({
                                                        defaultView: 'month',
                                                        events: [
                                                            {
                                                                title: 'konz',
                                                                start: '2018-12-01',
                                                                end: '2018-12-02',
                                                                color: getRandomColor(),
                                                                textColor: 'white'
                                                            },
                                                        ]
                                                    });


                                                    // Function untuk mendapatkan warna acak dari array
                                                    function getRandomColor() {
                                                        if (availableColors.length === 0) {
                                                            return '#808080'; // Jika tidak ada warna tersedia, gunakan warna abu-abu
                                                        }

                                                        var colorIndex = Math.floor(Math.random() * availableColors.length);
                                                        var color = availableColors[colorIndex];
                                                        availableColors.splice(colorIndex, 1); // Hapus warna dari array
                                                        return color;
                                                    }
                                                });
                                            </script>
                                        </div>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col-lg-6 col-sm-6">
                                                <label for="tanggal_mulai" class="form-label">Mulai Tanggal</label>
                                                <input id="tanggal_mulai"
                                                       class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                       type="date" name="tanggal_mulai">
                                                @error('tanggal_mulai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <span id="startDateSelected"></span>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('customJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
@endpush

