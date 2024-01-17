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

    <style>
        :root {
            --header-color: {{ $userInfo->additional_infos->where('key', 'header_color')->first()->value }};
            --theme-color: {{ $userInfo->additional_infos->where('key', 'theme_color')->first()->value }}
        }
        :root{
        }
    </style>

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
    <link rel="stylesheet" type="text/css" href="{{ asset('my_files/experience.css') }}" />
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="0">

    @if ($userInfo->additional_infos->where('key', 'preloader_status')->first()->value)
    <div class="preloader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader End -->
    @endif
    <!-- Preloader -->

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
                    @php
                    $websiteLogo = $userInfo->additional_infos->where('key','logo')->first()->value;
                    @endphp
                    <a class="logo ms-3 ms-md-0" href="index.html" title="Kenil Patel"> <img
                            src="{{ $websiteLogo ? asset('images/' . $websiteLogo) : defaultImage('logo') }}" alt="Kenil Patel" /> </a>
                    <!-- Logo End -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#header-nav"><span></span><span></span><span></span></button>
                    <div id="header-nav" class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            @if ($userInfo->menus[0]->show_status)
                                <li class="nav-item"><a class="nav-link smooth-scroll active"
                                        href="#home">{{ $userInfo->menus[0]->menu_title }}</a></li>
                            @endif

                            @if ($userInfo->menus[1]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">{{ $userInfo->menus[1]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[2]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#skills">{{ $userInfo->menus[2]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[3]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#services">{{ $userInfo->menus[3]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[4]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#project">{{ $userInfo->menus[4]->menu_title }}</a> </li>
                            @endif
                            @if ($userInfo->menus[5]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#course">{{ $userInfo->menus[5]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[6]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#achievement">{{ $userInfo->menus[6]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[7]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">{{ $userInfo->menus[7]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[8]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#education">{{ $userInfo->menus[8]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[9]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#testimonial">{{ $userInfo->menus[9]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[10]->show_status)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#client">{{ $userInfo->menus[10]->menu_title }}</a></li>
                            @endif
                            @if ($userInfo->menus[11]->show_status)
                            <li class="align-items-center h-auto ms-lg-3"><a href="#contact"
                                    class="nav-link btn btn-outline-light shadow-none d-inline-block rounded-pill mt-3 mt-lg-0 smooth-scroll">{{ $userInfo->menus[11]->menu_title }}</a>
                            </li>
                            @endif
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

            <!-- Home Start -->
            @if ($userInfo->menus[0]->show_status)
                <section id="home">
                    <div class="hero-wrap">
                        @if ($userInfo->additional_infos->where('key', 'particle_status')->first()->value)
                        <div id="particles-js" class="hero-particles"></div>
                        @endif
                        <div class="hero-mask opacity-7 bg-dark"></div>
                        <div class="hero-bg owl-carousel owl-theme single-slideshow" data-animateout="fadeOut"
                            data-animatein="fadeIn" data-autoplay="true" data-loop="true" data-dots="false"
                            data-nav="false" data-items="1">
                            @if ($userInfo->home?->slider_1_status)
                                <div class="item"
                                    style="background-image:url('{{ $userInfo->home?->slider_1 ? asset('images/' . $userInfo->home?->slider_1) : defaultImage($userInfo->home?->default_slider_1) }}');">
                                </div>
                            @endif
                            @if ($userInfo->home?->slider_2_status)
                                <div class="item"
                                    style="background-image:url('{{ $userInfo->home?->slider_2 ? asset('images/' . $userInfo->home?->slider_2) : defaultImage($userInfo->home?->default_slider_2) }}');">
                                </div>
                            @endif

                            @if ($userInfo->home?->slider_3_status)
                                <div class="item"
                                    style="background-image:url('{{ $userInfo->home?->slider_3 ? asset('images/' . $userInfo->home?->slider_3) : defaultImage($userInfo->home?->default_slider_3) }}');">
                                </div>
                            @endif
                        </div>
                        <div class="hero-content section d-flex min-vh-100">
                            <div class="container my-auto">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <p class="text-5 text-uppercase text-white ls-4 mb-2 mb-md-3">
                                            {{ $userInfo->home?->text_1 }}
                                        </p>
                                        @if (is_array(json_decode($userInfo->home?->text_2)) && count(json_decode($userInfo->home?->text_2)) > 0)
                                            <div class="typed-strings">
                                                @foreach (json_decode($userInfo->home?->text_2) as $item)
                                                    <p>{{ $item }}</p>
                                                @endforeach
                                            </div>
                                            @if (json_decode($userInfo->home?->text_2)[0])
                                            <h2 class="text-17 fw-600 text-white mb-2 mb-md-3"><span
                                                    class="typed"></span>
                                            @endif
                                        @endif
                                        </h2>
                                        <p class="text-5 text-light">{{ $userInfo->home?->text_3 }}</p>

                                        @if ($userInfo->home?->button_status)
                                            @if ($userInfo->home?->file)
                                                <a href="{{ asset('files/' . $userInfo->home?->file) }}"
                                                    download=""
                                                    class="btn btn-primary rounded-pill mt-3">{{ $userInfo->home?->button_text }}</a>
                                            @else
                                                <a href="#"
                                                    class="btn btn-primary rounded-pill mt-3">{{ $userInfo->home?->button_text }}</a>
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
            @endif
            <!-- Home end -->


            <!-- About Start -->
            @if ($userInfo->menus[1]->show_status)

                <section id="about" class="section" style="background-color: {{ $userInfo->menus[1]->background_color }} !important">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 text-center mb-5 mb-lg-0 wow fadeInLeft"> <img
                                    class="img-fluid shadow-md rounded d-inline-block"
                                    src="{{ $userInfo->about?->image ? asset('images/' . $userInfo->about?->image) : defaultImage('about_image') }}"
                                    title="I'm Kenil Patel" alt=""> </div>
                            <div class="col-lg-7 text-center text-lg-start ps-lg-4 wow fadeInRight">
                                <h2 class="fw-600 mb-4">{{ $userInfo->about?->text_1 }}</h2>
                                <h3 class="text-6 mb-4"><span
                                        class="text-primary fw-600">{{ $userInfo->about?->text_2 }}</span>
                                </h3>
                                <p>{!! $userInfo->about?->text_3 !!}</p>
                                <div class="brands-grid separator-border my-sm-4">
                                    <div class="row">
                                        @if ($userInfo->about?->count_1)
                                            <div class="col-sm-4 py-4 py-sm-2">
                                                <div class="featured-box text-center">
                                                    <h4 class="text-8 text-muted mb-0"><span class="counter"
                                                            data-from="0"
                                                            data-to="{{ $userInfo->about?->count_1 }}">{{ $userInfo->about?->count_1 }}</span>+
                                                    </h4>
                                                    <p class="mb-0">{{ $userInfo->about?->count_text_1 }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($userInfo->about?->count_2)
                                            <div class="col-sm-4 py-4 py-sm-2">
                                                <div class="featured-box text-center">
                                                    <h4 class="text-8 text-muted mb-0"><span class="counter"
                                                            data-from="0"
                                                            data-to="{{ $userInfo->about?->count_2 }}">{{ $userInfo->about?->count_2 }}</span>+
                                                    </h4>
                                                    <p class="mb-0">{{ $userInfo->about?->count_text_2 }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($userInfo->about?->count_3)
                                            <div class="col-sm-4 py-4 py-sm-2">
                                                <div class="featured-box text-center">
                                                    <h4 class="text-8 text-muted mb-0"><span class="counter"
                                                            data-from="0"
                                                            data-to="{{ $userInfo->about?->count_3 }}">{{ $userInfo->about?->count_3 }}</span>+
                                                    </h4>
                                                    <p class="mb-0">{{ $userInfo->about?->count_text_3 }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if ($userInfo->about?->button_status)
                                    <a class="btn btn-secondary rounded-pill mt-3 smooth-scroll"
                                        href="#contact">{{ $userInfo->about?->button_text }}</a>
                                @endif

                                @if ($userInfo->about?->extra_text)
                                    <a href="#project"
                                        class="btn btn-link smooth-scroll mt-3 px-4">{{ $userInfo->about?->extra_text }}<span
                                            class="text-1 ms-2"><i class="fas fa-chevron-right"></i></span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <!-- About end -->


            <!-- Skills Start -->
            @if ($userInfo->menus[2]->show_status)
            <section id="skills" class="section bg-light" style="background-color: {{ $userInfo->menus[2]->background_color }} !important">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 text-center wow fadeInLeft">
                            <div class="hero-wrap section h-100 rounded shadow-lg p-5">
                                <div class="hero-mask opacity-6 bg-dark rounded"></div>
                                <div class="hero-bg hero-bg-scroll rounded"
                                    @php
                                        $skillImage = $userInfo->additional_infos->where('key','skill_image')->first()->value;
                                    @endphp
                                    style="background-image:url('{{ $skillImage ? asset('images/' . $skillImage) : defaultImage('skill_image') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 align-self-center mt-5 mt-md-0 wow fadeInRight">
                            <div class="px-lg-4">
                                <h3 class="text-6 mb-3">
                                    {{ $userInfo->additional_infos->where('key', 'skill_text')->first()->value }}</h3>
                                <p class="text-muted">{!! $userInfo->additional_infos->where('key', 'skill_description')->first()->value !!}</p>
                                @foreach ($userInfo->skills->sortByDesc('id') as $skill)
                                    <p class="fw-500 text-start mb-2">{{ $skill->title }} <span
                                            class="float-end">{{ $skill->percentage }}%</span>
                                    </p>
                                    <div class="progress progress-sm mb-4">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: {{ $skill->percentage }}%"
                                            aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Skills end -->


            <!-- Services Start -->
            @if ($userInfo->menus[3]->show_status)
            <section id="services" class="section " style="background-color: {{ $userInfo->menus[3]->background_color }} !important">
                <div class="container">

                    <!-- Heading -->
                    <div class="row mb-4 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">
                                {{ $userInfo->additional_infos->where('key', 'service_text')->first()->value }}</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">{!! $userInfo->additional_infos->where('key', 'service_description')->first()->value !!}</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="row g-4">
                        @foreach ($userInfo->services->sortByDesc('id') as $service)
                            @if ($service->status)
                                <div class="col-sm-6 col-lg-4 wow fadeInLeft">
                                    <div class="featured-box bg-white text-center rounded shadow-sm py-5 px-4">
                                        <div class="featured-box-icon text-primary mt-2"> <i
                                                class="{{ $service->icon }}"></i>
                                        </div>
                                        <h3 class="mb-3">{{ $service->title }}</h3>
                                        <p class="text-muted mb-0">{!! $service->description !!}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </section>
            @endif
            <!-- Services end -->


            <!-- Color Section Start -->
            @if ($userInfo->color_section->show_status)
                <section class="section text-center" style="background-color: var(--theme-color)">
                    <div class="container wow bounceIn">
                        <p class="lead text-white">{{ $userInfo->color_section->text_1 }}</p>
                        <h2 class="text-10 text-white mb-4">{{ $userInfo->color_section->text_2 }}</h2>
                        @if ($userInfo->color_section->show_button_status)
                            <a href="#contact"
                                class="btn btn-light rounded-pill shadow-none smooth-scroll mt-2 wow rubberBand"
                                data-wow-delay="1.2s">{{ $userInfo->color_section->button_text }}</a>
                        @endif
                    </div>
                </section>
            @endif
            <!-- Color Section end -->


            <!-- Project Start-->
             @if ($userInfo->menus[4]->show_status)
            <section id="project" class="section" style="background-color: {{ $userInfo->menus[4]->background_color }} !important">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">
                                {{ $userInfo->additional_infos->where('key', 'project_text')->first()->value }}</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">{!! $userInfo->additional_infos->where('key', 'project_description')->first()->value !!}</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="portfolio popup-ajax-gallery wow fadeInUp">
                        <div class="row portfolio-filter g-4">
                            @foreach ($userInfo->projects->sortByDesc('id') as $project)
                                @if ($project->status)
                                    <div class="col-sm-6 col-lg-4 artwork">
                                        <div class="portfolio-box rounded">
                                            <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                                    src="{{ $project->image ? asset('images/' . $project->image) : defaultImage('no_image') }}"
                                                    alt="">
                                                <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                        href="{{ route('projectDetails', $project->id) }}"></a>
                                                    <div class="portfolio-overlay-details">
                                                        <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                                        <h5 class="text-white fw-400">{{ $project->title }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Project end -->


            <!-- Course Start-->
             @if ($userInfo->menus[5]->show_status)
            <section id="course" class="section bg-light" style="background-color: {{ $userInfo->menus[5]->background_color }} !important">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">
                                {{ $userInfo->additional_infos->where('key', 'course_text')->first()->value }}</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">{!! $userInfo->additional_infos->where('key', 'course_description')->first()->value !!}</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <div class="row gy-5 wow fadeInUp">
                                @foreach ($userInfo->courses->sortByDesc('id') as $course)
                                    @if ($course->status)
                                        <div class="col-md-6">
                                            <div class="featured-box style-3">
                                                <div
                                                    class="featured-box-icon text-primary border border-primary border-3 rounded-circle">
                                                    <span class="text-8 fw-600">{{ $loop->index + 1 }}</span>
                                                </div>
                                                <h3 class="text-5">{{ $course->title }}</h3>
                                                <p class="text-muted mb-0">{!! $course->details !!}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Course end -->


            <!-- Achievement start -->
            @if ($userInfo->menus[6]->show_status)
            <section id="achievement" class="section " style="background-color: {{ $userInfo->menus[6]->background_color }} !important">
                <div class="container">

                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">
                                {{ $userInfo->additional_infos->where('key', 'achievement_text')->first()->value }}
                            </h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">{!! $userInfo->additional_infos->where('key', 'achievement_description')->first()->value !!} </p>
                        </div>
                    </div>
                    <!-- Heading -->

                    <div class="row wow fadeInUp">
                        <div class="col-lg-9 mx-auto">
                            <div class="owl-carousel owl-theme" data-autoplay="true" data-loop="true"
                                data-nav="true" data-margin="30" data-slideby="1" data-stagepadding="5"
                                data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">


                                @foreach ($userInfo->achievements->where('status', 1)->sortByDesc('id') as $achievement)
                                    <div class="item text-center px-5">

                                        <img class="img-fluid d-inline-block w-auto"
                                            src="{{ $achievement->image ? asset('images/' . $achievement->image) : defaultImage('no_image') }}"
                                            alt="">
                                        <br>
                                        <h5>{{ $achievement->title }}</h5>
                                        <p class="text-4">{!! $achievement->details !!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Achievement End -->


            <!-- Experience start -->
             @if ($userInfo->menus[7]->show_status)
            <section id="experience" class="section bg-light" style="background-color: {{ $userInfo->menus[7]->background_color }} !important">
                <div class="container">

                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">
                                {{ $userInfo->additional_infos->where('key', 'experience_text')->first()->value }}
                            </h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">{!! $userInfo->additional_infos->where('key', 'experience_description')->first()->value !!} </p>
                        </div>
                    </div>
                    <!-- Heading -->

                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <div class="row gy-5 wow fadeInUp">
                                <div class="main-timeline">

                                    @foreach ($userInfo->experiences->where('status', 1)->sortBy('year') as $experience)
                                        <div class="timeline">
                                            <div class="icon"></div>
                                            <div class="date-content">
                                                <div class="date-outer">
                                                    <span class="date">
                                                        <span class="month">{{ $experience->duration }}</span>
                                                        <span class="year">{{ $experience->year }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="timeline-content">
                                                <h5 class="title">{{ $experience->company }}</h5>
                                                <h6>{{ $experience->role }}</h6>
                                                <p class="description">
                                                    {!! $experience->details !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Experience End -->


             <!-- Education Start  -->
             @if ($userInfo->menus[8]->show_status)
            <section id="education" class="section" style="background-color: {{ $userInfo->menus[8]->background_color }} !important">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">
                                {{ $userInfo->additional_infos->where('key', 'education_text')->first()->value }}</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">{!! $userInfo->additional_infos->where('key', 'education_description')->first()->value !!}
                            </p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <!-- Contact Form -->
                    <div class="row justify-content-center wow fadeInUp">
                        <div class="col-md-3">
                            <!-- Tabs nav -->
                            <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">

                                @foreach ($userInfo->educations->where('status', 1)->sortByDesc('id') as $education)
                                    <a class="nav-link mb-3 p-3 shadow {{ $loop->index == 0 ? 'active' : '' }}"
                                        id="" data-bs-toggle="tab" href="#tab-{{ $education->id }}"
                                        role="tab" aria-controls="" aria-selected="true"><span
                                            class="font-weight-bold small text-uppercase">{{ $education->name }}</span></a>
                                @endforeach

                            </div>
                        </div>


                        <div class="col-md-8">
                            <!-- Tabs content -->

                            <div class="tab-content" id="v-pills-tabContent">
                                @foreach ($userInfo->educations->where('status', 1)->sortByDesc('id') as $education)
                                    <div class="tab-pane fade shadow rounded bg-white {{ $loop->index == 0 ? 'show active' : '' }}  p-5"
                                        id="tab-{{ $education->id }}" role="tabpanel" aria-labelledby="">
                                        <p>{!! $education->details !!}</p>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Education end  -->


            <!-- Testimonial start -->
             @if ($userInfo->menus[9]->show_status)
            <section id="testimonial" class="section" style="background-color: {{ $userInfo->menus[9]->background_color }} !important">
                <div class="container">

                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3"> {{ $userInfo->additional_infos->where('key', 'testimonial_text')->first()->value }}</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted"> {!! $userInfo->additional_infos->where('key', 'testimonial_description')->first()->value !!}</p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <div class="row wow fadeInUp">
                        <div class="col-lg-9 mx-auto">

                            <div class="owl-carousel owl-theme" data-autoplay="true" data-loop="true"
                                data-nav="true" data-margin="30" data-slideby="1" data-stagepadding="5"
                                data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">

                                @foreach ($userInfo->testimonials->where('status',1)->sortByDesc('id') as $testimonial)

                                <div class="item text-center px-5"> <span class="text-9 text-muted opacity-3"><i
                                            class="fa fa-quote-left"></i></span>
                                    <p class="text-4">{!! $testimonial->message !!}</p>
                                    @if ($testimonial->image)
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow-sm border"
                                        src="{{ asset('images/'.$testimonial->image) }}" />
                                    @endif
                                    <strong class="d-block fw-500">{{$testimonial->name}}</strong> <span
                                    class="text-muted text-2">{{$testimonial->designation}}</span>
                                </div>

                                @endforeach

                            </div>

                        </div>


                    </div>
                </div>
            </section>
            @endif
            <!-- Testimonial end -->


            <!-- Clients Logo start -->
            @if ($userInfo->menus[10]->show_status)
            <section id="client" class="section" style="background-color: {{ $userInfo->menus[10]->background_color }} !important">
            <div class="bg-light py-5">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="owl-carousel owl-theme" data-autoplay="true" data-nav="true" data-loop="true"
                            data-margin="30" data-slideby="2" data-stagepadding="5" data-items-xs="2"
                            data-items-sm="3" data-items-md="4" data-items-lg="6">

                            @foreach ($userInfo->clients->where('status',1)->sortByDesc('id') as $client)
                            <div class="item"><a href="#"><img class="img-fluid"
                                        src="{{ $client->image ? asset('images/'.$client->image) : defaultImage('client_image') }}"
                                        alt="" /></a></div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            </section>
            @endif
            <!-- Clients Logo end -->


            <!-- Contact Start-->
             @if ($userInfo->menus[11]->show_status)
            <section id="contact" class="section" style="background-color: {{ $userInfo->menus[11]->background_color }} !important">
                <div class="container">
                    <!-- Heading -->
                    <div class="row mb-5 wow fadeIn">
                        <div class="col-lg-9 col-xl-8 mx-auto text-center">
                            <h2 class="fw-600 mb-3">{{ $userInfo->additional_infos->where('key', 'contactinfo_text')->first()->value }}</h2>
                            <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                            <p class="text-4 text-muted">>{!! $userInfo->additional_infos->where('key', 'contactinfo_description')->first()->value !!}
                            </p>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <!-- Contact Form -->
                    <div class="row wow fadeInUp">
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <form id="contact-form" action="{{route('submit.feedback')}}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $userInfo->id }}"/>
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
                                        <textarea name="message" class="form-control border-2" rows="5" required
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
                            @foreach ($userInfo->contactinfos->where('status', 1)->sortByDesc('id') as $contactinfo)
                            <div class="col-md-6 col-lg-4">
                                <div class="featured-box text-center my-3 my-md-0 wow bounceIn">
                                    <div class="featured-box-icon text-light"> <i class="{{$contactinfo->icon}}"></i>
                                    </div>
                                    <h3 class="text-uppercase">{{$contactinfo->title}}</h3>
                                    <p class="text-muted mb-0"> {!!$contactinfo->details!!} </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Contact end -->

        </div>
        <!-- Content end -->

        <!-- Footer
  ============================================= -->
        <footer id="footer" class="section bg-dark footer-text-light" style="background: {{ $userInfo->additional_infos->where('key', 'footer_color')->first()->value }} !important">
            <div class="container">
                <ul class="social-icons social-icons-lg social-icons-muted justify-content-center mb-3 wow bounceIn">

                    @foreach ($userInfo->socials->where('status', 1)->sortByDesc('id') as $social)
                    <li class="social-icons-twitter"><a data-bs-toggle="tooltip"
                            href="{{$social->link}}" target="_blank" title=""><i
                                class="{{$social->icon}}"></i></a></li>
                    @endforeach
                </ul>
                <p class="text-muted text-center">{!! $userInfo->additional_infos->where('key', 'footer_text')->first()->value !!}</p>
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
                        while working with me.
                    </p>
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
