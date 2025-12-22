<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])

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

    <style>

        li {
            list-style: disc;
        }
    </style>

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
                                <a href="{{ route('website.application_instruction') }}" class="e-btn">Apply Now</a>
                            </div>
                        @else
                            <div class="header__btn header__btn-2 ml-30 d-none d-sm-block">
                                <a href="#" class="e-btn" style="cursor: not-allowed;">Application Closed</a>
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

@include('partials.website.__popup')

<!-- page title area start -->
    <section class="page__title-area page__title-height-2 page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/posts/' . $post->banner_img) }}"
             style="background-image: url({{ asset('website_assets/img/posts/' . $post->banner_img) }});background-size: cover;background-repeat: no-repeat;min-height: 450px;">
        <div class="page__title-shape">
            <img class="page-title-shape-1" src="{{ asset('website_assets/img/page-title/page-title-shape-1.png') }}"
                 alt="">
            <img class="page-title-shape-2" src="{{ asset('website_assets/img/page-title/page-title-shape-2.png') }}"
                 alt="">
            <img class="page-title-shape-3" src="{{ asset('website_assets/img/page-title/page-title-shape-3.png') }}"
                 alt="">
            <img class="page-title-shape-4" src="{{ asset('website_assets/img/page-title/page-title-shape-4.png') }}"
                 alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 col-xl-10 col-lg-10 ">
                    <div class="page__title-wrapper mt-110">
                        <span class="page__title-pre">{{ $post->getCategory->name }}</span>
                        <h3 class="page__title-2" style="font-size: 40px;">{{ $post->title }}</h3>
                        <div class="blog__meta d-flex align-items-center">
                            <div class="blog__author d-flex align-items-center mr-40">
                                <div class="blog__author-thumb mr-10">
                                    <img src="{{ asset('website_assets/img/about/castobubra_favicon.jpg') }}"
                                         alt="{{ $post->title }}"/>
                                </div>
                                <div class="blog__author-info blog__author-info-2">
                                    <h5>CASTObubra</h5>
                                </div>
                            </div>
                            <div class="blog__date blog__date-2 d-flex align-items-center">
                                <i class="fal fa-clock"></i>
                                <span>{{ \App\Http\Services\DateHelperService::formatDate($post->date_of_event) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- blog area start -->
    <section class="blog__area pt-120">
        <div class="container">
            <div class="blog__wrapper">
                <div class="blog__text mb-40" style="text-align: justify;">
                    {!! $post->post !!}
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->

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
</body>
</html>
