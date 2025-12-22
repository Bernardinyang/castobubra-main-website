@extends('layouts.website.sub_pages')

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
                        <h3 class="page__title">News and Updates</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">News and Updates</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="blog__area pt-50 pb-0">
        <div class="container">
            @if($posts && $posts->count() > 0)
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
            
            <div class="row">
                <div class="col-xxl-12">
                    <div class="course__pagination text-center mt-50">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-xxl-12">
                    <div class="text-center py-5">
                        <h4>No news available at the moment.</h4>
                        <p>Please check back later for updates.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection



