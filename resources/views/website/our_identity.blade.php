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
                        <h3 class="page__title">Our Identity</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Identity</li>
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
        <div class="accordion" id="identityAccordion">
            <!-- The College Logo Accordion Item (Open by default) -->
            <div class="card">
                <div class="card-header" id="headingLogo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-uppercase" 
                                type="button" 
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseLogo" 
                                aria-expanded="true" 
                                aria-controls="collapseLogo">
                            The College Logo
                        </button>
                    </h2>
                </div>
                <div id="collapseLogo" 
                     class="collapse show" 
                     aria-labelledby="headingLogo" 
                     data-bs-parent="#identityAccordion">
                    <div class="card-body">
                        <div>
                            <img src="{{ asset('assets/images/castobubra_logo.png') }}" alt="CAST Obubra Logo" width="50%">
                        </div>

                        <p class="identity__intro mb-40">
                        Our logo captures the institution's vision of advancing education, research, and innovation in agriculture, science, and technology. It serves as a visual representation of our commitment to shaping leaders for sustainable development.
                    </p>
                    
                    <div class="mb-30">
                        <h3>The Shield</h3>
                        <p class="mb-20">
                            The central shield is divided into four equal quadrants by a white cross, each highlighting a core pillar of the college's mandate:
                        </p>

                        <p><strong>Open book with rays (top)</strong> – symbolizing education, knowledge, and the enlightenment that comes from learning.</p>
                        <p><strong>Light bulb (left)</strong> – representing innovation, creativity, and the transformative power of science and technology.</p>
                        <p><strong>Microscope (bottom)</strong> – denoting research, scientific discovery, and the application of modern science to solve real-world problems.</p>
                        <p><strong>Tractor and crops (right)</strong> – standing for mechanized agriculture, food production, and sustainable development.</p>
                    </div>
                    
                    <div class="mb-30">
                        <h3>The Circular Band</h3>
                        <p>
                            The green circular band emphasizes the identity of the college and its connection to Cross River State, bearing the institution's full name: "COLLEGE OF AGRICULTURE, SCIENCE AND TECHNOLOGY" and "* OBUBRA-CROSS RIVER STATE *".
                        </p>
                    </div>
                    
                    <div class="mb-30">
                        <h3>The Motto</h3>
                        <p>
                            The scroll at the base bears the motto: <strong>"Shaping Leaders for Sustainable Development"</strong>, affirming the institution's mission to equip students with practical knowledge and skills that yield personal success and societal growth.
                        </p>
                    </div>
                    
                    <div>
                        <p>
                            Together, the logo portrays the College as a hub of knowledge where agriculture, science, and technology converge to drive innovation, sustainability, and development. It embodies our commitment to nurturing well-rounded leaders who will contribute meaningfully to society.
                        </p>
                    </div>
                    </div>
                </div>
            </div>

            <!-- The College Flag Accordion Item -->
            <div class="card">
                <div class="card-header" id="headingFlag">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed  text-uppercase" 
                                type="button" 
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseFlag" 
                                aria-expanded="false" 
                                aria-controls="collapseFlag">
                            The College Flag
                        </button>
                    </h2>
                </div>
                <div id="collapseFlag" 
                     class="collapse" 
                     aria-labelledby="headingFlag" 
                     data-bs-parent="#identityAccordion">
                    <div class="card-body">
                        <div class="row mb-30">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <img src="{{ asset('website_assets/img/flag1.png') }}" alt="CAST Obubra Flag" class="img-fluid rounded">
                            </div>
                            <div class="col-12 col-md-6">
                                <img src="{{ asset('website_assets/img/flag2.png') }}" alt="CAST Obubra Flag" class="img-fluid rounded">
                            </div>
                        </div>
                        
                        <p class="identity__intro mb-40">
                        The College of Agriculture, Science and Technology, Obubra, flag is a symbol of identity, vision, and values. It represents our commitment to excellence in education, research, and sustainable development.
                    </p>
                    
                    <div class="mb-30">
                        <h3>Green</h3>
                        <p>
                            Green signifies agriculture, fertility, and growth, reflecting our role in cultivating knowledge and sustaining the environment. It also connects with the green of Nigeria's national flag, symbolizing our pride and service to the nation.
                        </p>
                    </div>
                    
                    <div class="mb-30">
                        <h3>White</h3>
                        <p>
                            White represents peace, integrity, and purity of purpose, embodying our commitment to academic excellence and unity. Notably, white is found on both the Nigerian flag and the Cross River State flag, reaffirming our alignment with national and state ideals.
                        </p>
                    </div>
                    
                    <div class="mb-30">
                        <h3>Blue</h3>
                        <p>
                            Blue stands for innovation, science, and technology, highlighting our drive to advance agricultural education and research for community and national development. It also reflects the blue of the Cross River State flag, honoring our roots and the government that established and owns the college.
                        </p>
                    </div>
                    
                    <div>
                        <p>
                            Together, these colors reflect our mission to nurture the land, inspire minds, and build a sustainable future, while symbolically uniting the college with both Nigeria and Cross River State.
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection