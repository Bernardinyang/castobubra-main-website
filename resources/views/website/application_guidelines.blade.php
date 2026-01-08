@extends('layouts.website.sub_pages')

@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
@endsection

@section('styles')
    <style>
        code {
            font-weight: bold;
        }
    </style>
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/castobubra-banner-bg-about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Instructions and Guidelines for Online Application</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Instructions and Guidelines for
                                    Online Application
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    @if($news_alert)
        {{--        <div class="showcase our-vision-mission news_alert mb-30">--}}
        {{--            <div class="container">--}}
        {{--                <div class="card vision text-center">--}}
        {{--                    <h2 class="text-uppercase">{{ $news_alert->title }}</h2>--}}
        {{--                    <hr>--}}
        {{--                    {!! $news_alert->details !!}--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="news_slide_section bg-transparent">
            <div class="container bg-white">
                <marquee scrolldelay="100" class="news_slide">
                    @foreach($website_new_bars as $website_new_bar)
                        <span>{{ $website_new_bar->news }}</span>
                    @endforeach
                </marquee>
            </div>
        </div>
        <hr>
    @endif

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">For further Enquiries / Support</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <p>
            Call:
            <code><a href="tel:08131913864">08131913864</a></code>,
            <code><a href="tel:07061080676">07061080676</a></code>
        </p>
        <p>
            Call:
            <code><a href="tel:08123934461">08123934461</a></code> - Technical issues
        </p>
        <p>
            Email <code><a href="mailto:enquires@castobubra.ng">enquires@castobubra.ng</a></code>
        </p>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Admission Requirements</h3>
    </div>
    <div class="course__tab-inner bg-light tab_links rounded mb-50" style="text-align: justify;">
        <ul>
            <li>Candidate must possess a minimum of 5 credit passes in <code>English Language</code>,
                <code>Mathematics</code>,
                <code>Biology</code>, <code>Physics</code>, <code>Chemistry</code> obtainable in <code>WAEC/GCE, NECO or
                    NABTEB O'Level</code> at no more than <code>2 sittings</code>.
            </li>
            <li>
                Candidate must attain the <code>age of 17 years by October, {{ date('Y') }}</code>
            </li>
            <li>
                Candidate applying for <code>ND/HND</code> program must have <code>written jamb
                    in {{ date('Y') - 1 }}</code> with <code>scores as
                    applicable for admission into Nigerian Colleges and Polytechnics</code>
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Account Creation</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li>
                Open your browser
            </li>
            <li>
                Type <code><a href="{{route('website.application')}}" target="_blank">www.castobubra.ng</a></code>
                on the
                Address Bar and press Enter.
            </li>
            <li>
                The website will direct you to the Application Portal <code><a href="{{route('website.application')}}"
                                                                               target="_blank">castobubra.ng</a></code>
            </li>
            <li>
                Click on <code><sa href="{{ route('website.requirement') }}">VIEW COURSE REQUIREMENTS</sa></code>, to view and read your preferred course requirements
                Come back to the form Area and fill your required information.
            </li>
            <li>
                when you're done filling the form, Click <code>"Submit Application"</code>.
            </li>
            <li>
                Your application  will be submitted  successfully and  details  sent to your email address for further communication.
            </li>
        </ul>
    </div>

{{--    <div>--}}
{{--        <a class="btn btn-primary" href="#" target="_blank">DOWNLOAD GUIDELINES FOR ONLINE REGISTRATION</a>--}}
{{--    </div>--}}

    <hr>
    <div class="mt-50">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('website.application_guidelines') }}" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Application<br> Instructions</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #c2f6e9;font-style: italic;">Click here to go read the
                        application
                        requirement for our programs.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('website.application')}}" target="_blank" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Start<br> Application</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #c2f6e9;font-style: italic;">Click here to go read the
                        Click here to proceed to register on the school
                    </p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('website.application')}}" target="_blank" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Continue<br> Application</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #c2f6e9;font-style: italic;">Click here to go read the
                        Click here to login your dashboard and continue your registration process.
                    </p>
                </a>
            </div>
        </div>
    </div>
@endsection
