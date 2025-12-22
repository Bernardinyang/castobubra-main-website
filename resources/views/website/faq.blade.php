@extends('layouts.website.sub_pages_sidebar')

@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "Frequently Asked Questions - College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/castobubra-banner-bg-about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Frequently Asked Questions</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="course__tab-inner bg-light rounded accordion-custom mb-50" style="text-align: justify;">
        <div class="accordion" id="faqAccordion">
            @forelse($faqs as $index => $faq)
                <div class="card">
                    <div class="card-header" id="heading{{ $index + 1 }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left {{ $index === 0 ? '' : 'collapsed' }}" 
                                    type="button" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq_{{ $index + 1 }}" 
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                    aria-controls="faq_{{ $index + 1 }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                    </div>
                    <div id="faq_{{ $index + 1 }}" 
                         class="collapse {{ $index === 0 ? 'show' : '' }}" 
                         aria-labelledby="heading{{ $index + 1 }}" 
                         data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <p class="mb-0">No FAQs available at the moment. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

