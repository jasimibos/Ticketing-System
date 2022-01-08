        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/">
                <img style="width: 200px;" src="{{ asset('assets/img/logo.png') }}">
            </a>
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @if( auth()->user()->role == 2 )
                            <a class="dropdown-item" href="{{ route('password.request') }}">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/profile/view">Profile</a>
                            <div class="dropdown-divider"></div>
                        @else
                            <a class="dropdown-item" href="/change_password">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/admin/{{ auth()->user()->id }}/edit">Profile</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" 
                            href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();"
                        >
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>