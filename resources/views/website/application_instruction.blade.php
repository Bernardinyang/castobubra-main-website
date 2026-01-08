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

        .custom-course__tab {
            border: 1px solid rgba(0, 0, 0, 0.41);
            box-shadow: 5px 5px 10px #00000026;
            transition: .3s ease-in-out;
            border-radius: 10px;
        }

        .custom-course__tab:hover {
            box-shadow: none;
        }

        .countdown_el {
            display: inline-block;
            background-color: #F2C85C;
            padding: 10px;
            border-radius: 10px;
            color: #000000;
            margin: 10px;
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
                        <h3 class="page__title">
                            @if(\App\Http\Services\HelperService::getSettings()->is_registration_on)
                                Online Application Closes in: <br><span class="countdown"></span>
                            @else
                                Online Application Closed
                            @endif
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Application Instructions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    @if($website_new_bars)
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

    @if(\App\Http\Services\HelperService::getSettings()->is_registration_on)
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('website.application_guidelines') }}" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Application<br> Instructions</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #227353;font-weight: 700;font-style: italic;">Click here to go read the
                        application
                        requirement for our programs.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="https://portal.castobubra.ng/" target="_blank" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Start<br> Application</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #227353;font-weight: 700;font-style: italic;">Click here to go read the
                        Click here to proceed to register on the school portal.
                    </p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="https://portal.castobubra.ng/" target="_blank" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Continue<br> Application</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #227353;font-weight: 700;font-style: italic;">Click here to go read the
                        Click here to login your dashboard and continue your registration process.
                    </p>
                </a>
            </div>
        </div>
    @else
        <div style="background: #F2C85C;"
             class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
            <h3 class="mb-0 text-uppercase">
                IMPORTANT INFORMATION : CLOSING DATE FOR SALES OF ADMISSION FORMS FOR ND/HND AND BASIC NURSING
                PROGRAMMES AT CRS COLLEGE OF NURSING AND MIDWIFERY SCIENCES, ITIGIDI
            </h3>
        </div>
        <div class="course__tab-inner bg-light rounded mb-50" style="text-align: justify;">
            <p>
                The general public is by this information advised to strictly note that in keeping with our
                advertisement on the above subject matter, sales of forms for admission into the ND/HND and Basic
                Nursing Programmes of the above named College closes on Wednesday, 8th June, 2022 by 2:00pm.
            </p>
            <p>
                By this notice, whoever proceeds to make payment into the college account thereafter, does that at
                his/her own risk.
                Please bring the contents of this information to all and sundry as the College shall NOT be responsible
                for any act likely to flout this directive.
            </p>
            <p>
                Accept the assurances of the esteemed regards of the College Management.
            </p>
            <p style="font-weight: bold;margin-top: 20px;margin-bottom: 5px;">
                Sir Chief Aji E. Eko Ksji
            </p>
            <p>Registrar</p>
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        const countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

        const x = setInterval(function () {
            const now = new Date().getTime();

            const distance = countDownDate - now;
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.querySelector(".countdown").innerHTML = "<span class=\"countdown_el\">" + days + "</span>Days " + "<span class=\"countdown_el\">" + hours + "</span>Hrs " +
                "<span class=\"countdown_el\">" + minutes + "</span>Mins " + "<span class=\"countdown_el\">" + seconds + "</span>Secs ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.querySelector(".page__title").innerHTML = "Online Application Registration Closed!";
            }
        }, 1000);
    </script>
@endsection
