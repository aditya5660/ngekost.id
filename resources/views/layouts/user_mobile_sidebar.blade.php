<ul class="navbar-nav ml-auto d-lg-none d-xl-none">
    <li class="nav-item dropdown {{setActive(['users/dashboard'])}}">
        <a class="nav-link" href="{{route('users.dashboard')}}"><i class="flaticon-dashboard"></i>
            Dashboard
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['users/favorited-properties'])}}">
        <a class="nav-link" href="{{route('users.favorited-properties.index')}}"><i class="fa fa-list"></i>
            Favorited Properties
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['users/transaction'])}}">
        <a class="nav-link" href="{{route('users.transaction.index')}}"><i class="flaticon-bill"></i>
            Transaction
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['users/profile'])}}">
        <a class="nav-link" href="{{route('users.profile')}}"><i class="flaticon-people"></i>
            Profile
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i
                class="flaticon-logout"></i>
            {{ __('Logout') }}

        </a>

    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>
