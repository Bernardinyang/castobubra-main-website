<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
    <meta name="msapplication-TileColor" content="#f95b5b">

    <link rel="stylesheet" type="text/css" href="{{ asset('coming_soon_assets/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coming_soon_assets/css/loaders/loader.css') }}">

    @yield('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('coming_soon_assets/css/main.css') }}">

    <meta name="theme-color" content="#f95b5b">
    <meta name="msapplication-navbutton-color" content="#f95b5b">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f95b5b">

</head>

<body class="overflow-hidden">

<!-- Old Browsers Support Start-->
<!--[if lt IE 9]>
<script src="{{ asset('coming_soon_assets/js/libs/es5-shim.min.js') }}"></script>
<script src="{{ asset('coming_soon_assets/js/libs/html5shiv.min.js') }}"></script>
<script src="{{ asset('coming_soon_assets/js/libs/html5shiv-printshiv.min.js') }}"></script>
<script src="{{ asset('coming_soon_assets/js/libs/respond.min.js') }}"></script>
<![endif]-->
<!-- Old Browsers Support End-->

@include('partials.coming_soon.__preloader')
@include('partials.coming_soon.__navigation')

<!-- Main Screen Section Start -->
<section id="main" class="main-section">

    <!-- Logo Block Start -->
    <div class="main-section__logo">
        <a href="{{ route('website.home') }}">
            <img src="{{ asset('assets/images/castobubra_sug.jpg') }}" alt="CASTObubra" style="width: 100px;">
        </a>
    </div>
    <!-- Logo Block End -->

    <!-- Main Section Content Start -->
    <div class="main-section__content">
        <div class="container-fluid p-0 fullheight">
            <div class="row no-gutters fullheight">

                <!-- Main Section Intro Start -->
                <div class="col-12 col-xl-6 main-section__intro">
                    <div class="intro-content">

                        <!-- Headline Start -->
                        <div id="headline" class="headline">
                            <h1 class="small"><strong style="font-weight: bold;">STUDENT UNION GOVERNMENT</strong>
                                <br><span
                                    style="font-style: italic;font-size: 25px;">(Aluta Continua, Victoria Ascerta)</span>
                            </h1>
                            <p class="headline__text"><strong style="font-weight: bold;">CASTObubra SUG</strong> is the
                                student Government arm of the college responsible for mediating between student affairs
                                and the college management with focus on issues affecting the students and their welfare
                                in the college.</p>
                            <div class="headline__btnholder">
                                <a href="#" id="notify-trigger" class="btn btn-dark pulse-btn">Notify me</a>
                            </div>
                        </div>
                        <!-- Headline End -->

                        <!-- Socials Start -->
                        <div class="socials socials-text socials-bottom socials-dark">
                            <ul>
                                <li>
                                    <a href="{{ \App\Http\Services\HelperService::getSugSettings()->facebook_url ?: '#' }}"
                                       target="_blank">Facebook</a>
                                </li>
                                <li>
                                    <a href="{{ \App\Http\Services\HelperService::getSugSettings()->twitter_url ?: '#' }}"
                                       target="_blank">Twitter</a>
                                </li>
                                <li>
                                    <a href="{{ \App\Http\Services\HelperService::getSugSettings()->youtube_url ?: '#' }}"
                                       target="_blank">Youtube</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Socials End -->
                    </div>
                </div>
                <!-- Main Section Intro End -->

                <!-- Main Section Media Start -->
                <div class="col-12 col-xl-6 main-section__media">
                    <div class="media-content">
                        {{--                        <div class="color-layer color-layer-black">--}}
                        {{--                            <div class="countdown countdown-days">--}}
                        {{--                                <div id="countdown"></div>--}}
                        {{--                                <span class="help-text">days left</span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="media-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($slider_images as $num => $slider_image)
                                        <div class="swiper-slide swiper-slide-{{ $num + 1 }}"
                                             style="background-image: url({{ asset('coming_soon_assets/img/coming-soon-slider-image/' . $slider_image->img) }});"></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="slider-controls">
                                <div class="swiper-button-next light">
                                    <span></span>
                                </div>
                                <div class="swiper-button-prev light">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Section Aside Start -->
                <div class="main-section__aside"></div>
                <!-- Main Section Aside End -->

            </div>
        </div>
    </div>
    <!-- Main Section Content End -->

</section>
<!-- Main Screen Section End -->

<!-- About Us Section Start -->
<section id="about" class="content-section">
    <div class="container-fluid p-0 fullheight">
        <div class="row no-gutters fullheight">

            <!-- Section Info Start -->
            <div class="col-12 col-xl-6 content-section__info">
                <div class="scroll">

                    <!-- Section Info Blocks Container Start -->
                    <div class="blocks-container">

                        <!-- Section Controls Start -->
                        <div class="section-controls">
                            <a href="#0" id="about-close" class="section-close"></a>
                        </div>
                        <!-- Section Controls End -->

                        <!-- Section Title Start -->
                        <div class="content-block">
                            <div class="section-title">
                                <h2><span>About</span> Us</h2>
                                <p class="section-title__text">
                                    <strong style="font-weight: bold;">CASTObubra SUG</strong> is the student Government
                                    arm of the college responsible for midaiting between student affairs and the college
                                    management with focus on issues affecting the students and their welfare in the
                                    college. The current SUG admistration is headed by Com Shadrack ...
                                </p>
                                <h4 class="mt-5" style="text-align: left;">STUDENT UNIONISM</h4>
                                <p class="section-title__text mt-1">
                                    Student unionism is operational in state college of nursing and midwifery scieneces,
                                    Itigidi. The student union Government shall be constituted upon election of eligible
                                    candidates into various offices. The election shall be organized and conducted in
                                    collaboration with the Dean of Students Affairs. Elected executives shall hold
                                    office for only one academic session.
                                </p>
                                <div class="headline__btnholder">
                                    <button type="button" data-toggle="modal"
                                            data-target="#aboutModal" class="btn btn-dark">Read More
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Section Title End -->

                        <!-- Section Content Block Features Start -->
                        <div class="content-block features">
                            <!-- Features single item -->
                            <div class="row no-gutters feature-item">
                                <div class="col-12 col-sm-6 feature-image feature-image-1">
                                    <div class="feature-description__container">
                                        <h3>Our Vision</h3>
                                        <p class="small-text">To promote and maintain the dignity of Nursing profession
                                            through quality education and practice.</p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 feature-description">
                                    <div class="feature-description__container">
                                        <h3>Our Mission</h3>
                                        <p class="small-text">Preparation of men and women of proven integrity who can
                                            compete favorably with their peers locally, nationally and internationally
                                            for continuing professional development.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Section Content Block Features End -->

                        <div class="list_section" style="background: #1b24342b;">
                            <h3>CASTObubra College Anthem</h3>
                            <p>
                                College of Nursing, Itigidi<br>
                                My Alma-mater<br>
                                I promise to be loyal and to be hard-working<br>
                                I need your wisdom, love and care, to see me<br>
                                Through the test of time<br>
                                As each day passes by
                            </p>
                            <p>
                                God will renew my strength<br>
                                To lift up the banner of my dearest School<br>
                                Our Motto is to serve humanity, with love and kindness all the tome
                            </p>
                        </div>

                        <div class="list_section">
                            <h3>Nurses Anthem</h3>
                            <p>
                                We are called to serve humanity<br>
                                Endowed with the act and SENSE of CRING<br>
                                We are built on INTERGRITY and DECIPLINE<br>
                                That transient through every generation<br>
                                IMMACULATE and AMICABLE <br>
                                We are the source of hope to ailing ones<br>
                                And the foundation for building a healthy world<br>
                                Together we shall stand.
                            </p>

                            <h4 style="margin-top: 20px;text-align: left;">Chorus</h4>
                            <p>
                                Nurses are great<br>
                                Nurses are ring<br>
                                An epitome of humility and service<br>
                                We are specially ordained for this vocation<br>
                                YES AM PROUD TO BE A NURSE!!!
                            </p>

                            <p style="margin-top: 20px;">
                                From near and far we have gathered with one goal<br>
                                To uphold the good name of our profession.<br>
                                N-For neatness and splendour<br>
                                U-For understanding<br>
                                R- For responsiveness<br>
                                S-Selfless service<br>
                                I- Innovation and Initiative<br>
                                N-For NOBILITY<br>
                                G-Gentleness and love
                            </p>

                            <h4 style="margin-top: 20px;text-align: left;">Chorus</h4>
                            <p>
                                Nurses are great<br>
                                Nurses are ring<br>
                                An epitome of humility and service<br>
                                We are specially ordained for this vocation<br>
                                YES AM PROUD TO BE A NURSE!!!
                            </p>
                        </div>

                        <!-- Section Content Block Blockquote Start -->
                        <div class="content-block blockquote">

                            <!-- Blockquote Container Start -->
                            <div class="blockquote-content">
                                <h2>Wise <span>Quotes</span></h2>
                                <hr style="margin-bottom: 10px;">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <!-- Blockquote Start -->
                                        <blockquote>
                                            <p>{{ $quote->quote }}</p>
                                            <cite>
                                                <span>{{ $quote->author }}</span>
                                                @if($quote->source)
                                                    <span>{{ $quote->source }}</span>
                                                @endif
                                            </cite>
                                        </blockquote>
                                        <!-- Blockquote End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Blockquote Container End -->
                        </div>
                        <!-- Section Content Block Blockquote End -->
                    </div>
                    <!-- Section Info Blocks Container End -->
                </div>
            </div>
            <!-- Section Info End -->

            <!-- Section Media Start-->
            <div class="col-12 col-xl-6 content-section__media">
                <div class="static fullheight">

                    <!-- Section Media Container Start -->
                    <div class="media-container fullheight">

                        <!-- About Image Start -->
                        <div class="image about-image"></div>
                        <!-- About Image End -->

                    </div>
                    <!-- Section Media Container End -->

                </div>
            </div>
            <!-- Section Media End-->

        </div>
    </div>
</section>
<!-- About Us Section End-->

<!-- Portfolio & Team Section Start -->
<section id="portfolio" class="content-section">
    <div class="container-fluid p-0 fullheight">
        <div class="row no-gutters fullheight">

            <!-- Section Info Start -->
            <div class="col-12 col-xl-10 content-section__info">
                <div class="scroll">

                    <!-- Section Info Blocks Container Start -->
                    <div class="blocks-container">

                        <!-- Section Controls Start -->
                        <div class="section-controls">
                            <a href="#0" id="portfolio-close" class="section-close"></a>
                        </div>
                        <!-- Section Controls End -->

                        <!-- Section Title Start -->
                        <div class="content-block">
                            <div class="section-title">
                                <h2 style="text-align: center;">Exco</h2>
                            </div>
                        </div>
                        <!-- Section Title End -->

                        <!-- Section Content Block Team Start -->
                        <div class="content-block team">
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach($bots as $bot)
                                        @if($bot->order == 1)
                                            <div class="col-md-3 col-lg-3"></div>
                                            <div class="col-12 col-sm-6 team__item">
                                                <div class="team__image">
                                                    <img
                                                        src="{{ asset('coming_soon_assets/img/sug-excos/' . $bot->image) }}"
                                                        alt="{{ $bot->names }}">
                                                    <!-- Team member photo here -->
                                                </div>
                                                <!-- Team title -->
                                                <h3>
                                                    {{ $bot->names }}
                                                    <small>{{ $bot->position }}</small>
                                                </h3>
                                            </div>
                                            <div class="col-md-3 col-lg-3"></div>
                                        @else
                                            <div class="col-12 col-sm-6 team__item">
                                                <div class="team__image">
                                                    <img
                                                        src="{{ asset('coming_soon_assets/img/sug-excos/' . $bot->image) }}"
                                                        alt="{{ $bot->names }}">
                                                    <!-- Team member photo here -->
                                                </div>
                                                <!-- Team title -->
                                                <h3>
                                                    {{ $bot->names }}
                                                    <small>{{ $bot->position }}</small>
                                                </h3>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Section Content Block Team End -->
                    </div>
                    <!-- Section Info Blocks Container End -->
                </div>
            </div>
            <!-- Section Info End -->

            <!-- Section Media Start -->
            <div class="col-2 col-xl-2 content-section__media">
            </div>
            <!-- Section Media End-->

        </div>
    </div>
</section>
<!-- Portfolio & Team Section End -->

<!-- Contact Section Start -->
<section id="contact" class="content-section">
    <div class="container-fluid p-0 fullheight">
        <div class="row no-gutters fullheight">

            <!-- Section Info Start -->
            <div class="col-12 col-xl-6 content-section__info">
                <div class="scroll">

                    <!-- Section Info Blocks Container Start -->
                    <div class="blocks-container">

                        <!-- Section Controls Start -->
                        <div class="section-controls">
                            <a href="#0" id="contact-close" class="section-close"></a>
                        </div>
                        <!-- Section Controls End -->

                        <!-- Section Title Start -->
                        <div class="content-block">
                            <div class="section-title">
                                <h2>Thank you for visiting us <span>today!</span></h2>
                                <p class="section-title__text">You can reach us via our contact channels, or send us a
                                    message by clicking to <span>Lets talk</span> button below. We are always glad to
                                    see you in our office from <span>8:00am</span> to <span>5:00pm</span>.</p>
                            </div>
                        </div>
                        <!-- Section Title End -->

                        <!-- Section Content Block Contact Data  Start -->
                        <div class="content-block contact-data">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- Contact data single item -->
                                    <div class="col-12 col-sm-6 contact-data__item">
                                        <h5>Location</h5>
                                        <p class="small-text">
                                            {{ \App\Http\Services\HelperService::getSettings()->app_location }}
                                        </p>
                                    </div>
                                    <!-- Contact data single item -->
                                    <div class="col-12 col-sm-6 contact-data__item">
                                        <h5>Follow us</h5>
                                        <ul>
                                            <li>
                                                <a href="{{ \App\Http\Services\HelperService::getSugSettings()->facebook_url ?: '#' }}"
                                                   target="_blank">Facebook</a>
                                            </li>
                                            <li>
                                                <a href="{{ \App\Http\Services\HelperService::getSugSettings()->instagram_url ?: '#' }}"
                                                   target="_blank">Instagram</a>
                                            </li>
                                            <li>
                                                <a href="{{ \App\Http\Services\HelperService::getSugSettings()->twitter_url ?: '#' }}"
                                                   target="_blank">Twitter</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Contact data single item -->
                                    <div class="col-12 col-sm-6 contact-data__item">
                                        <h5>Phone</h5>
                                        <p class="small-text">
                                            <a href="tel:{{ \App\Http\Services\HelperService::getSugSettings()->mobile_no_1 }}">{{ \App\Http\Services\HelperService::getSugSettings()->mobile_no_1 }}</a>
                                        </p>
                                    </div>
                                    <!-- Contact data single item -->
                                    <div class="col-12 col-sm-6 contact-data__item">
                                        <h5>Email</h5>
                                        <p class="small-text">
                                            <a href="mailto:{{ \App\Http\Services\HelperService::getSugSettings()->email }}">{{ \App\Http\Services\HelperService::getSugSettings()->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Section Content Block - Contact Data - End -->

                        <!-- Section Content Block Contact Buttons Start -->
                        <div class="content-block contact-buttons">
                            <a href="#" id="letstalk-trigger" class="btn btn-dark pulse-btn">Lets talk</a>
                        </div>
                        <!-- Section Content Block Contact Buttons End -->
                    </div>
                    <!-- Section Info Blocks Container End -->
                </div>
            </div>
            <!-- Section Info End -->

            <!-- Section Media Start -->
            <div class="col-12 col-xl-6 content-section__media">
                <div class="static fullheight">
                    <!-- Section Media Container Start -->
                    <div class="media-container fullheight">
                        <!-- Google Map Start -->
                        <div class="map">
                            <div id="google-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.713883341904!2d8.019384614159332!3d5.89575703177926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105cc44304bc3741%3A0xe49867ef6f0a5fbd!2sSchool%20Of%20Nursing%2C%20Itigidi!5e0!3m2!1sen!2sng!4v1634405409808!5m2!1sen!2sng"
                                    width="100%" height="100%" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>
                            </div>
                        </div>
                        <!-- Google Map End -->

                    </div>
                    <!-- Section Media Container End -->

                </div>
            </div>
            <!-- Section Media End -->

        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Notify Popup Start -->
<div class="popup notify">
    <div class="popup__container">

        <!-- Popup Controls Start -->
        <div class="popup__controls">
            <a href="#0" id="notify-close" class="popup-close"></a>
        </div>
        <!-- Popup Controls End-->

        <!-- Popup Content Start -->
        <div class="popup__content">
            <div class="container-fluid p-0">
                <div class="row no-gutters flex-xl-row-reverse">
                    <div class="col-12 col-xl-6">

                        <!-- Popup Content Block Start -->
                        <div class="content-block">

                            <!-- Popup Title Start -->
                            <div class="popup-title">
                                <p class="popup-title__title">Almost <span>done!</span></p>
                                <p class="popup-title__text small-text">Subscribe to our newsletter to get updates and
                                    notifications directly to your inbox.</p>
                            </div>
                            <!-- Popup Title End -->

                            <!-- Form Container Start -->
                            <div class="form-container">

                                <!-- Reply Messages Start-->
                                <div class="reply-group subscription-ok">
                                    <p class="reply-group__title">Done!</p>
                                    <p class="reply-group__text small-text">Thanks for subscribing. We will send updates
                                        and notifications directly to your inbox.</p>
                                </div>
                                <div class="reply-group subscription-error">
                                    <p class="reply-group__title">Ooops!</p>
                                    <p class="reply-group__text small-text">Something went wrong. Please try again
                                        later.</p>
                                </div>
                                <div class="reply-group subscription-exist">
                                    <p class="reply-group__title">Ooops!</p>
                                    <p class="reply-group__text small-text">You have already subscribed, Kindly stay
                                        tuned for update on the new website.</p>
                                </div>
                                <!-- Reply Messages End-->

                                <!-- Notify Contact Form Start-->
                                <form class="form notify-form form-dark">
                                    @csrf
                                    <input type="email" placeholder="Email Adress*" name="email" required>
                                    <span class="inputs-description">*Required fields</span>
                                    <button class="btn btn-dark" type="submit">
                                        <span class="btn-caption">Subscribe</span>
                                    </button>
                                </form>
                                <!-- Notify Contact Form End-->

                            </div>
                            <!-- Form Container End -->

                        </div>
                        <!-- Popup Content Block End -->

                    </div>
                    <div class="col-12 col-xl-6">

                        <!-- Popup Image Block Start -->
                        <div class="popup-image popup-image-1"></div>
                        <!-- Popup Image Block End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Popup Content End -->

    </div>
</div>
<!-- Notify Popup End -->

<!-- Let's Talk Popup Start -->
<div class="popup letstalk">
    <div class="popup__container">

        <!-- Popup Controls Start -->
        <div class="popup__controls">
            <a href="#0" id="letstalk-close" class="popup-close"></a>
        </div>
        <!-- Popup Controls End-->

        <!-- Popup Content Start -->
        <div class="popup__content">
            <div class="container-fluid p-0">
                <div class="row no-gutters flex-xl-row-reverse">
                    <div class="col-12 col-xl-6">

                        <!-- Popup Content Block Start -->
                        <div class="content-block">

                            <!-- Popup Title Start -->
                            <div class="popup-title">
                                <p class="popup-title__title anim-obj">Stay in&#8194;<span>touch</span></p>
                                <p class="popup-title__text small-text anim-obj">Fill and submit the form below and we
                                    will get right back
                                    to you as soon as possible</p>
                            </div>
                            <!-- Popup Title End -->

                            <!-- Form Container Start -->
                            <div class="form-container">

                                <!-- Let's Talk Form Reply Group Start -->
                                <div class="reply-group">
                                    <p class="reply-group__title">Done!</p>
                                    <p class="reply-group__text small-text">Thanks for your message. We will get back as
                                        soon as possible.</p>
                                </div>
                                <!-- Let's Talk Form Reply Group End -->

                                <!-- Let's Talk Form Start -->
                                <form class="form letstalk-form form-dark" id="letstalk-form" method="post">
                                @csrf
                                <!-- END Hidden Required Fields-->
                                    <input type="text" name="names" placeholder="Your Name*" required>
                                    <input type="email" name="email" placeholder="Email Address*" required>
                                    <input type="text" name="mobile_no" placeholder="Mobile Number*" required>
                                    <textarea name="message" placeholder="A Few Words*" required></textarea>
                                    <span class="inputs-description">*Required fields</span>
                                    <button class="btn btn-dark anim-obj">
                                        <span class="btn-caption">Send</span>
                                    </button>
                                </form>
                                <!-- Let's Talk Form End  -->

                            </div>
                            <!-- Form Container End -->

                        </div>
                        <!-- Popup Content Block End -->

                    </div>
                    <div class="col-12 col-xl-6">

                        <!-- Popup Image Block Start -->
                        <div class="popup-image popup-image-2"></div>
                        <!-- Popup Image Block End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Popup Content End -->

    </div>
</div>
<!-- Let's Talk Popup End -->

<!-- Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2><span>About</span> Us</h2>
                {{--                <h5 class="modal-title font-weight-bold" id="aboutModalLabel">ABOUT US</h5>--}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="section-title__text">CASTObubra SUG is the student Government arm of the college responsible for
                    mediating between student affairs and the college management with focus on issues affecting the
                    students and their welfare in the college. The current SUG administration is headed by Nurse
                    Shedrack Egu ...</p>
                <h4 class="mt-3">STUDENT UNIONISM</h4>
                <p class="section-title__text">Student unionism is operational in state college of nursing and midwifery
                    sciences, Itigidi. The student union Government shall be constituted upon election of eligible
                    candidates into various offices. The election shall be organized and conducted in collaboration with
                    the Dean of Students Affairs. Elected executives shall hold office for only one academic
                    session.</p>
                <p class="section-title__text">All students are automatically members of the student union upon
                    successful successful admission into the college. They are expected to pay their union dues promptly
                    as at when due. They shall be active participants while they remain students of the institution.
                    Student union week shall be taken seriously and students are expected to participate actively.</p>
                <h4 class="mt-3">CLUB AND ASSOCIATIONS</h4>
                <p class="section-title__text">These will be allowed and encouraged provided they foster unity, progress
                    and development of the institution</p>
                <ol>
                    <li style="list-style: disc;" class="section-title__text">These clubs are expected to register with
                        the Student Union Government(SUG).
                    </li>
                    <li style="list-style: disc;" class="section-title__text">Clubs/Association must present a detailed
                        write-up of their modus operandi. They must have a constitution to guide them. Night activities
                        or meetings are disallowed. All meetings must be made public and where possible, the Dean of
                        Students Affairs(DOSA) shall attend.
                    </li>
                    <li style="list-style: disc;" class="section-title__text">Any club/Association that allows it's
                        activities to conflict or interfere with the college rules, regulations and programs shall be
                        sanctioned.
                    </li>
                </ol>
            </div>
            <div class="modal-footer">
                <div class="headline__btnholder">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom HTML End -->

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
    It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>

<script src="{{ asset('coming_soon_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('coming_soon_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('coming_soon_assets/js/libs.min.js') }}"></script>
<script src="{{ asset('coming_soon_assets/js/peachy-custom.js') }}"></script>

<script>
    const contact_form = document.querySelector('#letstalk-form');
    const notify_form = document.querySelector('.notify-form');

    contact_form.addEventListener('submit', event => {
        event.preventDefault();
        const data_form = new FormData(contact_form);

        $.ajax({
            type: 'POST',
            url: '/api/sug/contact',
            data: data_form,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'sent') {
                    $('.letstalk').find('.form').addClass('is-hidden');
                    $('.letstalk').find('.reply-group').addClass('is-visible');
                    setTimeout(function () {
                        // Done Functions
                        $('.letstalk').find('.reply-group').removeClass('is-visible');
                        $('.letstalk').find('.form').delay(300).removeClass('is-hidden');
                        contact_form.reset();
                    }, 5000);
                } else {
                    return false;
                }
            }
        });
    });

    notify_form.addEventListener('submit', event => {
        event.preventDefault();
        const data_notify_form = new FormData(notify_form);

        $.ajax({
            type: 'POST',
            url: '/api/sug/subscribe',
            data: data_notify_form,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == 'sent') {
                    $('.notify').find('.form').addClass('is-hidden');
                    $('.notify').find('.subscription-ok').addClass('is-visible');
                    setTimeout(function () {
                        // Done Functions
                        $('.notify').find('.subscription-ok').removeClass('is-visible');
                        $('.notify').find('.form').delay(300).removeClass('is-hidden');
                        notify_form.reset();
                    }, 5000);
                } else if (data == 'not-sent') {
                    $('.notify').find('.form').addClass('is-hidden');
                    $('.notify').find('.subscription-error').addClass('is-visible');
                    setTimeout(function () {
                        // Done Functions
                        $('.notify').find('.subscription-error').removeClass('is-visible');
                        $('.notify').find('.form').delay(300).removeClass('is-hidden');
                        notify_form.reset();
                    }, 5000);
                } else if (data == 'already-exist') {
                    $('.notify').find('.form').addClass('is-hidden');
                    $('.notify').find('.subscription-exist').addClass('is-visible');
                    setTimeout(function () {
                        // Done Functions
                        $('.notify').find('.subscription-exist').removeClass('is-visible');
                        $('.notify').find('.form').delay(300).removeClass('is-hidden');
                        notify_form.reset();
                    }, 5000);
                }
            }
        });
    });
</script>

@yield('scripts')

</body>
</html>
