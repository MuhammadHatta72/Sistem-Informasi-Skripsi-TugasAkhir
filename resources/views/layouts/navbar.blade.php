<form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li>
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" data-toggle="dropdown"
           class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                 class="rounded-circle mr-1"/>
            <div class="d-sm-none d-lg-inline-block">
                @if(!is_null(auth()->user()->id_mahasiswa))
                    {{ auth()->user()->mahasiswa->nama }}
                @elseif(!is_null(auth()->user()->id_dosen))
                    {{ auth()->user()->dosen->nama }}
                @else
                    {{ auth()->user()->admin->nama }}
                @endif
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @section('navbar')
                <a href="{{ route('profile.edit')  }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                </form>
            @show
        </div>
    </li>
</ul>

