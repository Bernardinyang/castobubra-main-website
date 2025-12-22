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
    </style>
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/castobubra-banner-bg-about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Instructions and Guidelines for Online Application</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Instructions and Guidelines for
                                    Online Application
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
    @if($news_alert)
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

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">For further Enquiries / Support</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <p>
            Call:
            <code><a href="tel:08023841525">08023841525</a></code>,
            <code><a href="tel:08032203204">08032203204</a></code> and
            <code><a href="tel:08033448742">08033448742</a></code>
        </p>
        <p>
            Call:
            <code><a href="tel:08123934461">08123934461</a></code> - Technical issues
        </p>
        <p>
            Email <code><a href="mailto:complaint@castobubra.edu.ng">complaint@castobubra.edu.ng</a></code>
        </p>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Admission Requirements</h3>
    </div>
    <div class="course__tab-inner bg-light tab_links rounded mb-50" style="text-align: justify;">
        <ul>
            <li>Candidate must possess a minimum of 5 credit passes in <code>English Language</code>,
                <code>Mathematics</code>,
                <code>Biology</code>, <code>Physics</code>, <code>Chemistry</code> obtainable in <code>WAEC/GCE, NECO or
                    NABTEB O'Level</code> at no more than <code>2 sittings</code>.
            </li>
            <li>
                Candidate must attain the <code>age of 17 years by october, {{ date('Y') }}</code>
            </li>
            <li>
                Candidate applying for <code>ND/HND nursing</code> program must have <code>written jamb
                    in {{ date('Y') }}</code> with <code>scores as
                    applicable for admission into Nigerian Colleges and Polytechnics</code>
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Account Creation</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li>
                Open your browser
            </li>
            <li>
                Type <code><a href="https://portal.castobubra.edu.ng" target="_blank">www.portal.castobubra.edu.ng</a></code>
                on the
                Address Bar and press Enter.
            </li>
            <li>
                The website will direct you to the Application Portal <code><a href="https://portal.castobubra.edu.ng"
                                                                               target="_blank">portal.castobubra.edu.ng</a></code>
            </li>
            <li>
                Click on <code>"Application Instruction"</code>, to read the Instruction and Application Guidelines for
                the online application.
            </li>
            <li>
                Click on <code>"Start Application"</code> to create account.
            </li>
            <li>
                Enter your Password, Firstname, Surname, Othername (if any), GSM Number, email.
            </li>
            <li>
                Click on the line under <code>"Solve the Maths"</code> and type the answer.
            </li>
            <li>
                Click on <code>"Create Account"</code>.
            </li>
            <li>
                Your account will be created successfully and your details will be sent to your email address and will
                also appear on your computer screen.
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Application Fee Payment</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li>
                After account creation, Click on the button called <code>"Click to Continue"</code>
            </li>
            <li>
                You will be returned to Continue Application page, enter your<code> email and password</code> and
                click on <code>Login</code>
            </li>
            <li>
                At the top left, click on <code>"Pay Application Fee"</code>.
            </li>
            <li>
                Click on <code>"Proceed to Make Payment"</code>
            </li>
            <li>
                Click on <code>"Proceed to Pay"</code>
            </li>
            <li>
                Click on the Payment Mode you want (<code>"PAY NOW WITH ATM CARD"</code> or <code>"Transfer to College
                    Utility Account"</code>)
            </li>
            <li>
                If you choose <code>"Transfer to College Utility Account"</code>, Make sure you transfer using a bank
                mobile app to enable you generate a transaction receipt you can upload as prove of payment. After your
                transfer, click <code>PROVE OF PAYMENT</code> button to upload.
            </li>
            <li>
                If you choose <code>"PAY NOW WITH ATM CARD"</code>, you will be directed to the payment gateway you
                selected, supply the necessary details and make your payment.
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Filling Of Application Form</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li>
                If paid through your selected payment gateway, you will be directed to <code>"Continue
                    Application"</code> page, Go to Step 3 of this section.
            </li>
            <li>
                If you made a bank transfer, and have <code>uploaded your prove of payment</code>, you will be directed
                to <code>"Continue Application"</code>
            </li>
            <li>
                Enter your <code>Email and Password</code> and click on <code>Login</code>
            </li>
            <li>
                At the top left, Click on <code>Home</code>, then <code>Bio-data</code> and supply your details
                on each field
            </li>
            <li>
                Click on <code>Upload your passport</code> and upload your recent passport photograph. Passport
                photograph size should NOT be more than 100KB.
            </li>
            <li>
                Click on <code>Update Profile</code>
            </li>
            <li>
                At the top left, Click on <code>O-Level</code> and enter your <code>Senior Secondary School Name,
                    Centre Number, Exam Number, Certificate Obtained (WAEC, NECO, or NABTEB), From Date and To
                    Date(Note:</code> Primary and Junior Secondary Schools details are not needed). Then click on
                <code>Add School</code>.
            </li>
            <li>
                If you are using two results, enter the details of the second result as you did in Step 7.
            </li>
            <li>
                Click on <code>Next</code>
            </li>
            <li>
                Enter your Subject, Exam and Grade and click on <code>"Add Result"</code>. REPEAT this step until
                you add all the 5 subjects. <code>NOTE:</code> At this stage, you will only see the 5 subjects
                required and the acceptable grades. If you are using 2 results, when you select the subject, select the
                Exam Type that you have credit on it and select the grade.
            </li>
            <li>
                After entering the 5 main subjects, Click on <code>"You can Add More Subjects"</code> to add more
                subjects <code>(optional)</code>
            </li>
            <li>
                Click on <code>Next</code>
            </li>
            <li>
                Click on the field for <code>"Select Certificate to Upload"</code> and select <code>STATEMENT OF
                    RESULTS/CERTIFICATES</code>. Then Click on <code>"Choose File"</code> and choose the file to
                upload from its location. Then Click on <code>"Upload Certificates"</code>. If you are using 2
                results, REPEAT this step and upload the other one, else go to the next step. <code>NOTE: Attached ONLY
                    a scan
                    copy of your Statement of Results/Certificate(s). Statement of Results/Certificates file size should
                    NOT
                    be more than 300KB</code>.
            </li>
            <li>
                Click on<code>Next</code>
            </li>
            <li>
                A preview of the information you entered will be displayed. If you there is something you wrongly
                entered and you want to edit, go to the top left and click on the section where the information is and
                edit it. But if you are satisfied with the information you entered, click on the small box under
                <code>Declaration</code> and click <code>SUBMIT APPLICATION</code>. <code>NOTE:</code>
                Application cannot be edited after submission.
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Printing</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <ul>
            <li><code>Print your Completed Application Forms, Acknowledge Card and Payment Receipt</code>. Ensure
                that you and your guardian sign the Completed Application Form and write the date of signing.
            </li>
            <li>To print you Payment Receipt, at the top left, Click on <code>Transaction History</code> and click
                on the item under <code>Session TID</code>, then print it.
            </li>
        </ul>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">Additional Resources</h3>
    </div>
    <div class="course__tab-inner bg-light rounded tab_links mb-50" style="text-align: justify;">
        <p>
            If you are having issues understanding the written workflow, you can click the button below to watch a
            comprehensive video guide on how to go about all application process.
        </p>
        <a href="#" class="btn btn-danger">Watch Video tutorial</a>
    </div>

    <div>
        <a class="btn btn-primary" href="#" target="_blank">DOWNLOAD GUIDELINES FOR ONLINE REGISTRATION</a>
    </div>

    <hr>
    <div class="mt-50">
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
                <a href="https://portal.castobubra.edu.ng/" target="_blank" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Start<br> Application</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #227353;font-weight: 700;font-style: italic;">Click here to go read the
                        Click here to proceed to register on the school portal.
                    </p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="https://portal.castobubra.edu.ng/" target="_blank" style="background: #164734;color: #ffffff;"
                   class="course__tab-inner custom-course__tab mb-10 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3 class="mb-0 text-uppercase text-white">Continue<br> Application</h3>
                    <hr class="w-100 text-light">
                    <p style="color: #227353;font-weight: 700;font-style: italic;">Click here to go read the
                        Click here to login your dashboard and continue your registration process.
                    </p>
                </a>
            </div>
        </div>
    </div>
@endsection
