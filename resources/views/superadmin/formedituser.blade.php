@extends('layouts.app')

@section('title', 'Form Daftar')

@section('content')
    <section class="section">

        <div class="section-body ">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-xl px-4 mt-5">
                        <div class="card mb-4">
                            <div class="card-header bg-whitesmoke"><h4>Form Edit User</h4></div>
                            <div class="card-body ps-5 pe-15">
                                <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-6">
                                        <label for="name" class="form-label">Nama User</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label for="phone" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                   id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-6">
                                            <label for="email" class="form-label">Email User</label>
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror" id="email"
                                                   name="email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   id="password"
                                                   name="password">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="Role" class="form-label">Role</label>
                                            <select class="form-control" name="role" id="role">
                                                @if(old('role', $user->role) == 'user')
                                                    <option value="user" selected>User</option>
                                                @else
                                                    <option value="user">User</option>
                                                @endif
                                                @if(old('role', $user->role) == 'superadmin')
                                                    <option value="superadmin" selected>Super Admin</option>
                                                @else
                                                    <option value="superadmin">Super Admin</option>
                                                @endif
                                                @if(old('role', $user->role) == 'admin')
                                                    <option value="admin" selected>Admin</option>
                                                @else
                                                    <option value="admin">Admin</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sn-4">
                                            <label for="wewenang" class="form-label">Wewenang</label>
                                            <select class="form-control" name="id_wewenang" id="wewenang">
                                                @foreach($wewenangs as $wewenang)
                                                    @if(old('id_wewenang', $user->id_wewenang) == $wewenang->id)
                                                        <option value="{{$wewenang->id}}"
                                                                selected>{{$wewenang->name}}</option>
                                                    @endif
                                                    <option value="{{$wewenang->id}}">{{$wewenang->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="logo" class="form-label">Upload Logo</label>
                                            <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                                   id="logo" name="logo">
                                            @error('logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="nama_pj" class="form-label">Nama Ketua OKI/Admin Jurusan</label>
                                            <input type="text" class="form-control @error('nama_pj') is-invalid @enderror"
                                                   id="nama_pj" name="nama_pj" value="{{ old('nama_pj', $user->nama_pj)}}">
                                            @error('nama_pj')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="ninduk_pj" class="form-label">NIM/NIP</label>
                                            <input type="text" class="form-control @error('ninduk_pj') is-invalid @enderror"
                                                   id="ninduk_pj" name="ninduk_pj" value="{{ old('ninduk_pj', $user->ninduk_pj)}}">
                                            @error('ninduk_pj')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="ttd_pj" class="form-label">Upload TTD Ketua/Admin</label>
                                            <input class="form-control @error('ttd_pj') is-invalid @enderror" type="file"
                                                   id="ttd_pj" name="ttd_pj">
                                            @error('ttd_pj')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="additional-form" class="row mb-3" style="display: none;">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="nama_dpk" class="form-label">Nama DPK</label>
                                            <input type="text" class="form-control @error('nama_pj') is-invalid @enderror"
                                                   id="nama_dpk" name="nama_dpk" value="{{ old('nama_dpk',$user->nama_dpk) }}">
                                            @error('nama_dpk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="nip_dpk" class="form-label">NIP</label>
                                            <input type="text" class="form-control @error('nip_dpk') is-invalid @enderror"
                                                   id="nip_dpk" name="nip_dpk" value="{{ old('nip_dpk',$user->nip_dpk) }}">
                                            @error('nip_dpk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="ttd_dpk" class="form-label">Upload TTD DPK</label>
                                            <input class="form-control @error('ttd_pj') is-invalid @enderror" type="file"
                                                   id="ttd_dpk" name="ttd_dpk">
                                            @error('ttd_dpk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="oldttdpj" value="{{ $user->ttd_pj }}">
                                    <input type="hidden" name="oldttddpk" value="{{ $user->ttd_dpk }}">
                                    <input type="hidden" name="oldLogo" value="{{ $user->logo }}">


                                    <button type="submit" class="btn btn-primary mt-5">Update</button>
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
