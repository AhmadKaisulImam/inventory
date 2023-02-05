<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg">
				
    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                </div>
            </form>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        @if (Auth::user()->foto)
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="rounded-circle avatar-img">
                        @else
                        <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg">
                                @if (Auth::user()->foto)
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="image profile" class="rounded avatar-img">
                                @else
                                <img src="../../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded">
                                @endif
                            </div>
                            <div class="u-text">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/profile"><i class="fa fa-user"></i> My Profile</a>
                        <div class="dropdown-divider"></div>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn dropdown-item">Logout</button>
                        </form>
                        {{-- <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Logout</a> --}}
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>
<!-- End Navbar -->