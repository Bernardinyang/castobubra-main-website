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
    <link rel="stylesheet" href="{{ asset('website_assets/css/modern-enhancements.css') }}">

    <style>
        /* Responsive slider images */
        @media (max-width: 767px) {
            @foreach($slider_images as $index => $slider_image)
                @if($slider_image->mobile_img)
                    .slider-slide-{{ $index }} {
                        background-image: url('{{ asset('website_assets/img/slider-image/' . $slider_image->mobile_img) }}') !important;
                    }
                @endif
            @endforeach
        }
        @media (min-width: 768px) {
            @foreach($slider_images as $index => $slider_image)
                .slider-slide-{{ $index }} {
                    background-image: url('{{ asset('website_assets/img/slider-image/' . $slider_image->img) }}') !important;
                }
            @endforeach
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

    <section class="slider__area p-relative">
        <div class="slider__wrapper swiper-container">
            <div class="swiper-wrapper">
                @foreach($slider_images as $slider_image)
                    <div class="single-slider swiper-slide slider__height slider__overlay d-flex align-items-center slider-slide-{{ $loop->index }}"
                         style="background-position: center center;background-size: cover;background-repeat: no-repeat;"
                         data-background="{{ asset('website_assets/img/slider-image/' . $slider_image->img) }}"
                         data-mobile-background="{{ $slider_image->mobile_img ? asset('website_assets/img/slider-image/' . $slider_image->mobile_img) : asset('website_assets/img/slider-image/' . $slider_image->img) }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-9 col-sm-10">
                                    <div class="slider__content">
                                        <span>{{ $slider_image->sup_text }}</span>
                                        <h3 class="slider__title">{{ $slider_image->title }}</h3>
                                        <p>{{ $slider_image->caption }}</p>
                                        @if(!empty($slider_image->link) && !empty($slider_image->link_text))
                                            <a href="{{ $slider_image->link }}"
                                               class="e-btn slider__btn">{{ $slider_image->link_text }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-container slider__nav d-none d-md-block">
            <div class="swiper-wrapper">
                @foreach($slider_images as $num => $slider_image)
                    <div class="slider__nav-item swiper-slide {{ $slide_colors[$num] }}-bg"
                         data-background="{{ asset('website_assets/img/slider-image/' . $slider_image->img) }}">
                        <div class="slider__nav-content">
                            {{--                            <span>{{ $slider_image->sup_text }}</span>--}}
                            <h4>{{ $slider_image->title }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($news_alert)
        <a href="{{ route('website.news_alert.detail', $news_alert->unique_id) }}">
            <div class="showcase our-vision-mission news_alert">
                <div class="container">
                    <div class="card vision text-center">
                        <h2 class="text-uppercase">{{ $news_alert->title }}</h2>
                        <hr>
                        {!! $news_alert->details !!}
                        <a class="news_alert_btn"
                           href="{{ route('website.news_alert.detail', $news_alert->unique_id) }}">Read More...</a>
                    </div>
                </div>
            </div>
        </a>
    @endif

    <div class="showcase our-vision-mission">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mission">
                        <h2>Our Mission</h2>
                        <p>Our mission is to provide knowledge and technical skills through training, research, and innovation in agriculture, science, technology, and allied sectors — fostering socio-economic development, entrepreneurship, and sustainability for Cross River State, Nigeria, and the global community.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card vision">
                        <h2>Our Vision</h2>
                        <p>To establish the College of Agriculture, Science and Technology, Obubra, as a globally recognized centre of excellence in research, innovation, and the training of highly skilled professionals, dedicated to advancing sustainable agricultural practices, promoting cutting-edge scientific research, and harnessing technological solutions that foster self-employment, drive entrepreneurship, increase income generation, and strengthen food security in response to state, national, and global challenges.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about__area pt-120 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about__thumb-wrapper">
                        {{--                        <div class="about__review">--}}
                        {{--                            <h5><span>{{ $welcome_section->sup_text }}</span></h5>--}}
                        {{--                        </div>--}}
                        <div class="about__thumb">
                            <img src="{{ asset('website_assets/img/welcome-section/' . $welcome_section->main_image) }}"
                                 alt="" width="100%" style="width: 100% !important;">
                        </div>
                        {{--                        <div class="about__banner mt--210">--}}
                        {{--                            <img src="{{ asset('website_assets/img/welcome-section/' . $welcome_section->sub_image) }}"--}}
                        {{--                                 alt="">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="about__student ml-270 mt--80">--}}
                        {{--                            <a>--}}
                        {{--                                <img src="{{ asset('website_assets/img/about/castobubra_favicon.jpg') }}" alt="">--}}
                        {{--                                <img src="{{ asset('website_assets/img/about/castobubra_favicon.jpg') }}" alt="">--}}
                        {{--                                <img src="{{ asset('website_assets/img/about/castobubra_favicon.jpg') }}" alt="">--}}
                        {{--                                <img src="{{ asset('website_assets/img/about/castobubra_favicon.jpg') }}" alt="">--}}
                        {{--                            </a>--}}
                        {{--                            <p>Join our <span>community</span></p>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about__content pl-20 pr-60 pt-35">
                        <div class="section__title-wrapper mb-25">
                            <h2 class="section__title">
                                {{ $welcome_section->title }}
                            </h2>
                            <div style="text-align: justify;">
                                {!! $welcome_section->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($posts && $posts->count() > 0)
    <section class="blog__area grey-bg pt-115 pb-130">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8">
                    <div class="section__title-wrapper mb-60">
                        <h2 class="section__title">
                            <span class="yellow-bg">News <img
                                    src="{{ asset('website_assets/img/shape/yellow-bg-2.png') }}" alt="">  </span> and
                            Updates
                        </h2>
                        <p>You don't have to struggle alone, you've got our assistance and help.</p>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4">
                    <div class="category__more mb-60 float-md-end fix">
                        <a href="{{ route('website.news') }}" class="link-btn">
                            View All News
                            <i class="far fa-arrow-right"></i>
                            <i class="far fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="blog__item white-bg mb-30 transition-3 fix">
                            <div class="blog__thumb w-img fix">
                                <a href="{{ route('website.news.detail', $post->slug) }}">
                                    <img src="{{ asset('website_assets/img/posts/' . $post->banner_img) }}"
                                         alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="blog__content">
                                <div class="blog__tag">
                                    <a href="#">{{ $post->getCategory->name }}</a>
                                </div>
                                <h3 class="blog__title"><a
                                        href="{{ route('website.news.detail', $post->slug) }}">{{ $post->title }}</a>
                                </h3>

                                <div class="blog__meta d-flex align-items-center justify-content-between">
                                    <div class="blog__author d-flex align-items-center">
                                        <div class="blog__author-thumb mr-10">
                                            <img src="{{ asset('website_assets/img/about/castobubra_favicon.jpg') }}"
                                                 alt="">
                                        </div>
                                        <div class="blog__author-info">
                                            <h5>CASTObubra</h5>
                                        </div>
                                    </div>
                                    <div class="blog__date d-flex align-items-center">
                                        <i class="fal fa-clock"></i>
                                        <span>{{ \App\Http\Services\DateHelperService::formatDateTwo($post->date_of_event) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="testimonial__area pt-145 pb-150"
             data-background="{{ asset('website_assets/img/testimonial-bg-3.jpg') }}">
        <div class="container">
            <div class="mb-3">
                <marquee scrolldelay="100" class="news_slide">
                    @foreach($student_new_bars as $student_new_bar)
                        <span>{{ $student_new_bar->news }}</span>
                    @endforeach
                </marquee>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10">
                    <div class="testimonial__slider-3">
                        <div class="testimonial__slider-wrapper swiper-container testimonial-text mb-35">
                            <div class="swiper-wrapper">
                                @foreach($student_community_slides as $student_community_slide)
                                    <div class="swiper-slide">
                                        <div class="testimonial__item-3">
                                            <h3 class="testimonial__title mb-4">{!! $student_community_slide->title ?: ($student_community->title ?? '<strong>CASTObubra</strong> Student <br> Community') !!}</h3>
                                            {!! $student_community_slide->content !!}

                                            <div class="testimonial__info-2">
                                                <h4>{{ $student_community_slide->names }},</h4>
                                                <span>{{ $student_community_slide->role }} @ {{ $student_community_slide->location }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-container testimonial-nav">
                            <div class="swiper-wrapper">
                                @foreach($student_community_slides as $index => $student_community_slide)
                                    <div class="swiper-slide" data-slide-index="{{ $index }}">
                                        <div class="testimonial__nav-thumb" style="cursor: pointer;">
                                            <img
                                                src="{{ asset('website_assets/img/student-slide-image/' . $student_community_slide->img) }}"
                                                alt="{{ $student_community_slide->names }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10">
                    <div class="testimonial__video ml-70 fix">
                        <div class="testimonial__thumb-3">
                            <img style="width: 100%;"
                                 src="{{ asset('website_assets/img/student-community/' . $student_community->img) }}"
                                 alt="{{ $student_community->title }}">
                        </div>
                        <div class="testimonial__video-content d-sm-flex">
                            @if($student_community->icon)
                            <div class="testimonial__video-icon mr-20 mb-20">
                              <span style="display: flex; align-items: center; justify-content: center; color: #ffffff;">
                                 <i class="{{ $student_community->icon }}" style="font-size: 25px;"></i>
                              </span>
                            </div>
                            @endif
                            <div class="testimonial__video-text">
                                <h4>{{ $student_community->title }}</h4>
                                @if($student_community->content)
                                <p>{{ $student_community->content }}</p>
                                @endif
                                @if($student_community->button_text && $student_community->button_link)
                                    <a href="{{ $student_community->button_link }}" class="btn btn-primary mt-3">{{ $student_community->button_text }}</a>
                                @elseif($student_community->button_text)
                                    <a href="{{ route('website.sug') }}" class="btn btn-primary mt-3">{{ $student_community->button_text }}</a>
                                @elseif($student_community->button_link)
                                    <a href="{{ $student_community->button_link }}" class="btn btn-primary mt-3">Visit SUG</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($galleries && $galleries->count() > 0)
        <x-carousel-slider
            :items="$galleries"
            title="Photo Gallery"
            subtitle="Explore our collection of memorable moments and events"
            image-path="website_assets/img/gallery/"
            slider-id="gallery-carousel"
            :slides-per-view="3"
            :space-between="20"
            :show-navigation="true"
            :show-pagination="true"
            :autoplay="false"
            :loop="true"
            section-class="pt-120 pb-120 grey-bg"
        />
    @endif

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

