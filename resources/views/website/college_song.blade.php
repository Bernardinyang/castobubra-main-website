@extends('layouts.website.sub_pages_sidebar')

@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/castobubra-banner-bg-about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">College Song</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">College Song</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-6 offset-xxl-3">
            <div class="section__title-wrapper text-center mb-60">
                <h2 class="section__title"><span class="yellow-bg"> CASTObubra College Anthem <img
                            src="{{ asset('website_assets/img/shape/yellow-bg-2.png') }}" alt="">  </span> <br>
                </h2>
            </div>
        </div>
    </div>
    <div class="course__tab-inner bg-light rounded mb-50" style="text-align: justify;">
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

    <hr>

    <div class="row">
        <div class="col-xxl-6 offset-xxl-3">
            <div class="section__title-wrapper text-center mb-30 mt-60">
                <h2 class="section__title"><span class="yellow-bg"> Nurses Anthem <img
                            src="{{ asset('website_assets/img/shape/yellow-bg-2.png') }}" alt="">  </span> <br>
                </h2>
            </div>
        </div>
    </div>
    <div class="course__tab-inner bg-light rounded" style="text-align: justify;">
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

        <h4>Chorus</h4>
        <p>
            Nurses are great<br>
            Nurses are ring<br>
            An epitome of humility and service<br>
            We are specially ordained for this vocation<br>
            YES AM PROUD TO BE A NURSE!!!
        </p>

        <p>
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

        <h4>Chorus</h4>
        <p>
            Nurses are great<br>
            Nurses are ring<br>
            An epitome of humility and service<br>
            We are specially ordained for this vocation<br>
            YES AM PROUD TO BE A NURSE!!!
        </p>
    </div>
@endsection
