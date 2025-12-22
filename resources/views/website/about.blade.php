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
                        <h3 class="page__title">About Us</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <div class="course__tab-inner bg-danger text-white mb-30 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Our History</h3>
    </div>
    <div class="course__tab-inner bg-light rounded" style="text-align: justify;">
        <p>The College of Agriculture, Science and Technology, Obubra (CAST Obubra) was re-established in 2024 following its transformation from the former Faculty of Agriculture and Forestry at the University of Cross River State (UNICROSS). Its roots, however, trace back to 1976 when it was first founded by the Ministry of Agriculture as the School of Agriculture, Obubra, primarily established to train technical staff for the ministry.</p>
        <p>In 1992, it was upgraded to the Ibrahim Babangida College of Agriculture (IBC–A) and accredited by the National Board for Technical Education (NBTE) to offer National Diploma (ND) and Higher National Diploma (HND) programmes.</p>
        <p>By 2002, the institution was merged with other tertiary institutions in the state — including the Polytechnic Calabar and the College of Education Akamkpa — to form the Cross River University of Technology (CRUTECH), now known as the University of Cross River State (UNICROSS).</p>
        <p>In 2024, the College was revived and expanded into CAST Obubra, with a renewed mandate to integrate agriculture, science, and technology as drivers of education, research, innovation, and sustainable development.</p>
        <p>Campus and Location: The College is located at Ovonum–Ofodua Adun, Obubra Local Government Area, occupying approximately 464.76 hectares of agriculturally fertile land. This vast land area offers unique opportunities for practical training, agricultural research, technological innovation, and community-based development projects.</p>
    </div>
@endsection
