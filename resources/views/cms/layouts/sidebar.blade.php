<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            @if (Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" alt="user-img" title="{{ Auth::user()->name }}"
                class="rounded-circle img-thumbnail avatar-md">
            @else
            <img src="{{ asset('adminto/dist') }}/assets/images/user.png" alt="user-img"
                title="{{ Auth::user()->name }}" class="rounded-circle img-thumbnail avatar-md">
            @endif
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                    aria-expanded="false">{{ Auth::user()->name }}</a>
            </div>
            <p class="text-muted">Admin</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('admin.dashboard.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}">
                        <i class="fas fa-layer-group"></i>
                        <span> Category </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.post.index') }}">
                        <i class="far fa-newspaper"></i>
                        <span> Post </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>


    </div>
    <!-- Sidebar -left -->

</div>