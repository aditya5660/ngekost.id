
            <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                <li class="nav-item dropdown {{setActive(['owner/dashboard'])}}">
                    <a class="nav-link" href="{{route('owner.dashboard')}}"><i class="flaticon-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown {{setActive(['owner/properties'])}}">
                    <a class="nav-link" href="{{route('owner.properties.index')}}"><i class="flaticon-apartment-1"></i>
                        My Properties
                    </a>
                </li>
                <li class="nav-item dropdown {{setActive(['owner/transaction'])}}">
                    <a class="nav-link" href="{{route('owner.transaction.index')}}"><i class="flaticon-bill"></i>
                        Transaction
                    </a>
                </li>
                <li class="nav-item dropdown {{setActive(['owner/profile'])}}">
                    <a class="nav-link" href="{{route('owner.profile')}}"><i class="flaticon-people"></i>
                        Profile
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="flaticon-logout"></i>
                        {{ __('Logout') }}

                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
