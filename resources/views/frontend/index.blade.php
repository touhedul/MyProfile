@extends('layouts.frontend')
@section('title')
    {{ config('app.name') }}
@endsection
@section('content')
    <!--slider-->
    <section id="home" class="p-0 single-slide">
        <h2 class="d-none">hidden</h2>
        <div id="rev_slider_19_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="wexim_slider_01"
            data-source="gallery" style="background:transparent;padding:0px;">
            <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
            <div id="rev_slider_19_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
                <ul> <!-- SLIDE  -->
                    <li data-index="rs-94" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('frontend/business_site/images/gradient-bg.png') }}" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-4" id="slide-94-layer-1"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                            data-responsive_offset="on"
                            data-frames='[{"delay":319.921875,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10"
                                data-origin="50% 50%"><img src="{{ asset('frontend/business_site/images/square.png') }}"
                                    alt="" data-ww="['695px','695px','596px','382px']"
                                    data-hh="['619px','619px','531px','341px']" data-no-retina> </div>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-1" id="slide-94-layer-2"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1050,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img src="{{ asset('frontend/business_site/images/paint.png') }}"
                                alt="" data-ww="['890px','890px','717px','487px']"
                                data-hh="['1107px','1107px','891px','604px']" data-no-retina> </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption   tp-resizeme" id="slide-94-layer-3"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-81','-81','-64','-48']"
                            data-fontsize="['25','25','18','14']" data-lineheight="['20','20','18','14']" data-width="none"
                            data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":1979.8828125,"speed":1500,"sfxcolor":"#ffffff","sfx_effect":"blockfromtop","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 7; white-space: nowrap; font-size: 25px; line-height: 20px; font-weight: 300; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">
                            Create your portfolio </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption   tp-resizeme" id="slide-94-layer-4"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['1','1','0','0']"
                            data-fontsize="['100','100','70','50']" data-lineheight="['100','100','70','50']"
                            data-width="['600','600','600','600']" data-height="none" data-whitespace="nowrap"
                            data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":2929.8828125,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 8; white-space: nowrap;font-weight: 600; color: #ffffff; letter-spacing: 0px;font-family:Poppins;">
                            <div class="text-center" id="js-rotating">Instant,Dynamic,Effortlessly</div>
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption   tp-resizeme" id="slide-94-layer-5"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['107','107','76','59']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":3809.9609375,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 9; white-space: nowrap;"><a class="btn btn-large btn-blue btn-rounded"
                                href="javascript:void(0)"> Signup Now </a></div>
                    </li>
                </ul>
            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>

        <!--scroll down-->
        <a href="#about" class="scroll-down scroll">Scroll Down <i class="fa fa-long-arrow-down"></i></a>

    </section>
    <!--slider end-->

    <!--About Start-->
    <section id="about" class="bg-light">
        <div class="container">
            <!--About-->
            <div class="row align-items-center wow fadeIn">
                <div class="col-md-6">
                    <div class="title">
                        <h6 class="third-color mb-3">Showcasing Professionals Finest Achievements</h6>
                        <h2>Empowering Professionals to Showcase Their Best Work</h2>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <p>With our innovative platform, we empower professionals to effortlessly create stunning portfolio
                        websites in minutes. Whether you're a designer, developer, marketer, or freelancer, our intuitive
                        interface and customizable features make it easy to showcase your skills and accomplishments.
                        <br><br>
                        Stand out from the crowd and elevate your online presence with our platform. Distinguish yourself
                        from the competition and take your online presence to new heights with our innovative platform
                    </p>
                </div>
            </div>

            <!--Features-->
            <div class="row mt-lg-5">
                <div class="col-md-4 wow fadeInLeft">
                    <div class="feature-box">
                        <span class="item-number gradient-text1">
                            01.
                        </span>
                        <h6 class="mb-4">Customizable Designs</h6>
                        <p>Tailor your portfolio with sleek, professional designs that reflect your unique style and <br>
                            brand.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp">
                    <div class="feature-box">
                        <span class="item-number gradient-text1">
                            02.
                        </span>
                        <h6 class="mb-4">Easy Content Management</h6>
                        <p>Effortlessly update and manage your portfolio content with our user-friendly interface, no coding
                            required.</p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInRight">
                    <div class="feature-box">
                        <span class="item-number gradient-text1">
                            03.
                        </span>
                        <h6 class="mb-4">Instant Website Generation</h6>
                        <p>Generate your personalized portfolio website instantly, saving you time and hassle in the
                            process.</p>
                    </div>
                </div>
            </div>

            <!--Slider Image-->
            <div class="row laptop text-center">
                <div class="col-md-12">
                    <div class="laptop-img wow fadeInUp">
                        <img src="{{ asset('frontend/business_site/images/laptop-img.png') }}" alt="laptop">
                        <div id="laptop-slide" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="{{ asset('frontend/business_site/images/my/laptop_slider_1.png') }}"
                                    alt="image">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/business_site/images/my/laptop_slider_2.png') }}"
                                    alt="image">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/business_site/images/my/laptop_slider_4.png') }}"
                                    alt="image">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/business_site/images/my/laptop_slider_3.png') }}"
                                    alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--About End-->

    <!--Team Start-->
    {{-- <section id="team" class="bg-light">
        <div class="container">
            <!--Heading-->
            <div class="row wow fadeIn">
                <div class="col-md-12 text-center">
                    <div class="title d-inline-block">
                        <h2 class="gradient-text1 mb-3"> Trusted by Professionals</h2>
                        <p>Join a growing community of professionals who have transformed their careers with our platform.
                            Discover how users from various fields are showcasing their skills, achievements, and
                            experiences with sleek, personalized portfolio websites. </p>
                    </div>
                </div>
            </div>

            <!--Team-->
            <div class="row">
                <div class="col-sm-12">
                    <div id="team-slider" class="owl-carousel owl-theme wow fadeInUp">
                        <!--Team Item-->
                        <div class="team-box item">
                            <!--Team Image-->
                            <div class="team-image">
                                <img src="{{ asset('frontend/business_site/images/team-img1.jpg') }}" alt="image">
                                <!--Team Overlay-->
                                <div class="overlay center-block">
                                    <!--Team Social-->
                                    <ul class="team-social">
                                        <li><a class="facebook-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a class="twitter-bg-hvr" href="javascript:void(0);"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a class="instagram-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Team Text-->
                            <div class="team-text">
                                <h5>Alex Walkin</h5>
                                <span class="alt-font">Owner / Co-founder</span>
                            </div>
                            <!--Team Progress-->
                            <ul class="team-progress text-start">
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Project Management <span class="float-end"><b class="count">90</b>%</span>
                                    </h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Web Consulting<span class="float-end"><b class="count">75</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--Team Item-->
                        <div class="team-box item">
                            <!--Team Image-->
                            <div class="team-image">
                                <img src="{{ asset('frontend/business_site/images/team-img2.jpg') }}" alt="image">
                                <!--Team Overlay-->
                                <div class="overlay center-block">
                                    <!--Team Social-->
                                    <ul class="team-social">
                                        <li><a class="facebook-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a class="twitter-bg-hvr" href="javascript:void(0);"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a class="instagram-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Team Text-->
                            <div class="team-text">
                                <h5>Teena Jhon</h5>
                                <span class="alt-font">Lead Designer</span>
                            </div>
                            <!--Team Progress-->
                            <ul class="team-progress text-start">
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Web Designing<span class="float-end"><b class="count">75</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Print Media<span class="float-end"><b class="count">90</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--Team Item-->
                        <div class="team-box item">
                            <!--Team Image-->
                            <div class="team-image">
                                <img src="{{ asset('frontend/business_site/images/team-img3.jpg') }}" alt="image">
                                <!--Team Overlay-->
                                <div class="overlay center-block">
                                    <!--Team Social-->
                                    <ul class="team-social">
                                        <li><a class="facebook-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a class="twitter-bg-hvr" href="javascript:void(0);"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a class="instagram-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Team Text-->
                            <div class="team-text">
                                <h5>David Warrior</h5>
                                <span class="alt-font">Marketing Head</span>
                            </div>
                            <!--Team Progress-->
                            <ul class="team-progress text-start">
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Marketing Online<span class="float-end"><b class="count">80</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>SEO Services<span class="float-end"><b class="count">70</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="70"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--Team Item-->
                        <div class="team-box item">
                            <!--Team Image-->
                            <div class="team-image">
                                <img src="{{ asset('frontend/business_site/images/team-img1.jpg') }}" alt="image">
                                <!--Team Overlay-->
                                <div class="overlay center-block">
                                    <!--Team Social-->
                                    <ul class="team-social">
                                        <li><a class="facebook-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a class="twitter-bg-hvr" href="javascript:void(0);"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a class="instagram-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Team Text-->
                            <div class="team-text">
                                <h5>Alex Walkin</h5>
                                <span class="alt-font">Owner / Co-founder</span>
                            </div>
                            <!--Team Progress-->
                            <ul class="team-progress text-start">
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Project Management <span class="float-end"><b class="count">90</b>%</span>
                                    </h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Web Consulting<span class="float-end"><b class="count">75</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--Team Item-->
                        <div class="team-box item">
                            <!--Team Image-->
                            <div class="team-image">
                                <img src="{{ asset('frontend/business_site/images/team-img2.jpg') }}" alt="image">
                                <!--Team Overlay-->
                                <div class="overlay center-block">
                                    <!--Team Social-->
                                    <ul class="team-social">
                                        <li><a class="facebook-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a class="twitter-bg-hvr" href="javascript:void(0);"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a class="instagram-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest-bg-hvr" href="javascript:void(0);"><i
                                                    class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Team Text-->
                            <div class="team-text">
                                <h5>Teena Jhon</h5>
                                <span class="alt-font">Lead Designer</span>
                            </div>
                            <!--Team Progress-->
                            <ul class="team-progress text-start">
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Web Designing<span class="float-end"><b class="count">75</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                                <!--Progress Item-->
                                <li class="progress-item">
                                    <h6>Print Media<span class="float-end"><b class="count">90</b>%</span></h6>
                                    <div class="progress">
                                        <span class="progress-bar" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Team Start-->

    <!--Portfolio Start-->
    <section id="portfolio" class="cube-portfolio1">
        <div class="container">
            <!--About-->
            <div class="row align-items-center">
                <div class="col-md-6 wow fadeInLeft">
                    <div class="title">
                        <h6 class="third-color mb-3">Comprehensive Tools for Your Success</h6>
                        <h2>Key Application Features</h2>
                    </div>
                </div>
                <div class="col-md-6 mb-4 wow fadeInRight">
                    <p>Our platform offers a robust set of features designed to help you create a professional and
                        personalized portfolio with ease. Customize your site with various sections like education,
                        projects, achievements, and experiences. Enjoy automatic content and image generation, ensuring a
                        polished look without the hassle.
                        <br><br>
                        Effortlessly update your information with our user-friendly interface, and take advantage of
                        versatile design options to truly make your portfolio stand out. Elevate your online presence and
                        impress potential employers or clients with a sleek, dynamic portfolio.
                    </p>
                </div>
            </div>

            <div class="row wow fadeInUp">
                <div class="col-md-12">

                    <!--Portfolio Filters-->
                    {{-- <div id="js-filters-mosaic-flat" class="cbp-l-filters-button">

                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All</div>
                        <span class="text-blue">/</span>
                        <div data-filter=".graphic" class="cbp-filter-item">Graphic Design</div>
                        <span class="text-blue"> / </span>
                        <div data-filter=".web-design" class="cbp-filter-item">Web design</div>
                        <span class="text-blue"> / </span>
                        <div data-filter=".graphic" class="cbp-filter-item">SEO</div>
                        <span class="text-blue"> / </span>
                        <div data-filter=".marketing" class="cbp-filter-item">Marketing</div>
                    </div> --}}

                    <!--Portfolio Items-->
                    <div id="js-grid-mosaic-flat" class="cbp cbp-l-grid-mosaic-flat">

                        <div class="cbp-item web-design graphic">
                            <a href="images/work-1.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-1.jpg') }}" alt="port-1">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>

                            </a>
                        </div>
                        <div class="cbp-item seo marketing">
                            <a href="images/work-2.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-2.jpg') }}" alt="port-2">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item seo marketing">
                            <a href="images/work-4.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-4.jpg') }}" alt="port-4">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item graphic seo marketing">
                            <a href="images/work-3.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-3.jpg') }}" alt="port-3">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item web-design graphic">
                            <a href="images/work-5.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-5.jpg') }}" alt="port-5">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item seo marketing graphic ">
                            <a href="images/work-6.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-6.jpg') }}" alt="port-6">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item web-design seo">
                            <a href="images/work-7.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-7.jpg') }}" alt="port-7">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item web-design graphic">
                            <a href="images/work-8.jpg" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('frontend/business_site/images/work-8.jpg') }}" alt="port-8">
                                </div>
                                <div class="cbp-caption-activeWrap"></div>
                                <div class="cbp-l-caption-alignCenter center-block">
                                    <div class="cbp-l-caption-body">
                                        <div class="plus"></div>
                                        <h5 class="text-white mb-1">Latest Work</h5>
                                        <p class="text-white">See Our Amazing Work</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <!--To Enable Load More Button Remove The Class="d-none"-->
                    <div id="js-loadMore-mosaic-flat" class="cbp-l-loadMore-bgbutton d-none">
                        <a href="loadmore.html" class="cbp-l-loadMore-link no-transition btn-rounded" rel="nofollow">
                            <span class="cbp-l-loadMore-defaultText no-transition ">Load More</span>
                            <span class="cbp-l-loadMore-loadingText ">Loading...</span>
                            <span class="cbp-l-loadMore-noMoreLoading">Finish</span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!--Portfolio end-->

    <!--Pricing Start-->
    {{-- <section id="price" class="bg-light">
        <div class="container">
            <!--Heading-->
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn">
                    <div class="title d-inline-block">
                        <h6 class="mb-3">Most flexible pricing</h6>
                        <h2 class="gradient-text1 mb-3">Easy Pricing</h2>
                        <p>Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor
                            nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. Nam
                            porttitor justo sed mi finibus, vel tristique risus faucibus. </p>
                    </div>
                </div>
            </div>

            <!--Team-->
            <div class="row">
                <div id="price-slider" class="owl-carousel owl-item wow fadeInUp">
                    <!--price item-->
                    <div class="price-item item text-start">
                        <h4 class="alt-font gradient-text1 d-inline-block font-weight-500 mb-4">Basic</h4>
                        <div class="price-tag d-flex align-items-center">
                            <div class="price alt-font text-dark-gray">
                                <h3 class="currency"><span class="sign">$</span>29</h3>
                                <span class="month">MONTH</span>
                            </div>
                            <p class="price-text no-margin">It has survived not only five centu but also the leap
                                electronic.</p>
                        </div>
                        <ul class="packages">
                            <li><i class="fa fa-check" aria-hidden="true"></i>Full access</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Unlimited Bandwidth</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Powerful Admin Panel</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i>Email Accounts</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i>8 Free Forks Every Months</li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-large btn-gradient btn-rounded w-100">Buy Now</a>
                    </div>
                    <!--price item-->
                    <div class="price-item text-start">
                        <h4 class="alt-font d-inline-block font-weight-500 mb-4">Popular</h4>
                        <div class="price-tag d-flex align-items-center">
                            <div class="price alt-font text-dark-gray">
                                <h3 class="currency"><span class="sign">$</span>49</h3>
                                <span class="month">MONTH</span>
                            </div>
                            <p class="price-text no-margin">It has survived not only five centu but also the leap
                                electronic.</p>
                        </div>
                        <ul class="packages">
                            <li><i class="fa fa-check" aria-hidden="true"></i>Full access</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Unlimited Bandwidth</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Powerful Admin Panel</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Email Accounts</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i>8 Free Forks Every Months</li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-large btn-black btn-rounded w-100">Buy Now</a>
                    </div>
                    <!--price item-->
                    <div class="price-item text-start">
                        <h4 class="alt-font gradient-text1 d-inline-block font-weight-500 mb-4">Advance</h4>
                        <div class="price-tag d-flex align-items-center">
                            <div class="price alt-font text-dark-gray">
                                <h3 class="currency"><span class="sign">$</span>99</h3>
                                <span class="month">MONTH</span>
                            </div>
                            <p class="price-text no-margin">It has survived not only five centu but also the leap
                                electronic.</p>
                        </div>
                        <ul class="packages">
                            <li><i class="fa fa-check" aria-hidden="true"></i>Full access</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Unlimited Bandwidth</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Powerful Admin Panel</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Email Accounts</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>8 Free Forks Every Months</li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-large btn-gradient btn-rounded w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Pricing End Start-->

    <!--Content Start-->
    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 wow fadeInLeft">
                    <div class="title">
                        <h6 class="third-color mb-3">Optimized for Every Device</h6>
                        <h2 class="mb-4">Mobile-Friendly<br>Portfolio Websites</h2>
                        <p>Our platform ensures your portfolio looks stunning on any device. With responsive design, your
                            site automatically adjusts to fit smartphones, tablets, and desktops, providing a seamless
                            experience everywhere.</p>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInRight">
                    <div class="content-image">
                        <img src="{{ asset('frontend/business_site/images/my/mobile.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->

    <!--Testimonial Start-->
    <section class="p-0">
        <div class="container-fluid">
            <div class="row">
                <!--testimonial-->
                <div class="col-md-6 bg-light">
                    <div id="testimonial_slider" class="owl-carousel">
                        <!--testimonial item-->
                        <div class="testimonial-item item">
                            <i class="fa fa-quote-right testimonial-icon gradient-text1"></i>
                            <p class="mb-4">This platform revolutionized how I present my work. Within minutes, I had a
                                sleek portfolio showcasing my skills. Highly recommended! </p>

                            <!--Image-->
                            <div class="testimonial-image">
                                <img src="{{ asset('frontend/business_site/images/testimonial-img1.jpg') }}"
                                    alt="image">
                            </div>
                            <h5 class="font-weight-500 third-color">Sarah C</h5>
                            <span class="destination">Project Manager, The Company Inc.</span>
                        </div>
                        <!--testimonial item-->
                        <div class="testimonial-item item">
                            <i class="fa fa-quote-right testimonial-icon gradient-text1"></i>
                            <p class="mb-4">I'm amazed by the simplicity and professionalism of this platform. It's truly
                                a game-changer for freelancers like me. </p>

                            <!--Image-->
                            <div class="testimonial-image">
                                <img src="{{ asset('frontend/business_site/images/testimonial-img2.jpg') }}"
                                    alt="image">
                            </div>
                            <h5 class="font-weight-500 third-color">Jhon Amstrong</h5>
                            <span class="destination">Company CEO, The Abacus Inc.</span>
                        </div>
                        <!--testimonial item-->
                        <div class="testimonial-item item">
                            <i class="fa fa-quote-right testimonial-icon gradient-text1"></i>
                            <p class="mb-4">I've received nothing but positive feedback since using this platform. It's
                                easy to use, and my portfolio looks fantastic on any device. </p>

                            <!--Image-->
                            <div class="testimonial-image">
                                <img src="{{ asset('frontend/business_site/images/testimonial-img3.jpg') }}"
                                    alt="image">
                            </div>
                            <h5 class="font-weight-500 third-color">Stephine Jhon</h5>
                            <span class="destination">General Manager, The Company Inc.</span>
                        </div>
                    </div>
                </div>
                <!--counters-->
                <div class="col-md-6 p-0">
                    <!--counter background-->
                    <div class="counters d-flex align-items-center text-start bg-img1">
                        <!--overlay-->
                        <div class="bg-overlay gradient-bg1 opacity-8"></div>
                        <div class="counter-row">
                            <!--counters item-->
                            <div class="counter-item">
                                <div class="count alt-font">690</div>
                                <h6 class="text-white">Active Users</h6>
                            </div>
                            <!--counters item-->
                            <div class="counter-item">
                                <div class="count alt-font">780</div>
                                <h6 class="text-white">Skills Highlighted</h6>
                            </div>
                            <!--counters item-->
                            <div class="counter-item">
                                <div class="count alt-font">456</div>
                                <h6 class="text-white">Projects Showcased </h6>
                            </div>
                            <!--counters item-->
                            <div class="counter-item">
                                <div class="count alt-font">599</div>
                                <h6 class="text-white">Positive Reviews </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial End-->

    <!--App Section-->
    <section id="app">
        <div class="container">
            <!--Heading-->
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn">
                    <div class="title d-inline-block">
                        <h6 class="mb-3">Sleek Mobile Experience</h6>
                        <h2 class="gradient-text1 mb-3">Optimized for Portfolios</h2>
                        <p>Experience seamless browsing on-the-go with our mobile-responsive portfolio websites. Showcase
                            your skills effortlessly from any device, anywhere. </p>
                    </div>
                </div>
            </div>

            <!--App deatil-->
            <div class="row align-items-center text-center">

                <div class="col-md-4 wow fadeInLeft">
                    <!--App deatil item-->
                    <div class="app-feature">
                        <i class="fa fa-diamond gradient-text1" aria-hidden="true"></i>
                        <h4 class="mb-3">Intuitive Navigation</h4>
                        <p>Easily navigate your portfolio with user-friendly mobile controls</p>
                    </div>
                    <!--App deatil item-->
                    <div class="app-feature">
                        <i class="fa fa-edit gradient-text1" aria-hidden="true"></i>
                        <h4 class="mb-3">Dynamic Content Display</h4>
                        <p>Ensure your content looks great and is easily accessible on smartphones.</p>
                    </div>
                </div>

                <!--app slider-->
                <div class="col-md-4 wow fadeInUp">
                    <!--app Image-->
                    <div class="app-image">
                        <img src="{{ asset('frontend/business_site/images/iphone-img.png') }}" alt="image">
                        <div id="app-slider" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="{{ asset('frontend/business_site/images/iphone-slide1.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/business_site/images/iphone-slide2.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/business_site/images/iphone-slide3.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInRight">
                    <!--App deatil item-->
                    <div class="app-feature">
                        <i class="fa fa-code gradient-text1" aria-hidden="true"></i>
                        <h4 class="mb-3">Instant Updates</h4>
                        <p>Update your portfolio instantly, keeping your mobile visitors engaged with fresh content</p>
                    </div>
                    <!--App deatil item-->
                    <div class="app-feature">
                        <i class="fa fa-folder-open-o gradient-text1" aria-hidden="true"></i>
                        <h4 class="mb-3">Responsive Design</h4>
                        <p>Enjoy a responsive design that adapts to various screen sizes for a consistent user experience.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--App Section End-->

    <!--Blog Start-->
    <section id="blog" class="bg-light">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-md-6 order-md-2 wow fadeInRight">
                    <!--Blog Content-->
                    <div class="blog-text">
                        <h6 class="third-color mb-3">January 14, 2019</h6>
                        <h2>Living Your Dreams</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodt temp to the
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis a nostr a
                            exercitation ullamco laboris nisi ut aliquip.</p>
                        <a href="javascript:void(0);" class="btn btn-large btn-gradient btn-rounded mt-4">Learn
                            More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <!--Blog Image-->
                    <div class="blog-image wow hover-effect fadeInLeft">
                        <img src="{{ asset('frontend/business_site/images/blog-image1.jpg') }}" alt="image">
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 wow fadeInLeft">
                    <!--Blog Content-->
                    <div class="blog-text">
                        <h6 class="third-color mb-3">August 20, 2019</h6>
                        <h2>Design Your Website</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodt temp to the
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis a nostr a
                            exercitation ullamco laboris nisi ut aliquip.</p>
                        <a href="blog-left.html" class="btn btn-large btn-gradient btn-rounded mt-4">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <!--Blog Image-->
                    <div class="blog-image text-end hover-effect wow fadeInRight">
                        <img src="{{ asset('frontend/business_site/images/blog-image2.jpg') }}" alt="image">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--Blog End-->

    <!--Address Start-->
    <section id="contact" class="p-0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 p-0">
                    <div class="address-box title mb-0 bg-img4">
                        <!--overlay-->
                        <div class="bg-overlay gradient-bg1 opacity-8"></div>
                        <div class="address-text text-center text-white position-relative wow fadeInUp">
                            <h6 class="mb-3">Lorem ipsum dolor sit amet consectetur</h6>
                            <!--title-->
                            <h2 class="mb-4">Wexim Agency, Newyork</h2>
                            <!--Address-->
                            <p class="mb-3 text-white">123 Stree New York City , United States Of America. </p>
                            <!--Phone-->
                            <p class="mb-3 text-white">Office Telephone : 001 01085379709<br>
                                Mobile : 001 63165370895 </p>
                            <!--Email-->
                            <p class="mb-3 text-white">mail : admin@website.com<br>
                                Inquiries : email@website.com</p>
                            <!--Timing-->
                            <p class="mb-3 text-white">Mon-Fri: 9am to 6pm</p>
                            <!--Social Icon-->
                            <div class="address-social">
                                <ul class="list-unstyled">
                                    <li><a class="facebook-text-hvr" href="javascript:void(0);"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a class="twitter-text-hvr" href="javascript:void(0);"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a class="google-text-hvr" href="javascript:void(0);"><i
                                                class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a class="linkedin-text-hvr" href="javascript:void(0);"><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>
                                    <li><a class="instagram-text-hvr" href="javascript:void(0);"><i
                                                class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div id="map" class="half-map bg-img-map">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Address End-->

    <!--Contact Start-->
    <section>
        <div class="container">
            <!--Heading-->
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title d-inline-block">
                        <h6 class="mb-3 third-color">Lorem ipsum dolor sit amet</h6>
                        <h2>Let's Get In Touch</h2>
                    </div>
                </div>
            </div>

            <!--contact us-->
            <form class="contact-form">
                <div class="row">

                    <div class="col-sm-12" id="result"></div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="First Name:" required=""
                                id="first_name" name="first_name">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Last Name:" required=""
                                id="last_name" name="last_name">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email:" required=""
                                id="email" name="email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="tel" placeholder="Phone:" id="phone"
                                name="phone">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-large btn-gradient btn-rounded mt-4" id="submit_btn"><i
                                class="fa fa-spinner fa-spin mr-2 d-none" aria-hidden="true"></i> <span>Contact
                                Now</span></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--Contact End-->
@endsection
