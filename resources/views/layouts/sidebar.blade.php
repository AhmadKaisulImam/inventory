<div class="sidebar">
			
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if (Auth::user()->foto)
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="rounded-circle avatar-img">
                    @else
                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            {{-- <span class="user-level">{{ Auth::user()->type }}</span> --}}
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ Request::is('home','gudang') ? 'active' : '' }}">
                    <a href="{{ auth()->user()->type == 'admin' ? '/home' : '/gudang' }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->type == 'admin')
                @include('layouts.sideadmin')
                @else
                @include('layouts.sidegudang')
                @endif
            </ul>
        </div>
    </div>
</div>