<ul class="navbar-nav ml-auto d-lg-none d-xl-none">
    <li class="nav-item dropdown {{setActive(['admin/dashboard'])}}">
        <a class="nav-link" href="{{route('admin.dashboard')}}"><i class="flaticon-dashboard"></i>
            Dashboard
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['admin/categories'])}}">
        <a class="nav-link" href="{{route('admin.categories.index')}}"><i class="fa fa-list"></i>
            Property Categories
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['admin/amenities'])}}">
        <a class="nav-link" href="{{route('admin.amenities.index')}}"><i class="fa fa-list"></i>
            Amenities
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['admin/properties'])}}">
        <a class="nav-link" href="{{ route('admin.properties.index')}}"><i class="flaticon-apartment-1"></i>
            Property
        </a>
    </li>
    <li {{setActive(['admin/transaction'])}}>
        <a class="nav-link" href="{{ route('admin.transaction.index')}}"><i class="flaticon-bill"></i>
            Transaction
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['admin/users'])}}">
        <a class="nav-link" href="{{ route('admin.users.index')}}"><i class="flaticon-people"></i>
            Users
        </a>
    </li>

    <li>
        <a class="nav-link" href=""><i class="flaticon-heart"></i>
            Reviews
        </a>
    </li>
    <li>
        <a class="nav-link" href=""><i class="flaticon-mail"></i>
            Push Notification
        </a>
    </li>
    <h4>Blog</h4>
    <li class="nav-item dropdown {{setActive(['admin/post_category'])}}">
        <a class="nav-link" href="{{route('admin.post_category.index')}}"><i class="fa fa-list"></i>
            Post Categories
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['admin/posts'])}}">
        <a class="nav-link" href="{{ route('admin.posts.index')}}"><i class="fa fa-pencil"></i>
            Posts
        </a>
    </li>
    <h4>Site Setting</h4>
    <li class="nav-item dropdown {{setActive(['admin/sliders'])}}">
        <a class="nav-link" href="{{ route('admin.sliders.index')}}"><i class="fa fa-gear"></i>
            Slider
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['admin/setting'])}}">
        <a class="nav-link" href="{{route('admin.setting')}}"><i class="fa fa-gear"></i>
            Setting
        </a>
    </li>
    <li class="nav-item dropdown {{setActive(['admin/profile'])}}">
        <a class="nav-link" href="{{route('admin.profile')}}"><i class="fa fa-user"></i>
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
