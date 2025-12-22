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
                        <h3 class="page__title">Management Staff</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Management Staff</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="teacher__area">
        <div class="container">
            <div class="row">
                @foreach($bots as $bot)
                    @if((int)$bot->order === 1)
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3"></div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="teacher__item text-center grey-bg-5 transition-3 mb-30">
                                <div class="teacher__thumb w-img fix">
                                    <a>
                                        <img
                                            src="{{ asset('website_assets/img/academic-boards/' . $bot->image) }}"
                                            alt="castobubra_{{ $bot->names }}"
                                            style="border-radius: 10px;">
                                    </a>
                                </div>
                                <div class="teacher__content">
                                    <h3 class="teacher__title">{{ $bot->names }}</h3>

                                    <div class="teacher__social">
                                        <span>{{ $bot->position }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3"></div>
                    @else
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="teacher__item text-center grey-bg-5 transition-3 mb-30">
                                <div class="teacher__thumb w-img fix">
                                    <a>
                                        <img
                                            src="{{ asset('website_assets/img/academic-boards/' . $bot->image) }}"
                                            alt="castobubra_{{ $bot->names }}"
                                            style="border-radius: 10px;">
                                    </a>
                                </div>
                                <div class="teacher__content">
                                    <h3 class="teacher__title">{{ $bot->names }}</h3>

                                    <div class="teacher__social">
                                        <span>{{ $bot->position }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
