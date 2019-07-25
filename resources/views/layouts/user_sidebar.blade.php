<div class="col-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="dashboard-nav d-none d-xl-block d-lg-block">
        <div class="dashboard-inner">
            <h4>Main</h4>
            <ul>
                <li class="{{setActive(['users'])}}">
                    <a href="{{route('users.dashboard')}}"><i class="flaticon-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="{{setActive(['users/favorited-properties'])}}">
                <a href="{{route('users.favorited-properties.index')}}"><i class="fa fa-list"></i>
                        Favorited Properties
                    </a>
                </li>
                <li class="{{setActive(['users/transaction'])}}">
                    <a href="{{route('users.transaction.index')}}"><i class="flaticon-bill"></i>
                        Transaction
                    </a>
                </li>
                <li class="{{setActive(['users/profile'])}}">
                    <a href="{{route('users.profile')}}"><i class="flaticon-people"></i>
                        Profile
                    </a>
                </li>

                <li>

                <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><i class="flaticon-logout"></i>
                                                {{ __('Logout') }}

                </a>

            </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
            </ul>
        </div>
    </div>
</div>
