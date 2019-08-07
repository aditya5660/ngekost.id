<div class="col-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="dashboard-nav d-none d-xl-block d-lg-block">
        <div class="dashboard-inner">
            <h4>Main</h4>
            <ul>
                <li class="{{setActive(['admin/dashboard'])}}">
                    <a href="{{route('admin.dashboard')}}"><i class="flaticon-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="{{setActive(['admin/categories'])}}">
                <a href="{{route('admin.categories.index')}}"><i class="fa fa-list"></i>
                        Property Categories
                    </a>
                </li>
                <li class="{{setActive(['admin/amenities'])}}">
                <a href="{{route('admin.amenities.index')}}"><i class="fa fa-list"></i>
                        Amenities
                    </a>
                </li>
                <li class="{{setActive(['admin/properties'])}}">
                    <a href="{{ route('admin.properties.index')}}"><i class="flaticon-apartment-1"></i>
                        Property
                    </a>
                </li>
                <li {{setActive(['admin/transaction'])}}>
                    <a href="{{ route('admin.transaction.index')}}"><i class="flaticon-bill"></i>
                        Transaction
                    </a>
                </li>
                <li class="{{setActive(['admin/users'])}}">
                    <a href="{{ route('admin.users.index')}}"><i class="flaticon-people"></i>
                        Users
                    </a>
                </li>

                <li>
                    <a href=""><i class="flaticon-heart"></i>
                        Reviews
                    </a>
                </li>
                <li>
                    <a href=""><i class="flaticon-mail"></i>
                        Push Notification
                    </a>
                </li>
                <h4>Blog</h4>
                <li class="{{setActive(['admin/post_category'])}}">
                    <a href="{{route('admin.post_category.index')}}"><i class="fa fa-list"></i>
                        Post Categories
                    </a>
                </li>
                <li class="{{setActive(['admin/posts'])}}">
                    <a href="{{ route('admin.posts.index')}}"><i class="fa fa-pencil"></i>
                        Posts
                    </a>
                </li>
                <h4>Site Setting</h4>
                <li class="{{setActive(['admin/sliders'])}}">
                <a href="{{ route('admin.sliders.index')}}"><i class="fa fa-gear"></i>
                        Slider
                    </a>
                </li>
                <li class="{{setActive(['admin/setting'])}}">
                    <a href="{{route('admin.setting')}}"><i class="fa fa-gear"></i>
                        Setting
                    </a>
                </li>
                <li class="{{setActive(['admin/profile'])}}">
                    <a href="{{route('admin.profile')}}"><i class="fa fa-user"></i>
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
