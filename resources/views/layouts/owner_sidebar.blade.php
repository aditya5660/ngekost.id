<div class="col-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="dashboard-nav d-none d-xl-block d-lg-block">
        <div class="dashboard-inner">
            <h4>Main</h4>
            <ul>
                <li class="{{setActive(['owner'])}}">
                    <a href="{{route('owner.dashboard')}}"><i class="flaticon-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="{{setActive(['owner/properties'])}}">
                    <a href="{{route('owner.properties.index')}}"><i class="flaticon-apartment-1"></i>
                        My Properties
                    </a>
                </li>
                <li class="{{setActive(['owner/properties'])}}">
                    <a href="{{route('owner.transaction.index')}}"><i class="flaticon-bill"></i>
                        Transaction
                    </a>
                </li>
                <li class="{{setActive(['owner/profile'])}}">
                    <a href="{{route('owner.profile')}}"><i class="flaticon-people"></i>
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
