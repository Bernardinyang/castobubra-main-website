@extends('layouts.website.sub_pages_sidebar')

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
                        <h3 class="page__title">ND/HND Nursing</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">ND/HND Nursing</li>
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
        <h3 class="mb-0 text-uppercase">Introduction</h3>
    </div>
    <div class="course__tab-inner bg-light tab_links rounded mb-50" style="text-align: justify;">
        <p>
            The main objective of the movement of Nursing Education into Colleges of Nursing in collaboration with
            National Board for Technical Education (NBTE) is to ensure that Nursing and Midwifery education in Nigeria,
            evolve in line with the National Policy on Education and the contemporary system of education in Nigeria.
            This is in order to give legal backing by the Federal Government to Nursing institutions for the award of
            ACADEMIC CERTIFICATES to Nursing graduates.
        </p>
        <p>
            The ND/HND Nursing programme has been designed to allow for seamless academic progression of graduates along
            the already existing system of education in the country. It also takes cognizance of the new scheme of
            service for Nurses in Nigeria approved by the National Council of Establishment in 2016.
        </p>
        <p>
            The main goal of the ND/HND Nursing programme is to prepare competent, skilled, polyvalent Nurse
            practitioners, versatile midwives and professionally knowledgeable public health Nurses who will use
            problem-solving skills in providing safe, acceptable, effective and affordable quality health services to
            meet the health needs of individuals, families and communities at all levels of care.
        </p>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">About ND/HND Nursing Programme</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <p>
            The ND/HND Nursing is a four-year UNINTERUPTED programme i.e 2 years for ND and 2 years for HND. Students
            starts with ND Nursing programme which is a non-terminal programme.
        </p>
        <p>
            The ND Nursing graduates with minimum CGPA of 2.5 (Lower Credit) will then proceed for HND Nursing. Indexing
            shall be at the beginning of first semester of ND II. Students shall participate in Supervised Clinical Work
            Experience (SCWE) during the programme.
        </p>
        <p>
            The SCWEs would be in two parts of eight weeks each. The first part of SCWE shall be between the end of ND
            I, while the second part shall be between the end of ND II. Stipend for SCWE shall be paid through
            Industrial Training Fund (ITF).
        </p>
        <p>
            The SCWE shall be graded on a pass or fail basis. Where a student has satisfied all other requirements of
            the programme BUT FAILED SCWEs, he/she may only be allowed to repeat another four months SCWEs at his/own
            expenses.
        </p>
        <p>
            Council’s Professional Exam for General Nursing shall be after successful completion of HND 1 Nursing.
            However, graduates of HND Nursing programme are required to sit for Council’s professional exam in either of
            the two options of specialization, namely: Midwifery for registration and licensing as Registered Midwife
            (RM) and Public Health Nursing for registration and licensing as Registered Public Health Nurse (RPHN).
        </p>
        <p>
            HND graduates shall proceed for one-year mandatory Supervised Clinical Experience (Attachment) in an
            approved health facilities or institution and after successful completion of the one-year mandatory
            supervised clinical attachment, graduates shall be mobilized for a one year National Youth Service Corps
            (NYSC).
        </p>
    </div>
@endsection
