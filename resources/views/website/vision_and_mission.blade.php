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
                        <h3 class="page__title">Vision, Mission & Philosophy</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vision, Mission & Philosophy</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Our Vision</h3>
    </div>
    <div class="course__tab-inner bg-light rounded mb-50" style="text-align: justify;">
        <p>To establish the College of Agriculture, Science and Technology, Obubra, as a globally recognized centre of excellence in research, innovation, and the training of highly skilled professionals, dedicated to advancing sustainable agricultural practices, promoting cutting-edge scientific research, and harnessing technological solutions that foster self-employment, drive entrepreneurship, increase income generation, and strengthen food security in response to state, national, and global challenges.</p>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Our Mission</h3>
    </div>
    <div class="course__tab-inner bg-light rounded mb-50" style="text-align: justify;">
        <p>Our mission is to provide knowledge and technical skills through training, research, and innovation in agriculture, science, technology, and allied sectors — fostering socio-economic development, entrepreneurship, and sustainability for Cross River State, Nigeria, and the global community.</p>
    </div>

    <div id="philosophy" style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">The Philosophy of the College</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links" style="text-align: justify;">
        <ul>
            <li>
                The Philosophy of the College of Agriculture, Science and Technology, Obubra, is rooted in the belief that knowledge, innovation, and skills are the driving forces of sustainable development.
            </li>
            <li>
                Guided by our vision and mission, we are committed to cultivating a culture of excellence in teaching, research, and entrepreneurship that integrates agriculture, science, and technology for the benefit of society.
            </li>
            <li>
                We believe in harnessing human potential to create solutions that address local, national, and global challenges - promoting food security, empowering communities, advancing socio-economic growth, and fostering self-reliance.
            </li>
            <li>
                Our guiding principle is to shape competent, ethical, and forward-looking professionals who will transform resources into opportunities for a prosperous and sustainable future.
            </li>
        </ul>
    </div>

@endsection
