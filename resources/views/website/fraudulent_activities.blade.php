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
                        <h3 class="page__title">Beware of Fraudulent Activities</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Beware of Fraudulent Activities
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
    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">What is School impersonation fraud?</h3>
    </div>
    <div class="course__tab-inner bg-light tab_links rounded mb-50" style="text-align: justify;">
        <p>
            School impersonation fraud is when a fraudster impersonates someone from the school in order to trick a
            victim into making payments to a fraudulent account or give him/her/them your money to make payments for
            you.
        </p>

    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">What a fraudster might do:</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li>
                A fraudster usually puts out a notice to their victim claiming that they are CASTObubra and will likely
                tell the victim to make the application payment through them or using their account number.
            </li>
            <li>
                The fraudster might ask for details from the victim so they can access the account and make payments
                to the fraudulent account themselves.
            </li>
            <li>
                In any scenario, the fraudster will foster a feeling of panic in order to get the victim to comply with
                their requests as quickly as possible.
            </li>
            <li>
                Fraudsters might also impersonate other well-known, trusted schools such as UNICAL, UNICROSS, etc.
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">What CASTObubra will never do</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li>
                We will never tell any student to pay any amount of money to a personal account
            </li>
            <li>
                We will never send a representative to make you pay through him/her/them.
            </li>
            <li>
                All Our payment happens on your <code><a href="#">dashboard</a></code> or in
                the <code>Registrar's Office</code>
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">What you can do to protect yourself</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li>
                Never give out your personal details to someone who has called you unexpectedly.
            </li>
            <li>
                Do not give out any money to anyone claiming to be from CASTObubra or any other school.
            </li>
            <li>
                Do your own research and enquiries about the call, either on our website or on the internat.
            </li>
            <li>
                If you are unsure about someone who has called you claiming to be from the CASTObubra or another school,
                hang
                up and call back on the company’s published telephone number.
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">For further Enquiries / Support / Complaint</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <p>
            Call:
            <code><a href="tel:08131913864">08131913864</a></code> |
            <code><a href="tel:07061080676">07061080676</a></code> |
            <code><a href="tel:07016638018">07016638018</a></code>
        </p>
        <p>
            Call:
            <code><a href="tel:08123934461">08123934461</a></code> - Technical issues
        </p>
        <p>
            Email <code><a href="mailto:complaint@castobubra.ng">complaint@castobubra.ng</a></code> |
            <code><a href="mailto:info@castobubra.ng">info@castobubra.ng</a></code>
        </p>
    </div>
@endsection
