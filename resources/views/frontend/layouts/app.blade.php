<!DOCTYPE html>
<html>

<head>

  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>FAS TESTING CODE</title>

  <meta name="keywords" content="FAS TESTING CODE" />
  <meta name="description" content="FAS TESTING CODE">
  <meta name="author" content="renoanthus">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('porto') }}/img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('porto') }}/img/apple-touch-icon.png">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

  <!-- Web Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light&display=swap"
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

<body>

  <div class="body">
    <header id="header" class="header-effect-shrink"
      data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
      <div class="header-body border-top-0">
        <div class="header-container container-fluid px-lg-4">
          <div class="header-row">
            <div class="header-column header-column-border-right flex-grow-0">
              <div class="header-row pr-4">
                <div class="header-logo">
                  <a href="index.html">
                    <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40"
                      src="{{ asset('porto') }}/img/logo-red-fas.png">
                  </a>
                </div>
              </div>
            </div>
            <div class="header-column">
              <div class="header-row">
                <div class="header-nav header-nav-links justify-content-center">
                  <div
                    class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                    <nav class="collapse header-mobile-border-top">
                      <ul class="nav nav-pills" id="mainNav">
                        <li class="dropdown">
                          <a class="dropdown-item dropdown-toggle active" href="{{ route('frontend.index') }}">
                            Post
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <div class="header-column header-column-border-left flex-grow-0 justify-content-center">
              <div class="header-row pl-4 justify-content-end">
                <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean m-0">
                  <li class="social-icons-facebook"><a href="http://www.facebook.com/ranthus" target="_blank"
                      title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="social-icons-instagram"><a href="http://www.instagram.com/reno_anthus" target="_blank"
                      title="Instagram"><i class="fab fa-instagram"></i></a></li>
                  <li class="social-icons-twitter"><a href="https://twitter.com/renoanthus" target="_blank"
                      title="Twitter"><i class="fab fa-twitter"></i></a></li>
                  <li class="social-icons-linkedin"><a href="https://www.linkedin.com/in/reno-anthus-177a79125/"
                      target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
                <button class="btn header-btn-collapse-nav ml-0 ml-sm-3" data-toggle="collapse"
                  data-target=".header-nav-main nav">
                  <i class="fas fa-bars"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('content')

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

  <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

</body>

</html>