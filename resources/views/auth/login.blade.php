<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login | FAS - TEST CODE</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="FAS - TEST CODE">
    <meta name="author" content="renoanthus">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('porto') }}/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('porto') }}/img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('porto') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('porto') }}/css/theme.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/css/theme-elements.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/css/theme-blog.css">
    <link rel="stylesheet" href="{{ asset('porto') }}/css/theme-shop.css">


    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('porto') }}/css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('porto') }}/css/custom.css">

    <!-- Head Libs -->
    <script src="{{ asset('porto') }}/vendor/modernizr/modernizr.min.js"></script>

</head>

<body class="alternative-font-4">

    <div class="body">

        <div role="main" class="main">

            <div class="container py-4">

                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                        <h2 class="font-weight-bold text-5 mb-0">Login</h2>
                        <form action="{{ route('login') }}" id="frmSignIn" method="post" class="needs-validation">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="text-color-dark text-3">Email address <span
                                            class="text-color-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control form-control-lg text-4 @error('email') is-invalid @enderror"
                                        autocomplete="email" autofocus required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="text-color-dark text-3">Password <span
                                            class="text-color-danger">*</span></label>
                                    <input type="password" name="password" value=""
                                        class="form-control form-control-lg text-4 @error('password') is-invalid @enderror"
                                        autocomplete="current-password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <button type="submit"
                                        class="btn btn-dark btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3"
                                        data-loading-text="Loading...">Login</button>
                                    <div class="divider">
                                        <span
                                            class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
                                    </div>
                                    <a href="{{ route('login.google') }}""
                                        class=" btn btn-primary-scale-2 btn-modern btn-block text-transform-none
                                        rounded-0 font-weight-bold align-items-center d-inline-flex
                                        justify-content-center text-3 py-3" data-loading-text="Loading..."><i
                                            class="fab fa-google text-5 mr-2"></i> Login
                                        With Google</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <h2 class="font-weight-bold text-5 mb-0">Register</h2>
                        <form action="{{ route('register') }}" id="frmSignUp" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="text-color-dark text-3">Name <span
                                            class="text-color-danger">*</span></label>
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        class="form-control form-control-lg text-4 @error('name') is-invalid @enderror"
                                        autocomplete="name" autofocus required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="text-color-dark text-3">Email address <span
                                            class="text-color-danger">*</span></label>
                                    <input type="email" value="{{ old('email') }}" name="email"
                                        class="form-control form-control-lg text-4 @error('email') is-invalid @enderror"
                                        autocomplete="email" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="text-color-dark text-3">Password <span
                                            class="text-color-danger">*</span></label>
                                    <input type="password" value="" name="password"
                                        class="form-control form-control-lg text-4  @error('password') is-invalid @enderror"
                                        autocomplete="new-password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="text-color-dark text-3">Confirm Password <span
                                            class="text-color-danger">*</span></label>
                                    <input type="password" value="" name="password_confirmation"
                                        class="form-control form-control-lg text-4" autocomplete="new-password"
                                        required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <button type="submit"
                                        class="btn btn-dark btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3"
                                        data-loading-text="Loading...">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        @include('frontend.layouts.footer')
    </div>

    <!-- Vendor -->
    <script src="{{ asset('porto') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/jquery.cookie/jquery.cookie.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/popper/umd/popper.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/common/common.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/jquery.validation/jquery.validate.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/jquery.gmap/jquery.gmap.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/isotope/jquery.isotope.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/vide/jquery.vide.min.js"></script>
    <script src="{{ asset('porto') }}/vendor/vivus/vivus.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('porto') }}/js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('porto') }}/js/custom.js"></script>


    <!-- Theme Initialization Files -->
    <script src="{{ asset('porto') }}/js/theme.init.js"></script>

</body>

</html>