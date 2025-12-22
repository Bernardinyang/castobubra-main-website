<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @yield('meta_tags')

    <link rel="stylesheet" href="{{ asset('website_assets/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/backToTop.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/fontAwesome5Pro.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/elegantFont.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('website_assets/css/modern-enhancements.css') }}"> -->

    @yield('styles')

</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

@include('partials.website.__preloader')

<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>

@include('partials.website.__top_nav', [
    'website_new_bars' => $website_new_bars
])
<header>
    <div id="header-sticky" class="header__area custom__header__bg header__padding-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="header__left d-flex">
                        <div class="logo">
                            <a href="{{ route('website.home') }}">
                                <img class="logo-white" src="{{ asset('assets/images/castobubra_logo_light.png') }}"
                                     alt="logo" width="200px">
                                <img class="logo-black" src="{{ asset('assets/images/castobubra_logo_dark.png') }}"
                                     alt="logo" width="200px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-10 col-xl-10 col-lg-9 col-md-9 col-sm-9 col-9">
                    <div class="header__right d-flex justify-content-end align-items-center">
                        <div class="main-menu main-menu-3">
                            <nav id="mobile-menu">
                                @include('partials.website.__mobile_nav')
                            </nav>
                        </div>
                        @if(\App\Http\Services\HelperService::getSettings()->is_registration_on)
                            <div class="header__btn header__btn-2 ml-30 d-none d-sm-block">
                                <a href="{{ route('website.application') }}" class="e-btn">Apply Now</a>
                            </div>
                        @else
                            <div class="header__btn header__btn-2 ml-30 d-none d-sm-block">
                                <a href="#" class="e-btn" style="cursor: not-allowed;">Admission Closed</a>
                            </div>
                        @endif
                        <div class="sidebar__menu d-xl-none">
                            <div class="sidebar-toggle-btn sidebar-toggle-btn-white ml-30" id="sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->

<!-- sidebar area start -->
<div class="sidebar__area">
    <div class="sidebar__wrapper">
        <div class="sidebar__close">
            <button class="sidebar__close-btn" id="sidebar__close-btn">
                <span><i class="fal fa-times"></i></span>
                <span>close</span>
            </button>
        </div>
        <div class="sidebar__content">
            <div class="logo mb-40">
                <a href="{{ route('website.home') }}">
                    <img src="{{ asset('assets/images/castobubra_logo.png') }}" alt="logo" width="50px">
                </a>
            </div>
            <div class="mobile-menu fix"></div>
        </div>
    </div>
</div>
<!-- sidebar area end -->
<div class="body-overlay"></div>
<!-- sidebar area end -->

<main>

    <!-- page title area start -->
    @yield('breadcrumbs')
    <!-- page title area end -->

    @include('partials.website.__popup')

    <section class="course__area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    @yield('content')
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="course__sidebar pl-70">
                        <div class="course__sidebar-widget green__bg mb-3">
                            <div class="course__sidebar-info">
                                <img src="{{ asset('website_assets/img/castobubra-sidebar-image.jpg') }}"
                                     alt="Sidebar Image" style="border-radius: 10px;"
                                     width="100%">
                            </div>
                        </div>

                        <div class="course__sidebar-widget grey-bg">
                            <div class="course__sidebar-info">
                                <h3 class="course__sidebar-title text-white p-2 text-center mb-2 rounded text-uppercase"
                                    style="background-color: #227353">
                                    Quick Links</h3>
                                <ul class="quick_links_ul">
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.about') }}">
                                        <a href="{{ route('website.about') }}">Our History</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.vision_and_mission') }}">
                                        <a href="{{ route('website.vision_and_mission') }}">Vision & Mission</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.vision_and_mission') }}">
                                        <a href="{{ route('website.vision_and_mission') }}#philosophy">Philosophy</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.our_identity') }}">
                                        <a href="{{ route('website.our_identity') }}">Our Identity</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.leadership') }}">
                                        <a href="{{ route('website.leadership') }}">Governing Council</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.academic_board') }}">
                                        <a href="{{ route('website.academic_board') }}">Management Staff</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.organizational_chart') }}">
                                        <a href="{{ route('website.organizational_chart') }}">Organizational Chart</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.college_song') }}">
                                        <a href="{{ route('website.college_song') }}">College Song</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.requirement') }}">
                                        <a href="{{ route('website.requirement') }}">Entry Requirement</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.application_guidelines') }}">
                                        <a href="{{ route('website.application_guidelines') }}">Application
                                            Guidelines</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.nd_hnd_nursing') }}">
                                        <a href="{{ route('website.nd_hnd_nursing') }}">ND/HND Nursing</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.fees') }}">
                                        <a href="{{ route('website.fees') }}">School Fees</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.departments') }}">
                                        <a href="{{ route('website.departments') }}">Departments</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.courses') }}">
                                        <a href="{{ route('website.courses') }}">Courses</a>
                                    </li>
                                    <li class="{{ \App\Http\Services\HelperService::isRoute('website.faq') }}">
                                        <a href="{{ route('website.faq') }}">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.website.__cta', ['cta' => $cta])

</main>

@include('partials.website.__footer')

<script src="{{ asset('website_assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script>
    // Ensure jQuery is available immediately after loading
    if (typeof jQuery !== 'undefined') {
        window.$ = window.jQuery = jQuery;
    } else {
        console.error('jQuery failed to load');
    }
</script>
<script src="{{ asset('website_assets/js/vendor/waypoints.min.js') }}"></script>
<script src="{{ asset('website_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website_assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('website_assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('website_assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('website_assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('website_assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('website_assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('website_assets/js/backToTop.js') }}"></script>
<script src="{{ asset('website_assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('website_assets/js/wow.min.js') }}"></script>
<script src="{{ asset('website_assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script>
    // Ensure jQuery is available before loading main.js
    if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
        console.error('jQuery is not available. Waiting...');
        var checkJQuery = setInterval(function() {
            if (typeof jQuery !== 'undefined') {
                window.$ = window.jQuery = jQuery;
                clearInterval(checkJQuery);
                // Now load main.js
                var script = document.createElement('script');
                script.src = '{{ asset('website_assets/js/main.js') }}';
                script.async = false;
                document.head.appendChild(script);
            }
        }, 50);
        
        // Timeout after 5 seconds
        setTimeout(function() {
            clearInterval(checkJQuery);
            if (typeof jQuery === 'undefined') {
                console.error('jQuery failed to load after 5 seconds');
            }
        }, 5000);
    } else {
        // jQuery is available, load main.js immediately
        var script = document.createElement('script');
        script.src = '{{ asset('website_assets/js/main.js') }}';
        script.async = false;
        document.head.appendChild(script);
    }
</script>

@yield('scripts')
</body>
</html>
