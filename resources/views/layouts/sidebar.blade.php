<div class="sidebar">
			
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
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
            @if (auth()->user()->type == 'admin')
            @include('layouts.sideadmin')
            @else
            @include('layouts.sidegudang')
            @endif
        </div>
    </div>
</div>