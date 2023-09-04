<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}">SIM-SARPRAS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('home') }}">SS</a>
    </div>
    <ul class="sidebar-menu">

        @section('sidebar')

            <li class="menu-header">Menu</li>
            <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-poll-h"></i><span>Dashboard</span>
                </a>
            </li>
        @show
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://helpakademik.polinema.ac.id/" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <img src="{{ asset('assets/img/logo_polinema.png') }}" alt="logo" width="30" class=circle"> PUSKOM POLINEMA
        </a>
    </div>
</aside>
