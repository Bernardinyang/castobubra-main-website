@extends('layouts.website.sub_pages')

@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/application_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Application Form</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Application Form</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="contact__area">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-6">
                    <div class="contact__wrapper">
                        <div class="section__title-wrapper mb-25">
                            <h2 class="section__title">Fill required <span class="yellow-bg yellow-bg-big">information below<img
                                        src="{{ asset('website_assets/img/shape/yellow-bg.png') }}" alt=""></span></h2>
                        </div>
                        


                        <div class="contact__form application-form">
                            <form action="{{ route('website.application.store') }}" method="POST" enctype="multipart/form-data" id="applicationForm">
                                @csrf
                                
                                <!-- Section 1: Personal Information -->
                                <div class="form-section">
                                    <div class="form-section-header">
                                        <div class="section-number">1</div>
                                        <div class="section-title-wrapper">
                                            <h4 class="section-title">Personal Information</h4>
                                            <p class="section-subtitle">Please provide your personal details</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="surname">Surname <span class="text-danger">*</span></label>
                                                <input type="text" id="surname" placeholder="Enter your surname" name="surname" 
                                                       value="{{ old('surname') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="first_name">First Name <span class="text-danger">*</span></label>
                                                <input type="text" id="first_name" placeholder="Enter your first name" name="first_name"
                                                       value="{{ old('first_name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="other_name">Other Name</label>
                                                <input type="text" id="other_name" placeholder="Enter other name (optional)" name="other_name"
                                                       value="{{ old('other_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="email">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" id="email" placeholder="example@email.com" name="email"
                                                       value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="phone_number">Phone Number <span class="text-danger">*</span></label>
                                                <input type="text" id="phone_number" placeholder="+234 800 000 0000" name="phone_number"
                                                       value="{{ old('phone_number') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="gender">Gender</label>
                                                <select id="gender" name="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="marital_status">Marital Status</label>
                                                <select id="marital_status" name="marital_status" class="form-control">
                                                    <option value="">Select Marital Status</option>
                                                    <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                                    <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                                    <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                    <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="state_of_origin">State of Origin</label>
                                                <input type="text" id="state_of_origin" placeholder="Enter your state" name="state_of_origin"
                                                       value="{{ old('state_of_origin') }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <label for="local_government">Local Government of Origin</label>
                                                <input type="text" id="local_government" placeholder="Enter your LGA" name="local_government"
                                                       value="{{ old('local_government') }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="contact__form-input">
                                                <label for="current_address">Current Address</label>
                                                <textarea id="current_address" placeholder="Enter your complete current address" name="current_address" rows="4">{{ old('current_address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 2: Programme Selection -->
                                <div class="form-section">
                                    <div class="form-section-header">
                                        <div class="section-number">2</div>
                                        <div class="section-title-wrapper">
                                            <h4 class="section-title">Programme Selection</h4>
                                            <p class="section-subtitle">Choose your preferred programme</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xxl-12">
                                            <div class="contact__form-input">
                                                <label for="programme_id">Select Programme of Choice <span class="text-danger">*</span></label>
                                                <select id="programme_id" name="programme_id" class="form-control" required>
                                                    <option value="">-- Select Programme --</option>
                                                    @foreach($programmes as $programme)
                                                        <option value="{{ $programme->id }}" {{ old('programme_id') == $programme->id ? 'selected' : '' }}>
                                                            {{ $programme->type }} - {{ $programme->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="form-text text-muted mt-2">
                                                    <i class="fas fa-info-circle"></i> 
                                                    <a href="{{ route('website.requirement') }}" target="_blank" style="color: #227353;">View course requirements</a>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 3: Document Uploads -->
                                <div class="form-section">
                                    <div class="form-section-header">
                                        <div class="section-number">3</div>
                                        <div class="section-title-wrapper">
                                            <h4 class="section-title">Document Uploads</h4>
                                            <p class="section-subtitle">Upload required documents</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input file-upload-wrapper">
                                                <label for="ssce_certificate">
                                                    <i class="fas fa-file-pdf"></i> SSCE Certificate <span class="text-danger">*</span>
                                                </label>
                                                <div class="file-input-container">
                                                    <input type="file" id="ssce_certificate" name="ssce_certificate" accept=".pdf,.jpg,.jpeg,.png" required class="file-input">
                                                    <label for="ssce_certificate" class="file-label">
                                                        <span class="file-label-text">Choose File</span>
                                                        <span class="file-label-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                                    </label>
                                                    <div class="file-name-display" id="ssce_file_name"></div>
                                                    <div class="file-preview" id="ssce_preview"></div>
                                                </div>
                                                <small class="form-text text-muted">
                                                    <i class="fas fa-info-circle"></i> Max: 5MB (PDF, JPG, PNG)
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input file-upload-wrapper">
                                                <label for="birth_certificate">
                                                    <i class="fas fa-file-pdf"></i> Birth Certificate or Age Declaration <span class="text-danger">*</span>
                                                </label>
                                                <div class="file-input-container">
                                                    <input type="file" id="birth_certificate" name="birth_certificate" accept=".pdf,.jpg,.jpeg,.png" required class="file-input">
                                                    <label for="birth_certificate" class="file-label">
                                                        <span class="file-label-text">Choose File</span>
                                                        <span class="file-label-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                                    </label>
                                                    <div class="file-name-display" id="birth_file_name"></div>
                                                    <div class="file-preview" id="birth_preview"></div>
                                                </div>
                                                <small class="form-text text-muted">
                                                    <i class="fas fa-info-circle"></i> Max: 5MB (PDF, JPG, PNG)
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input file-upload-wrapper">
                                                <label for="passport_photograph">
                                                    <i class="fas fa-image"></i> Passport Photograph <span class="text-danger">*</span>
                                                </label>
                                                <div class="file-input-container">
                                                    <input type="file" id="passport_photograph" name="passport_photograph" accept=".jpg,.jpeg,.png" required class="file-input">
                                                    <label for="passport_photograph" class="file-label">
                                                        <span class="file-label-text">Choose File</span>
                                                        <span class="file-label-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                                    </label>
                                                    <div class="file-name-display" id="passport_file_name"></div>
                                                    <div class="file-preview" id="passport_preview"></div>
                                                </div>
                                                <small class="form-text text-muted">
                                                    <i class="fas fa-info-circle"></i> Max: 2MB (JPG, PNG) - White background preferred
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input file-upload-wrapper">
                                                <label for="evidence_of_payment">
                                                    <i class="fas fa-receipt"></i> Evidence of Payment <span class="text-danger">*</span>
                                                </label>
                                                <div class="file-input-container">
                                                    <input type="file" id="evidence_of_payment" name="evidence_of_payment" accept=".pdf,.jpg,.jpeg,.png" required class="file-input">
                                                    <label for="evidence_of_payment" class="file-label">
                                                        <span class="file-label-text">Choose File</span>
                                                        <span class="file-label-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                                    </label>
                                                    <div class="file-name-display" id="payment_file_name"></div>
                                                    <div class="file-preview" id="payment_preview"></div>
                                                </div>
                                                <small class="form-text text-muted">
                                                    <i class="fas fa-info-circle"></i> Max: 5MB (PDF, JPG, PNG)
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="contact__form-input file-upload-wrapper">
                                                <label for="other_uploads">
                                                    <i class="fas fa-file-upload"></i> Other Uploads (if any)
                                                </label>
                                                <div class="file-input-container">
                                                    <input type="file" id="other_uploads" name="other_uploads" accept=".pdf,.jpg,.jpeg,.png" class="file-input">
                                                    <label for="other_uploads" class="file-label">
                                                        <span class="file-label-text">Choose File (Optional)</span>
                                                        <span class="file-label-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                                    </label>
                                                    <div class="file-name-display" id="other_file_name"></div>
                                                    <div class="file-preview" id="other_preview"></div>
                                                </div>
                                                <small class="form-text text-muted">
                                                    <i class="fas fa-info-circle"></i> Max: 5MB (PDF, JPG, PNG)
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="">
                                    <div class="contact__btn">
                                        <button type="submit" class="e-btn application-submit-btn" {{ !$isAdmissionOpen ? 'disabled' : '' }}>
                                            <span class="btn-content">
                                                <i class="fas fa-paper-plane"></i>
                                                <span>{{ $isAdmissionOpen ? 'Submit Application' : 'Admission is Closed' }}</span>
                                            </span>
                                            <span class="btn-loader" style="display: none;">
                                                <i class="fas fa-spinner fa-spin"></i>
                                                <span>Submitting...</span>
                                            </span>
                                        </button>
                                        <p class="form-note mt-3">
                                            <i class="fas fa-shield-alt"></i> Your information is secure and will be kept confidential
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                    <div class="contact__info white-bg p-relative z-index-1">
                        <div class="contact__shape">
                            <img class="contact-shape-1"
                                 src="{{ asset('website_assets/img/contact/contact-shape-1.png') }}" alt="">
                            <img class="contact-shape-2"
                                 src="{{ asset('website_assets/img/contact/contact-shape-2.png') }}" alt="">
                            <img class="contact-shape-3"
                                 src="{{ asset('website_assets/img/contact/contact-shape-3.png') }}" alt="">
                        </div>
                        <div class="contact__info-inner white-bg">
                            <ul>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="map" viewBox="0 0 24 24">
                                                <path class="st0"
                                                      d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z"></path>
                                                <circle class="st0" cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Click to view your preferred course Requirement</h4>
                                            <p>
                                                <a href="{{ route('website.requirement') }}" target="_blank" style="color: #227353; text-decoration: underline;">
                                                    View Course Requirements
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="call" viewBox="0 0 24 24">
                                                <path class="st0"
                                                      d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z"></path>
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>For Technical Support, Chat Us on</h4>
                                            <p>
                                                <a href="https://wa.me/2348131913864" target="_blank" style="color: #227353; text-decoration: underline;">
                                                    WhatsApp (08131913864)
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-35">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="mail" viewBox="0 0 24 24">
                                                <path class="st0"
                                                      d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z"></path>
                                                <polyline class="st0" points="22,6 12,13 2,6 "></polyline>
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>General Enquiries</h4>
                                            <p>
                                                <a href="mailto:enquiries@castobubra.ng">enquiries@castobubra.ng</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="contact__social pl-30">
                                <h4>Follow Us</h4>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/castobubra" target="_blank" class="fb"><i class="social_facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/castobubra" target="_blank" class="tw"><i class="social_twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/castobubra" target="_blank" class="pin"><i class="social_instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content application-modal">
                <div class="modal-body text-center">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4 class="modal-title" id="successModalLabel">Application Submitted!</h4>
                    <p class="modal-message" id="successModalMessage"></p>
                    <button type="button" class="btn btn-success modal-close-btn" data-bs-dismiss="modal">
                        <i class="fas fa-check"></i> OK
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Modal -->
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content application-modal">
                <div class="modal-body text-center">
                    <div class="loading-spinner">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <h4 class="modal-title">Submitting Application...</h4>
                    <p class="modal-message">Please wait while we process your application. Do not close this window.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content application-modal error-modal">
                <div class="modal-body">
                    <div class="error-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h4 class="modal-title text-center" id="errorModalLabel">Validation Errors</h4>
                    <p class="modal-message text-center mb-3">Please correct the following errors and try again:</p>
                    <div class="error-list" id="errorModalList">
                        <ul class="mb-0">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-danger modal-close-btn error-close-btn" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // File upload display and preview
    document.querySelectorAll('.file-input').forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            const fileName = file.name;
            const displayId = this.id + '_file_name';
            
            // Map input IDs to preview IDs
            const previewIdMap = {
                'ssce_certificate': 'ssce_preview',
                'birth_certificate': 'birth_preview',
                'passport_photograph': 'passport_preview',
                'evidence_of_payment': 'payment_preview',
                'other_uploads': 'other_preview'
            };
            
            const previewId = previewIdMap[this.id] || (this.id + '_preview');
            const display = document.getElementById(displayId);
            const preview = document.getElementById(previewId);
            
            // Show file name
            if (display) {
                display.innerHTML = '<i class="fas fa-check-circle"></i> ' + fileName;
                display.classList.add('show');
            }
            
            // Show preview for images
            if (preview) {
                preview.innerHTML = ''; // Clear previous preview
                
                // Check if file is an image
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'preview-image';
                        img.alt = fileName;
                        
                        const previewContainer = document.createElement('div');
                        previewContainer.className = 'preview-container';
                        previewContainer.appendChild(img);
                        
                        const removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.className = 'preview-remove';
                        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                        removeBtn.title = 'Remove preview';
                        removeBtn.onclick = function() {
                            preview.innerHTML = '';
                            preview.classList.remove('show');
                            input.value = '';
                            if (display) {
                                display.innerHTML = '';
                                display.classList.remove('show');
                            }
                        };
                        previewContainer.appendChild(removeBtn);
                        
                        preview.appendChild(previewContainer);
                        preview.classList.add('show');
                    };
                    reader.readAsDataURL(file);
                } else if (file.type === 'application/pdf') {
                    // Show PDF icon for PDF files
                    const pdfContainer = document.createElement('div');
                    pdfContainer.className = 'preview-container pdf-preview';
                    pdfContainer.innerHTML = `
                        <div class="pdf-icon">
                            <i class="fas fa-file-pdf"></i>
                            <span>PDF File</span>
                        </div>
                        <button type="button" class="preview-remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    
                    pdfContainer.querySelector('.preview-remove').onclick = function() {
                        preview.innerHTML = '';
                        preview.classList.remove('show');
                        input.value = '';
                        if (display) {
                            display.innerHTML = '';
                            display.classList.remove('show');
                        }
                    };
                    
                    preview.appendChild(pdfContainer);
                    preview.classList.add('show');
                }
            }
        });
    });

    // Form submission loading state
    const form = document.getElementById('applicationForm');
    const loadingModalElement = document.getElementById('loadingModal');
    let loadingModal = null;
    
    if (loadingModalElement) {
        loadingModal = new bootstrap.Modal(loadingModalElement);
    }
    
    form?.addEventListener('submit', function(e) {
        const submitBtn = document.querySelector('.application-submit-btn');
        if (submitBtn && !submitBtn.disabled && loadingModal) {
            // Show loading modal
            loadingModal.show();
            submitBtn.disabled = true;
        }
    });

    // Check for errors and show error modal
    @if($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            // Close loading modal if open
            if (loadingModal) {
                loadingModal.hide();
            }
            
            // Show error modal
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    @endif

    // Check for success message and show modal
    @if(session('status_type') && session('status_message'))
        @if(session('status_type') === 'success')
            document.addEventListener('DOMContentLoaded', function() {
                // Close loading modal if open
                if (loadingModal) {
                    loadingModal.hide();
                }
                
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                const messageElement = document.getElementById('successModalMessage');
                if (messageElement) {
                    messageElement.textContent = '{{ session('status_message') }}';
                }
                successModal.show();
            });
        @elseif(session('status_type') === 'danger')
            document.addEventListener('DOMContentLoaded', function() {
                // Close loading modal if open
                if (loadingModal) {
                    loadingModal.hide();
                }
                
                // Show error modal with custom message
                const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                const errorList = document.getElementById('errorModalList');
                if (errorList) {
                    errorList.innerHTML = '<ul class="mb-0"><li>{{ session('status_message') }}</li></ul>';
                }
                errorModal.show();
            });
        @endif
    @endif

    // Phone number formatting
    document.getElementById('phone_number')?.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.startsWith('234')) {
            value = '+' + value;
        } else if (value.startsWith('0')) {
            value = '+234' + value.substring(1);
        } else if (value && !value.startsWith('+')) {
            value = '+234' + value;
        }
        e.target.value = value;
    });
</script>
@endsection

