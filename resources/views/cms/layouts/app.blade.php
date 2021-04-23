<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('adminto/dist') }}/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('adminto/dist') }}/assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('adminto/dist') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('adminto/dist') }}/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet"
        type="text/css" />

    {{--  Sweet Alert --}}
    <link href="{{asset('adminto/dist/')}}/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
        type="text/css" />

    @yield('css')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        @if (Auth::user()->avata)
                        <img src="{{ Auth::user()->avatar }}" alt="user-image" class="rounded-circle">
                        @else
                        <img src="{{ asset('adminto/dist') }}/assets/images/user.png" alt="user-image"
                            class="rounded-circle">
                        @endif

                        <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <button class="dropdown-item notify-item" data-toggle="modal"
                            data-target="#modalChangePassword"><i class="fe-lock"></i><span>Change
                                Password</span></button>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>

            </ul>


            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ route('admin.dashboard.index') }}" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('adminto/dist') }}/assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('adminto/dist') }}/assets/images/logo-sm.png" alt="" height="24">
                    </span>
                </a>
                <a href="{{ route('admin.dashboard.index') }}" class="logo logo-light text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('adminto/dist') }}/assets/images/logo-light.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('adminto/dist') }}/assets/images/logo-sm.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">@yield('title')</h4>
                </li>

            </ul>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('cms.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
    {{-- modal change password --}}
    <div id="modalChangePassword" class="modal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Change Passowrd</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formPassword" method="POST" action="{{ route('admin.dashboard.change_password') }}"
                        data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Current password</label>
                            <input type="password" name="current_password" required=""
                                placeholder="Input current password" class="form-control">
                            <small>(type random string if using google account)</small>
                        </div>
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" name="password" minlength="6" required=""
                                placeholder="Input new password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm new password</label>
                            <input type="password" name="password_confirmation" required=""
                                placeholder="Input confirm new password" minlength="6" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <!-- Vendor js -->
    <script src="{{ asset('adminto/dist') }}/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('adminto/dist') }}/assets/js/app.min.js"></script>

    {{-- sweet alert --}}
    <script src="{{asset('adminto/dist/')}}/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Validation js (Parsleyjs) -->
    <script src="{{asset('adminto/dist/')}}/assets/libs/parsleyjs/parsley.min.js"></script>

    <!-- validation init -->
    <script src="{{asset('adminto/dist/')}}/assets/js/pages/form-validation.init.js"></script>

    @yield('js')

</body>

</html>