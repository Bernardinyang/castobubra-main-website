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
    <link rel="stylesheet" href="{{ asset('website_assets/css/modern-enhancements.css') }}">

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

    <section class="course__area pt-20">
        <div class="container">
            @yield('content')
        </div>
    </section>

    @include('partials.website.__cta', ['cta' => $cta])

</main>

@include('partials.website.__footer')

<script src="{{ asset('website_assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
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
<script src="{{ asset('website_assets/js/main.js') }}"></script>

@yield('scripts')
</body>
</html>
