@extends('dashboard.dosen')

@section('title', 'Form Penerimaan Outline')

@section('sidebar')
    @parent
    <li
        class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-calendar-check"></i><span>Outline</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('KPSoutline.index') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('outline.index') }}">History</a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-calendar-check"></i><span>Ujian Proposal</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('proposal.create') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('proposal.index') }}">History</a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item dropdown {{ request()->is('daftar-sarana-prasarana-mahasiswa', 'peminjaman-mahasiswa*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-calendar-check"></i><span>Ujian Skripsi</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('skripsi.create') }}">Pengajuan</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('skripsi.index') }}">History</a>
            </li>
        </ul>
    </li>
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h1>Judul dan Bab yang Diajukan oleh Mahasiswa</h1>
            </div>

            @foreach ($outlines as $outline)
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $outline->judul }}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="border-bottom pb-2">Bab 1</h6>
                        <p>{{ $outline->bab1 }}</p><br>

                        <h6 class="border-bottom pb-2">Bab 2</h6>
                        <p>{{ $outline->bab2 }}</p><br>

                        <h6 class="border-bottom pb-2">Bab 3</h6>
                        <p>{{ $outline->bab3 }}</p><br>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
