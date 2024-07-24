{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('parsley/parsley.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->hasRole('user'))
                                <a class="dropdown-item" href="{{route('user.profile.view')}}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="{{route('user.change.password')}}">{{__('Change Password')}}</a>
                                @else
                                <a class="dropdown-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{route('admin.change.password')}}">{{__('Change Password')}}</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
        <main class="py-4">
            @include('includes.message')<br>
            @yield('content')
        </main>
        </div>
    </div>
</body>

</html> --}}


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Page Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/business_site/images/favicon.ico') }}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/animate.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/font-awesome.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/owl.theme.default.min.css') }}">
    <!-- Cube Portfolio -->
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/cubeportfolio.min.css') }}">
    <!-- Fancy Box -->
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/jquery.fancybox.min.css') }}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/business_site/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/business_site/rs-plugin/css/navigation.css') }}">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('frontend/business_site/css/style.css') }}">


</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="90">

    <!--Loader Start-->
    {{-- <div class="loader">
        <div class="loader-inner">
            <div class="loader-blocks">
                <span class="block-1"></span>
                <span class="block-2"></span>
                <span class="block-3"></span>
                <span class="block-4"></span>
                <span class="block-5"></span>
                <span class="block-6"></span>
                <span class="block-7"></span>
                <span class="block-8"></span>
                <span class="block-9"></span>
                <span class="block-10"></span>
                <span class="block-11"></span>
                <span class="block-12"></span>
                <span class="block-13"></span>
                <span class="block-14"></span>
                <span class="block-15"></span>
                <span class="block-16"></span>
            </div>
        </div>
    </div> --}}
    <!--Loader End-->

    <!--Header Start-->
    <header>

        <!--Navigation-->
        <nav class="navbar navbar-top-default navbar-expand-lg navbar-gradient nav-icon">
            <div class="container">
                <a href="javascript:void(0)" title="Logo" class="logo scroll">
                    <!--Logo Default-->
                    <img src="{{ asset('frontend/business_site/images/logo-white.png') }}" alt="logo"
                        class="logo-dark default">
                </a>

                <!--Nav Links-->
                <div class="collapse navbar-collapse" id="wexim">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link scroll" href="#home">Home</a>
                        <a class="nav-link scroll" href="#about">About</a>
                        <a class="nav-link scroll" href="#team">Team</a>
                        <a class="nav-link scroll" href="#portfolio">Work</a>
                        <a class="nav-link scroll" href="#price">Pricing</a>
                        <a class="nav-link scroll" href="#blog">Blog</a>
                        <a class="nav-link scroll" href="#contact">Contact</a>
                        <span class="menu-line"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                </div>

                <!--Side Menu Button-->
                <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>

            </div>
        </nav>

        <!--Side Nav-->
        <div class="side-menu">
            <div class="inner-wrapper">
                <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#team">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#portfolio">Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#price">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#contact">Contact</a>
                        </li>
                    </ul>
                </nav>

                <div class="side-footer text-white w-100">
                    <ul class="social-icons-simple">
                        <li><a class="facebook-text-hvr" href="javascript:void(0)"><i class="fa fa-facebook"></i>
                            </a> </li>
                        <li><a class="instagram-text-hvr" href="javascript:void(0)"><i class="fa fa-instagram"></i>
                            </a> </li>
                        <li><a class="twitter-text-hvr" href="javascript:void(0)"><i class="fa fa-twitter"></i> </a>
                        </li>
                    </ul>
                    <p class="text-white">&copy; 2021 Wexim. Made With Love by Themesindustry</p>
                </div>
            </div>
        </div>
        <a id="close_side_menu" href="javascript:void(0);"></a>
        <!-- End side menu -->

    </header>
    <!--Header end-->
    @yield('content')


    <!--Footer Start-->
    <section class="bg-light text-center">
        <h2 class="d-none">hidden</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-social">
                        <ul class="list-unstyled">
                            <li><a class="wow fadeInUp" href="javascript:void(0);"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a></li>
                            <li><a class="wow fadeInDown" href="javascript:void(0);"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a></li>
                            <li><a class="wow fadeInUp" href="javascript:void(0);"><i class="fa fa-google-plus"
                                        aria-hidden="true"></i></a></li>
                            <li><a class="wow fadeInDown" href="javascript:void(0);"><i class="fa fa-linkedin"
                                        aria-hidden="true"></i></a></li>
                            <li><a class="wow fadeInUp" href="javascript:void(0);"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a></li>
                            <li><a class="wow fadeInDown" href="javascript:void(0);"><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <p class="company-about fadeIn">© 2021 Wexim. Made With Love By <a
                            href="javascript:void(0);">Themesindustry</a></p>
                </div>
            </div>
        </div>
    </section>
    <!--Footer End-->

    <!--Scroll Top-->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
    <!--Scroll Top End-->

    <!-- Optional JavaScript -->
    <script src="{{ asset('frontend/business_site/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/business_site/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/business_site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/business_site/js/jquery.appear.js') }}"></script>
    <!-- isotop gallery -->
    <script src="{{ asset('frontend/business_site/js/isotope.pkgd.min.js') }}"></script>
    <!-- cube portfolio gallery -->
    <script src="{{ asset('frontend/business_site/js/jquery.cubeportfolio.min.js') }}"></script>
    <!-- owl carousel slider -->
    <script src="{{ asset('frontend/business_site/js/owl.carousel.min.js') }}"></script>
    <!-- text rotate -->
    <script src="{{ asset('frontend/business_site/js/morphext.min.js') }}"></script>
    <!-- particles -->
    <script src="{{ asset('frontend/business_site/js/particles.min.js') }}"></script>
    <!-- parallax Background -->
    <script src="{{ asset('frontend/business_site/js/parallaxie.min.js') }}"></script>
    <!-- fancybox popup -->
    <script src="{{ asset('frontend/business_site/js/jquery.fancybox.min.js') }}"></script>
    <!-- fancybox popup -->
    <script src="{{ asset('frontend/business_site/js/wow.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('frontend/business_site/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- SLIDER REVOLUTION EXTENSIONS -->
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('frontend/business_site/rs-plugin/js/extensions/revolution.extension.video.min.js') }}"></script>
    <!-- map -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB6YJu2gWq_4ABpOPGLy0c4JKg82U7a_JM"></script>
    <script src="{{ asset('frontend/business_site/js/map.js') }}"></script>
    <!-- custom script -->
    <script src="{{ asset('frontend/business_site/js/script.js') }}"></script>

</body>

</html>
