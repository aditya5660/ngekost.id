<header class="main-header header-transparent sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand logo" href="{{url('/')}}">
                <img src="{{ asset('logo/logo-blue.png')}}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                        <li class="{{ Request::is('*') ? 'active' : '' }}nav-item megamenu-li">
                                <a class="nav-link dropdown-toggle" href="{{ route('home') }}" >Home</a>
                            </li>

                        <li class="{{ Request::is('/property') ? 'active' : '' }}nav-item megamenu-li">
                            <a class="nav-link " href="{{ route('property') }}" >
                                Cari Kos
                            </a>
                        </li>

                        <li class="{{ Request::is('/blog') ? 'active' : '' }}nav-item megamenu-li">
                            <a class="nav-link dropdown-toggle" href="{{ route('blog') }}" >
                                Blog
                            </a>
                        </li>

                        <li class="{{ Request::is('/about') ? 'active' : '' }}nav-item megamenu-li">
                            <a class="nav-link dropdown-toggle" href="{{ route('about') }}" >
                                Tentang Kami
                            </a>
                        </li>
                    @guest
                    <li class="{{ Request::is('/login') ? 'active' : '' }}nav-item megamenu-li">
                        <a class="nav-link dropdown-toggle" href="{{ route('login') }}" >
                            Login
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ ucfirst(Auth::user()->name) }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if(Auth::user()->role->id == 1)
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @elseif(Auth::user()->role->id == 2)
                                <li><a class="dropdown-item" href="{{ route('owner.dashboard') }}">Dashboard</a></li>
                            @elseif(Auth::user()->role->id == 3)
                                <li><a class="dropdown-item" href="{{ route('users.dashboard') }}">Dashboard</a></li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</header>
