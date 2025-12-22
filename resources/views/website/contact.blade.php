@extends('layouts.website.sub_pages')


@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/castobubra-banner-bg-contact.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Contact Us</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="contact__area">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-6">
                    <div class="contact__wrapper">
                        <div class="section__title-wrapper mb-40">
                            <h2 class="section__title">Get in <span class="yellow-bg yellow-bg-big">touch<img
                                        src="{{ asset('website_assets/img/shape/yellow-bg.png') }}" alt=""></span></h2>
                            {{--                            <p>Have a question or just want to say hi? We'd love to hear from you.</p>--}}
                        </div>
                        <div class="contact__form">
                            <form
                                action="{{ route('website.contact.store') }}"
                                method="POST">
                                @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="contact__form-input">
                                            <label for="names" hidden>Your Name</label>
                                            <input type="text" id="names" placeholder="Your Name" name="names" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="contact__form-input">
                                            <label for="email" hidden>Email</label>
                                            <input type="email" id="email" placeholder="Your Email" name="email"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <label for="mobile_no" hidden>Mobile Number</label>
                                            <input type="text" id="mobile_no" placeholder="Mobile Number"
                                                   name="mobile_no" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <label for="message" hidden>Message</label>
                                            <textarea placeholder="Enter Your Message" id="message" name="message"
                                                      required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__btn">
                                            <button type="submit" class="e-btn">Send your message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                    <div class="contact__info white-bg p-relative z-index-1">
                        <div class="contact__shape">
                            <img class="contact-shape-1"
                                 src="{{ asset('website_assets/img/contact/contact-shape-1.png') }}" alt="">
                            <img class="contact-shape-2"
                                 src="{{ asset('website_assets/img/contact/contact-shape-2.png') }}" alt="">
                            <img class="contact-shape-3"
                                 src="{{ asset('website_assets/img/contact/contact-shape-3.png') }}" alt="">
                        </div>
                        <div class="contact__info-inner white-bg">
                            <ul>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="map" viewBox="0 0 24 24">
                                                <path class="st0"
                                                      d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z"></path>
                                                <circle class="st0" cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Location</h4>
                                            <p>{{ \App\Http\Services\HelperService::getSettings()->app_location }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="mail" viewBox="0 0 24 24">
                                                <path class="st0"
                                                      d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z"></path>
                                                <polyline class="st0" points="22,6 12,13 2,6 "></polyline>
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Email us directly</h4>
                                            <p>
                                                <a href="mailto:{{ \App\Http\Services\HelperService::getSettings()->app_email }}">{{ \App\Http\Services\HelperService::getSettings()->app_email }}</a>
                                            </p>

                                            @if(\App\Http\Services\HelperService::getSettings()->app_email_2)
                                                <p>
                                                    <a href="mailto:{{ \App\Http\Services\HelperService::getSettings()->app_email_2 }}">{{ \App\Http\Services\HelperService::getSettings()->app_email_2 }}</a>
                                                </p>
                                            @endif
                                            @if(\App\Http\Services\HelperService::getSettings()->app_email_3)
                                                <p>
                                                    <a href="mailto:{{ \App\Http\Services\HelperService::getSettings()->app_email_3 }}">{{ \App\Http\Services\HelperService::getSettings()->app_email_3 }}</a>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="call" viewBox="0 0 24 24">
                                                <path class="st0"
                                                      d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z"></path>
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Phone</h4>
                                            <p>
                                                <a href="tel:{{ \App\Http\Services\HelperService::getSettings()->app_mobile_no_1 }}">{{ \App\Http\Services\HelperService::getSettings()->app_mobile_no_1 }}</a>
                                            </p>
                                            @if(\App\Http\Services\HelperService::getSettings()->app_mobile_no_2)
                                                <p>
                                                    <a href="tel:{{ \App\Http\Services\HelperService::getSettings()->app_mobile_no_2 }}">{{ \App\Http\Services\HelperService::getSettings()->app_mobile_no_2 }}</a>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="contact__social pl-30">
                                <h4>Follow Us</h4>
                                <ul>
                                    @php
                                        $social_media = \App\Models\SocialMedia::where('is_active', true)
                                            ->orderBy('order', 'asc')
                                            ->orderBy('created_at', 'asc')
                                            ->get();
                                    @endphp
                                    @forelse($social_media as $social)
                                        <li>
                                            <a href="{{ $social->url }}" 
                                               target="_blank" 
                                               rel="noopener noreferrer"
                                               class="{{ $social->color_class ?? '' }}"
                                               title="{{ $social->name }}">
                                                <i class="{{ $social->icon_class ?? '' }}"></i>
                                            </a>
                                        </li>
                                    @empty
                                        {{-- Fallback to old system settings if no social media configured --}}
                                        @if(\App\Http\Services\HelperService::getSettings()->facebook_url)
                                            <li>
                                                <a href="{{ \App\Http\Services\HelperService::getSettings()->facebook_url ?: '#' }}"
                                                   class="fb"><i class="social_facebook"></i></a>
                                            </li>
                                        @endif
                                        @if(\App\Http\Services\HelperService::getSettings()->twitter_url)
                                            <li>
                                                <a href="{{ \App\Http\Services\HelperService::getSettings()->twitter_url ?: '#' }}"
                                                   class="tw"><i class="social_twitter"></i></a>
                                            </li>
                                        @endif
                                        @if(\App\Http\Services\HelperService::getSettings()->youtube_url)
                                            <li>
                                                <a href="{{ \App\Http\Services\HelperService::getSettings()->youtube_url ?: '#' }}"
                                                   class="pin"><i class="social_youtube"></i></a>
                                            </li>
                                        @endif
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
