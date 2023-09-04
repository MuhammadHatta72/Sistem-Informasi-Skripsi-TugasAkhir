@extends('layouts.app')

@section('title', 'Form Tambah Wewenang')

@section('content')
    <section class="section">

        <div class="section-body ">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-xl px-4 mt-5">
                        <div class="card mb-4">
                            <div class="card-header bg-whitesmoke"><h4>Form Tambah Wewenang</h4></div>
                            <div class="card-body ps-5 pe-15">
                                <form method="POST" action="{{ route('wewenang.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="name" class="form-label">Jurusan</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   id="name" name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-6">
                                            <label for="pj" class="form-label">Penanggung Jawab</label>
                                            <input type="text" class="form-control @error('pj') is-invalid @enderror"
                                                   id="pj" name="pj" value="{{ old('pj') }}">
                                            @error('pj')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label for="jabatan" class="form-label">Jabatan</label>
                                            <input type="text"
                                                   class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                                   name="jabatan" value="{{ old('jabatan') }}">
                                            @error('jabatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-6">
                                            <label for="nip" class="form-label">Nomor Induk Pegawai</label>
                                            <input type="text"
                                                   class="form-control @error('nip') is-invalid @enderror"
                                                   id="nip"
                                                   name="nip">
                                            @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label for="ttd" class="form-label">Upload Tanda Tangan</label>
                                            <input class="form-control @error('ttd') is-invalid @enderror" type="file"
                                                   id="ttd" name="ttd">
                                            @error('ttd')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
    <li class="nav-item {{ request()->is('kelola-superadmin', 'users*') ? 'active' : '' }}"><a href="{{route('kelola.superadmin')}}" class="nav-link"><i class="fas fa-users"></i><span>Kelola Pengguna</span></a></li>
    <li class="nav-item {{ request()->is('kelola-wewenang', 'wewenang*') ? 'active' : '' }}"><a href="{{route('kelola.wewenang')}}" class="nav-link"><i class="fas fa-handshake"></i><span>Kelola Wewenang</span></a></li>
@endsection
