<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="images/favicon.png" rel="icon" />
    <title>Kenil - Responsive Bootstrap 5 One Page Portfolio Html Template</title>
    <meta name="description"
        content="Kenil is creative Responsive Bootstrap 5 One Page Personal Portfolio Html Template.">
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
============================== -->
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/theme1/vendor/animate/animate.min.css') }}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/theme1/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/theme1/vendor/font-awesome/css/all.min.css') }}" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/theme1/vendor/owl.carousel/assets/owl.carousel.min.css') }}" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/theme1/vendor/magnific-popup/magnific-popup.min.css') }}" />
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/theme1/css/stylesheet.css') }}" />
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="0">

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!-- Preloader End -->

    <!-- Document Wrapper
=============================== -->
    <div id="main-wrapper">
        <!-- Header
  ============================ -->
        <header id="header" class="sticky-top-slide">
            <!-- Navbar -->
            <nav
                class="primary-menu navbar navbar-expand-lg navbar-text-light navbar-line-under-text bg-transparent border-bottom-0">
                <div class="container">
                    <!-- Logo -->
                    <a class="logo ms-3 ms-md-0" href="index.html" title="Kenil Patel"> <img
                            src="{{ asset('frontend/theme1/images/logo-light.png') }}" alt="Kenil Patel" /> </a>
                    <!-- Logo End -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#header-nav"><span></span><span></span><span></span></button>
                    <div id="header-nav" class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            @if ($userInfo->menus[0]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll active" href="#home">{{ $userInfo->menus[0]->menu_title }}</a></li>
                            @endif
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#services">Services</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#why-choose">Why Choose</a>
                            </li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#process">Process</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#clients">Clients</a></li>
                            <li class="align-items-center h-auto ms-lg-3"><a href="#contact"
                                    class="nav-link btn btn-outline-light shadow-none d-inline-block rounded-pill mt-3 mt-lg-0 smooth-scroll">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
        </header>
        <!-- Header End -->

        <!-- Content
  ============================================= -->
        <div id="content" role="main">

            <!-- Intro
    ============================================= -->
        @if ($userInfo->menus[0]->show_status)

            <section id="home">
                <div class="hero-wrap">
                    <div id="particles-js" class="hero-particles"></div>
                    <div class="hero-mask opacity-7 bg-dark"></div>
                    <div class="hero-bg owl-carousel owl-theme single-slideshow" data-animateout="fadeOut"
                        data-animatein="fadeIn" data-autoplay="true" data-loop="true" data-dots="false" data-nav="false"
                        data-items="1">
                        @if ($userInfo->home?->slider_1_status)
                        <div class="item"
                            style="background-image:url('{{ $userInfo->home?->slider_1 ? asset('images/'.$userInfo->home?->slider_1) : defaultImage('home_slider_1') }}');"></div>
                        @endif
                        @if ($userInfo->home?->slider_2_status)
                        <div class="item"
                            style="background-image:url('{{ $userInfo->home?->slider_2 ? asset('images/'.$userInfo->home?->slider_2) : defaultImage('home_slider_2') }}');"></div>
                        @endif

                        @if ($userInfo->home?->slider_3_status)
                        <div class="item"
                            style="background-image:url('{{ $userInfo->home?->slider_3 ? asset('images/'.$userInfo->home?->slider_3) : defaultImage('home_slider_3') }}');"></div>
                        @endif
                    </div>
                    <div class="hero-content section d-flex min-vh-100">
                        <div class="container my-auto">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="text-5 text-uppercase text-white ls-4 mb-2 mb-md-3">
                                        {{$userInfo->home?->text_1}}
                                    </p>
                                    @if(count(json_decode($userInfo->home?->text_2)) > 0)
                                    <div class="typed-strings">
                                        @foreach (json_decode($userInfo->home?->text_2) as $item)
                                            <p>{{$item}}</p>
                                        @endforeach
                                    </div>
                                    @endif
                                    <h2 class="text-17 fw-600 text-white mb-2 mb-md-3"><span class="typed"></span>
                                    </h2>
                                    <p class="text-5 text-light">{{$userInfo->home?->text_3}}</p>

                                    @if ($userInfo->home?->button_status)
                                    @if($userInfo->home?->file)
                                    <a href="{{asset('files/'.$userInfo->home?->file)}}" download="" class="btn btn-primary rounded-pill mt-3">{{$userInfo->home?->button_text}}</a>
                                    @else
                                    <a href="#" class="btn btn-primary rounded-pill mt-3">{{$userInfo->home?->button_text}}</a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <a href="#about" class="scroll-down-arrow text-white smooth-scroll"><span
                                class="animated"><i class="fa fa-chevron-down"></i></span></a>
                    </div>
                </div>
            </section>
            <!-- Intro end -->
        @endif

        @if ($userInfo->menus[1]->show_status)
            <!-- About
    ============================================= -->
            <section id="about" class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 text-center mb-5 mb-lg-0 wow fadeInLeft"> <img
                                class="img-fluid shadow-md rounded d-inline-block"
                                src="{{ $userInfo->about?->image ? asset('images/'.$userInfo->about?->image) : defaultImage('about_image') }}" title="I'm Kenil Patel"
                                alt=""> </div>
                        <div class="col-lg-7 text-center text-lg-start ps-lg-4 wow fadeInRight">
                            <h2 class="fw-600 mb-4">{{$userInfo->about?->text_1}}</h2>
                            <h3 class="text-6 mb-4"><span class="text-primary fw-600">{{$userInfo->about?->text_2}}</span>
                            </h3>
                            <p>{!! $userInfo->about?->text_3!!}</p>
                            <div class="brands-grid separator-border my-sm-4">
                                <div class="row">
                                    @if ($userInfo->about?->count_1)

                                    <div class="col-sm-4 py-4 py-sm-2">
                                        <div class="featured-box text-center">
                                            <h4 class="text-8 text-muted mb-0"><span class="counter" data-from="0"
                                                    data-to="{{$userInfo->about?->count_1}}">{{$userInfo->about?->count_1}}</span>+</h4>
                                            <p class="mb-0">{{$userInfo->about?->count_text_1}}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($userInfo->about?->count_2)

                                    <div class="col-sm-4 py-4 py-sm-2">
                                        <div class="featured-box text-center">
                                            <h4 class="text-8 text-muted mb-0"><span class="counter" data-from="0"
                                                    data-to="{{$userInfo->about?->count_2}}">{{$userInfo->about?->count_2}}</span>+</h4>
                                            <p class="mb-0">{{$userInfo->about?->count_text_2}}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($userInfo->about?->count_3)

                                    <div class="col-sm-4 py-4 py-sm-2">
                                        <div class="featured-box text-center">
                                            <h4 class="text-8 text-muted mb-0"><span class="counter" data-from="0"
                                                    data-to="{{$userInfo->about?->count_3}}">{{$userInfo->about?->count_3}}</span>+</h4>
                                            <p class="mb-0">{{$userInfo->about?->count_text_3}}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if ($userInfo->about?->button_status)
                            <a class="btn btn-secondary rounded-pill mt-3" data-bs-toggle="modal"
                                data-bs-target="#about-us-details" href="#">{{$userInfo->about?->button_text}}</a>
                            @endif

                            @if ($userInfo->about?->extra_text)
                            <a href="#portfolio"
                            class="btn btn-link smooth-scroll mt-3 px-4">{{$userInfo->about?->extra_text}}<span
                                class="text-1 ms-2"><i class="fas fa-chevron-right"></i></span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <!-- About end -->
            @endif
            <!-- Services
    ============================================= -->
            <section id="services" class="section bg-light">
                <div class="container">

                    <!-- Heading -->
                    <div class="row mb-4 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">{{$userInfo->additional_infos->where('key','service_text')->first()->value}}</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">{!! $userInfo->additional_infos->where('key','service_description')->first()->value!!}</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="row g-4">
                        @foreach ($userInfo->services as $service)
                        @if ($service->status)
                        <div class="col-sm-6 col-lg-4 wow fadeInLeft">
                            <div class="featured-box bg-white text-center rounded shadow-sm py-5 px-4">
                                <div class="featured-box-icon text-primary mt-2"> <i class="{{$service->icon}}"></i>
                                </div>
                                <h3 class="mb-3">{{$service->title}}</h3>
                                <p class="text-muted mb-0">{!! $service->description !!}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                       
                    </div>
                </div>
            </section>
            <!-- Services end -->

            <!-- Why Choose
    ============================================= -->
            <section id="why-choose" class="section">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">Why I'm Different?</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">We're smart, we're hard working, we're easy to talk to, and we
                                love a challenge.</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="row justify-content-center mb-md-4 wow fadeInUp">
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="featured-box style-3">
                                <div class="featured-box-icon text-primary border rounded-circle"> <i
                                        class="fas fa-fingerprint"></i></div>
                                <h3>Unique Design</h3>
                                <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk to, and
                                    we love a challenge.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="featured-box style-3">
                                <div class="featured-box-icon text-primary border rounded-circle"> <i
                                        class="fas fa-cog"></i> </div>
                                <h3>Fully Customisable</h3>
                                <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk to, and
                                    we love a challenge.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="featured-box style-3">
                                <div class="featured-box-icon text-primary border rounded-circle"> <i
                                        class="fas fa-layer-group"></i> </div>
                                <h3>Different Layout</h3>
                                <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk to, and
                                    we love a challenge.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="featured-box style-3">
                                <div class="featured-box-icon text-primary border rounded-circle"> <i
                                        class="fas fa-mobile-alt"></i> </div>
                                <h3>Responsive Layout</h3>
                                <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk to, and
                                    we love a challenge.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="featured-box style-3">
                                <div class="featured-box-icon text-primary border rounded-circle"> <i
                                        class="fas fa-expand-alt"></i> </div>
                                <h3>Boxed & Wide Layouts</h3>
                                <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk to, and
                                    we love a challenge.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="featured-box style-3">
                                <div class="featured-box-icon text-primary border rounded-circle"> <i
                                        class="far fa-life-ring"></i> </div>
                                <h3>Extensive Documentation</h3>
                                <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk to, and
                                    we love a challenge.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 text-center wow fadeInLeft">
                            <div class="hero-wrap section h-100 rounded shadow-lg p-5">
                                <div class="hero-mask opacity-6 bg-dark rounded"></div>
                                <div class="hero-bg hero-bg-scroll rounded"
                                    style="background-image:url('{{ asset('frontend/theme1/images/why-choose.jpg') }}');">
                                </div>
                                <div
                                    class="hero-content h-100 d-flex flex-column align-items-center justify-content-center py-5">
                                    <a class="btn-video-play popup-youtube"
                                        href="http://www.youtube.com/watch?v=7e90gBu4pas"><i
                                            class="fas fa-play"></i></a>
                                    <p class="text-white fw-500 text-uppercase mt-3 mb-0">Play &amp; Watch!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 align-self-center mt-5 mt-md-0 wow fadeInRight">
                            <div class="px-lg-4">
                                <h3 class="text-6 mb-3">My Skills</h3>
                                <p class="text-muted">Lisque persius interesset his et, in quot quidam persequeris vim,
                                    ad mea essent possim iriure.</p>
                                <p class="fw-500 text-start mb-2">Branding & Desing <span class="float-end">95%</span>
                                </p>
                                <div class="progress progress-sm mb-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 95%"
                                        aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="fw-500 text-start mb-2">Web Development <span class="float-end">65%</span>
                                </p>
                                <div class="progress progress-sm mb-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="fw-500 text-start mb-2">Business Analysis <span class="float-end">80%</span>
                                </p>
                                <div class="progress progress-sm mb-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="fw-500 text-start">Digital Marketing <span class="float-end">75%</span></p>
                                <div class="progress progress-sm mb-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Why Choose end -->

            <!-- Promo Box
 ============================================= -->
            <section class="section bg-primary text-center">
                <div class="container wow bounceIn">
                    <p class="lead text-white">I am Available for Freelancer.</p>
                    <h2 class="text-10 text-white mb-4">Start a project with Me today!</h2>
                    <a href="#contact"
                        class="btn btn-light rounded-pill shadow-none smooth-scroll mt-2 wow rubberBand"
                        data-wow-delay="1.2s">Hire Me</a>
                </div>
            </section>
            <!-- Promo Box end -->

            <!-- Portfolio
 ============================================= -->
            <section id="portfolio" class="section">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">Our Best Works</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">I help you build brand for your business at an affordable
                                price. Thousands of clients have procured exceptional results while working with Me.</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <!-- Filter Menu -->
                    <ul
                        class="portfolio-menu nav nav-pills text-uppercase justify-content-center border-bottom-0 mb-5 wow fadeInUp">
                        <li class="nav-item"> <a data-filter="*" class="nav-link rounded-pill active"
                                href="">All</a></li>
                        <li class="nav-item"> <a data-filter=".graphicdesign" href=""
                                class="nav-link rounded-pill">Graphic Design</a></li>
                        <li class="nav-item"> <a data-filter=".webdesign" href=""
                                class="nav-link rounded-pill">Web Design</a></li>
                        <li class="nav-item"> <a data-filter=".artwork" href=""
                                class="nav-link rounded-pill">Art Work</a></li>
                        <li class="nav-item"> <a data-filter=".branding" href=""
                                class="nav-link rounded-pill">Branding</a></li>
                    </ul>
                    <!-- Filter Menu end -->

                    <div class="portfolio popup-ajax-gallery wow fadeInUp">
                        <div class="row portfolio-filter g-4">
                            <div class="col-sm-6 col-lg-4 artwork">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-1.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-1.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 1</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 artwork">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-2.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-2.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 2</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 artwork branding">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-3.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-3.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 3</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 artwork">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-4.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-4.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 4</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 webdesign">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-5.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-5.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 5</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 webdesign">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-6.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-6.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 6</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 webdesign graphicdesign">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-7.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-7.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 7</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 webdesign">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-8.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-8.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 8</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 graphicdesign branding">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="{{ asset('frontend/theme1/images/projects/project-9.jpg') }}"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-9.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                <h5 class="text-white fw-400">Project Title 9</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Portfolio end -->

            <!-- Process
    ============================================= -->
            <section id="process" class="section bg-light">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">Work Process</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">Simple work process of build your design. Delivering work
                                within time and budget which meets client’s requirements is our moto.</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <div class="row gy-5 wow fadeInUp">
                                <div class="col-md-6">
                                    <div class="featured-box style-3">
                                        <div
                                            class="featured-box-icon text-primary border border-primary border-3 rounded-circle">
                                            <span class="text-8 fw-600">1</span></div>
                                        <h3 class="text-5">Planning &amp; Consulting</h3>
                                        <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk
                                            to, and we love a challenge lisque persius mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3">
                                        <div
                                            class="featured-box-icon text-primary border border-primary border-3 rounded-circle">
                                            <span class="text-8 fw-600">2</span></div>
                                        <h3 class="text-5">Content</h3>
                                        <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk
                                            to, and we love a challenge lisque persius mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3">
                                        <div
                                            class="featured-box-icon text-primary border border-primary border-3 rounded-circle">
                                            <span class="text-8 fw-600">3</span></div>
                                        <h3 class="text-5">Conception</h3>
                                        <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk
                                            to, and we love a challenge lisque persius mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3">
                                        <div
                                            class="featured-box-icon text-primary border border-primary border-3 rounded-circle">
                                            <span class="text-8 fw-600">4</span></div>
                                        <h3 class="text-5">Design &amp; Development</h3>
                                        <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk
                                            to, and we love a challenge lisque persius mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3">
                                        <div
                                            class="featured-box-icon text-primary border border-primary border-3 rounded-circle">
                                            <span class="text-8 fw-600">5</span></div>
                                        <h3 class="text-5">Final discussion</h3>
                                        <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk
                                            to, and we love a challenge lisque persius mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3">
                                        <div
                                            class="featured-box-icon text-primary border border-primary border-3 rounded-circle">
                                            <span class="text-8 fw-600">6</span></div>
                                        <h3 class="text-5">Delivery &amp; Launch</h3>
                                        <p class="text-muted mb-0">We're smart, we're hard working, we're easy to talk
                                            to, and we love a challenge lisque persius mea essent possim iriure.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Process end -->

            <!-- Clients
    ============================================= -->
            <section id="clients" class="section">
                <div class="container">

                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">Our Clients</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">See what my happy clients say about me. I'm proud to have my
                                clients.</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="row wow fadeInUp">
                        <div class="col-lg-9 mx-auto">
                            <div class="owl-carousel owl-theme" data-autoplay="true" data-loop="true"
                                data-nav="true" data-margin="30" data-slideby="1" data-stagepadding="5"
                                data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">
                                <div class="item text-center px-5"> <span class="text-9 text-muted opacity-3"><i
                                            class="fa fa-quote-left"></i></span>
                                    <p class="text-4">Easy to use, reasonably priced simply dummy text of the printing
                                        and typesetting industry. Quidam lisque persius interesset his et, in quot
                                        quidam possim iriure. simply dummy text of the printing and typesetting
                                        industry.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow-sm border"
                                        src="{{ asset('frontend/theme1/images/testimonial/client-sm-1.jpg') }}"
                                        alt=""> <strong class="d-block fw-500">Jay Shah</strong> <span
                                        class="text-muted text-2">Founder at Icomatic Pvt Ltd</span>
                                </div>
                                <div class="item text-center px-5"> <span class="text-9 text-muted opacity-3"><i
                                            class="fa fa-quote-left"></i></span>
                                    <p class="text-4">“I am happy Working with printing and typesetting industry.
                                        Quidam lisque persius interesset his et, in quot quidam persequeris essent
                                        possim iriure. simply dummy text of the printing and typesetting industry.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow-sm border"
                                        src="{{ asset('frontend/theme1/images/testimonial/client-sm-2.jpg') }}"
                                        alt=""> <strong class="d-block fw-500">Patrick Cary</strong> <span
                                        class="text-muted text-2">Freelancer from USA</span>
                                </div>
                                <div class="item text-center px-5"> <span class="text-9 text-muted opacity-3"><i
                                            class="fa fa-quote-left"></i></span>
                                    <p class="text-4">“Only trying it out since a few days. But up to now excellent.
                                        Seems to work flawlessly. priced simply dummy text of the printing and
                                        typesetting industry.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow-sm border"
                                        src="{{ asset('frontend/theme1/images/testimonial/client-sm-3.jpg') }}"
                                        alt=""> <strong class="d-block fw-500">Dennis Jacques</strong> <span
                                        class="text-muted text-2">iDeal Inc</span>
                                </div>
                                <div class="item text-center px-5"> <span class="text-9 text-muted opacity-3"><i
                                            class="fa fa-quote-left"></i></span>
                                    <p class="text-4">“I have used them twice now. Good rates, very efficient service
                                        and priced simply dummy text of the printing and typesetting industry quidam
                                        interesset his et. simply dummy text of the printing and typesetting industry.
                                        Excellent.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow-sm border"
                                        src="{{ asset('frontend/theme1/images/testimonial/client-sm-4.jpg') }}"
                                        alt=""> <strong class="d-block fw-500">Chris Tom</strong> <span
                                        class="text-muted text-2">Company CEO from UK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Clients end -->

            <!-- Clients Logo
    ============================================= -->
            <div class="bg-light py-5">
                <div class="container">
                    <div class="brands-grid separator-border">
                        <div class="row align-items-center">
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo2.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo3.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo1.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo2.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo3.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo1.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo3.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo2.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo3.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo1.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo2.png') }}"
                                        alt=""></a></div>
                            <div class="col-6 col-sm-3 col-lg-2 text-center"><a href=""><img
                                        class="img-fluid wow bounceIn"
                                        src="{{ asset('frontend/theme1/images/clients/client-logo3.png') }}"
                                        alt=""></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Clients Logo end -->

            <!-- Contact
    ============================================= -->
            <section id="contact" class="section">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">Contact Us</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">Send me a note, and let’s get started on your project today!
                            </p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <!-- Contact Form -->
                    <div class="row wow fadeInUp">
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <form id="contact-form" action="php/mail.php" method="post">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <input name="name" type="text" class="form-control border-2" required
                                            placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="email" type="email" class="form-control border-2" required
                                            placeholder="Your Email">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="form-message" class="form-control border-2" rows="5" required
                                            placeholder="Tell us more about your needs........"></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button id="submit-btn" class="btn btn-primary rounded-pill d-inline-flex"
                                            type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Contact Form End -->

                    <div class="brands-grid separator-border h-100 mt-5">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="featured-box text-center my-3 my-md-0 wow bounceIn">
                                    <div class="featured-box-icon text-light"> <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h3 class="text-uppercase">Visit Us</h3>
                                    <p class="text-muted mb-0">145 Murphy Canyon Rd.<br>
                                        Suite 100-18, San Diego CA 2028 </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="featured-box text-center my-3 my-md-0 wow bounceIn">
                                    <div class="featured-box-icon text-light"> <i class="fas fa-phone-alt"></i> </div>
                                    <h3 class="text-uppercase">Call Us Now</h3>
                                    <p class="text-muted mb-0">Phone: (+060) 9898980098<br>
                                        Fax: (+060) 8898880088</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="featured-box text-center my-3 my-md-0 wow bounceIn">
                                    <div class="featured-box-icon text-light"> <i class="fas fa-envelope"></i> </div>
                                    <h3 class="text-uppercase">Inquiries</h3>
                                    <p class="text-muted mb-0"><a
                                            href="mailto:info@kenilpatel.com">info@kenilpatel.com</a><br>
                                        Mon to Fri (10 am – 8 pm)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact end -->

        </div>
        <!-- Content end -->

        <!-- Footer
  ============================================= -->
        <footer id="footer" class="section bg-dark footer-text-light">
            <div class="container">
                <ul class="social-icons social-icons-lg social-icons-muted justify-content-center mb-3 wow bounceIn">
                    <li class="social-icons-twitter"><a data-bs-toggle="tooltip"
                            href="https://twitter.com/harnishdesign/" target="_blank" title="Twitter"><i
                                class="fab fa-twitter"></i></a></li>
                    <li class="social-icons-facebook"><a data-bs-toggle="tooltip"
                            href="http://www.facebook.com/harnishdesign/" target="_blank" title="Facebook"><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li class="social-icons-linkedin"><a data-bs-toggle="tooltip" href="http://www.linkedin.com/"
                            target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="social-icons-dribbble"><a data-bs-toggle="tooltip"
                            href="http://www.dribbble.com/harnishdesign/" target="_blank" title="Dribbble"><i
                                class="fab fa-dribbble"></i></a></li>
                    <li class="social-icons-github"><a data-bs-toggle="tooltip" href="http://www.github.com/"
                            target="_blank" title="GitHub"><i class="fab fa-github"></i></a></li>
                </ul>
                <p class="text-muted text-center">Copyright &copy; 2022 <a href="#">Kenil</a>. All Rights
                    Reserved.</p>
                <ul class="nav text-2 justify-content-center wow fadeIn">
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal" data-bs-target="#terms-policy"
                            href="#">Terms & Policy</a></li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal" data-bs-target="#disclaimer"
                            href="#">Disclaimer</a></li>
                </ul>
            </div>
        </footer>
        <!-- Footer end -->

    </div>
    <!-- Document Wrapper end -->

    <!-- Back to Top
============================================= -->
    <a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
            class="fa fa-chevron-up"></i></a>

    <!-- About more Modal
================================== -->
    <div id="about-us-details" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About Me More</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p>I combine our passion for design focused in people with advanced development technologies.
                        <strong class="fw-600">350+ clients</strong> have procured exceptional results and happiness
                        while working with me.</p>
                    <div class="featured-box style-1">
                        <div class="featured-box-icon text-primary"> <i class="far fa-paper-plane"></i></div>
                        <h4>Our Mission</h4>
                        <p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim
                            iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent
                            possim iriure. lisque persius interesset his et, in quot quidam mea essent possim iriure.
                        </p>
                    </div>
                    <div class="featured-box style-1">
                        <div class="featured-box-icon text-primary"> <i class="far fa-eye"></i></div>
                        <h4>Our Vision</h4>
                        <p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim
                            iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent
                            possim iriure. lisque persius interesset his et, in quot quidam mea essent possim iriure.
                        </p>
                    </div>
                    <div class="featured-box style-1">
                        <div class="featured-box-icon text-primary"> <i class="far fa-thumbs-up"></i></div>
                        <h4>Our Goal</h4>
                        <p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim
                            iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent
                            possim iriure. lisque persius interesset his et, in quot quidam mea essent possim iriure.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About more Modal End -->

    <!-- Terms & Policy Modal
================================== -->
    <div id="terms-policy" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms & Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged.</p>
                    <h3 class="mb-3 mt-4 mt-4">Terms of Use</h3>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. Simply dummy text of the printing and typesetting industry.</p>
                    <h5 class="text-4 mt-4">Part I – Information Kenil collects and controls</h5>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h5 class="text-4 mt-4">Part II – Information that Kenil processes on your behalf</h5>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h5 class="text-4 mt-4">Part III – General</h5>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                        book.</p>
                    <h3 class="mb-3 mt-4">Privacy Policy</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. </p>
                    <ol class="lh-lg">
                        <li>Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim
                            iriure.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et, in quot quidam
                            persequeris vim, ad mea essent possim iriure.</li>
                        <li>In quot quidam persequeris vim, ad mea essent possim iriure. Quidam lisque persius
                            interesset his et.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et.</li>
                        <li>Interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim, ad mea
                            essent possim iriure.</li>
                        <li>Persius interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim,
                            ad mea essent possim iriure.</li>
                        <li>Quot quidam persequeris vim Quidam lisque persius interesset his et, Lisque persius
                            interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Terms & Policy Modal End -->

    <!-- Disclaimer Modal
================================== -->
    <div id="disclaimer" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Copyright & Disclaimer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. </p>
                    <ul class="lh-lg">
                        <li>Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim
                            iriure.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et, in quot quidam
                            persequeris vim, ad mea essent possim iriure.</li>
                        <li>In quot quidam persequeris vim, ad mea essent possim iriure. Quidam lisque persius
                            interesset his et.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et.</li>
                        <li>Interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim, ad mea
                            essent possim iriure.</li>
                        <li>Persius interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim,
                            ad mea essent possim iriure.</li>
                        <li>Quot quidam persequeris vim Quidam lisque persius interesset his et, Lisque persius
                            interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Disclaimer Modal End -->


    <!-- JavaScript -->
    <script src="{{ asset('frontend/theme1/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/theme1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Easing -->
    <script src="{{ asset('frontend/theme1/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <!-- Appear -->
    <script src="{{ asset('frontend/theme1/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
    <!-- Images Loaded -->
    <script src="{{ asset('frontend/theme1/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Counter -->
    <script src="{{ asset('frontend/theme1/vendor/jquery.countTo/jquery.countTo.min.js') }}"></script>
    <!-- Parallax Bg -->
    <script src="{{ asset('frontend/theme1/vendor/parallaxie/parallaxie.min.js') }}"></script>
    <!-- Typed -->
    <script src="{{ asset('frontend/theme1/vendor/typed/typed.min.js') }}"></script>
    <!-- WOW animation -->
    <script src="{{ asset('frontend/theme1/vendor/wow/wow.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('frontend/theme1/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- isotope Portfolio Filter -->
    <script src="{{ asset('frontend/theme1/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('frontend/theme1/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- Particles Animation -->
    <script src="{{ asset('frontend/theme1/vendor/particles/particles.min.js') }}"></script>
    <script src="{{ asset('frontend/theme1/vendor/particles/particles.app.js') }}"></script>
    <!-- Custom Script -->
    <script src="{{ asset('frontend/theme1/js/theme.js') }}"></script>
</body>

</html>
