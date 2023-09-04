@extends('layouts.app')

@section('title', 'Menu Kelola User SuperAdmin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Data Wewenang</h1>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div

        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Wewenang</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search Wewenang">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Wewenang</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Jabatan</th>
                                        <th>NIP</th>
                                        <th>TTD</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($wewenangs as $wewenang)
                                        <tr>
                                            <td>{{ $wewenang->name }}</td>
                                            <td>{{ $wewenang->pj }}</td>
                                            <td>{{ $wewenang->jabatan }}</td>
                                            <td>{{ $wewenang->nip }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $wewenang->ttd) }}" width="70px">
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{route('wewenang.edit', ['wewenang' => $wewenang->id]) }}">
                                                    <button class="badge bg-success border-0 mt-3 mr-2 text-white" type="button">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                </a>
                                                <form action="{{ route('wewenang.destroy', ['wewenang' => $wewenang->id]) }}"
                                                      method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="badge bg-danger border-0 mt-3 text-white"
                                                            onclick="return confirm('Yakin Menghapus Wewenang?')"><i
                                                            class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $wewenangs->withQueryString()->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
    <li class="nav-item {{ request()->is('kelola-superadmin', 'users*') ? 'active' : '' }}"><a href="{{route('kelola.superadmin')}}" class="nav-link"><i class="fas fa-users"></i><span>Kelola Pengguna</span></a></li>
    <li class="nav-item {{ request()->is('kelola-wewenang', 'wewenang*') ? 'active' : '' }}"><a href="{{route('kelola.wewenang')}}" class="nav-link"><i class="fas fa-handshake"></i><span>Kelola Wewenang</span></a></li>
@endsection
