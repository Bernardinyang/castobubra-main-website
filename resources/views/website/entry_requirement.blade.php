@extends('layouts.website.sub_pages_sidebar')

@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/course_reg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Admission Entry Requirements</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Entry Requirement</li>
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
        <div class="accordion" id="entryRequirementAccordion">
            @foreach($courseRequirements as $index => $course)
                <div class="card">
                    <div class="card-header" id="heading{{ $index + 1 }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left {{ $index === 0 ? '' : 'collapsed' }}" 
                                    type="button" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#course_{{ $index + 1 }}" 
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                    aria-controls="course_{{ $index + 1 }}">
                                {{ $course['title'] }}
                            </button>
                        </h2>
                    </div>
                    <div id="course_{{ $index + 1 }}" 
                         class="collapse {{ $index === 0 ? 'show' : '' }}" 
                         aria-labelledby="heading{{ $index + 1 }}" 
                         data-bs-parent="#entryRequirementAccordion">
                        <div class="card-body">
                            <ul>
                                @foreach($course['requirements'] as $requirement)
                                    <li>{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection