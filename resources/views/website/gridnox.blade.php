@extends('layouts.website.sub_pages')

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/castobubra-banner-bg-contact.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Get a Quote</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Get a Quote</li>
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
                            <p>Have a question or just want to say hi? We'd love to hear from you.</p>
                        </div>
                        <div class="contact__form">
                            <form action="{{ route('website.gridnox.store') }}"
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
                                            <input type="email" id="email" placeholder="Your Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <label for="mobile_no" hidden>Mobile Number</label>
                                            <input type="text" id="mobile_no" placeholder="Mobile Number" name="mobile_no" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <label for="message" hidden>Message</label>
                                            <textarea placeholder="Enter Your Message" id="message" name="message" required></textarea>
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
            </div>
        </div>
    </section>
@endsection
