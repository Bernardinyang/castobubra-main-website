@extends('layouts.website.sub_pages')

@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "Check your admission status at CAST Obubra. Enter your email and application code to view your admission status.",
        'title' => "Admission Checker - College of Agriculture, Science and Technology, Obubra",
    ])
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/application_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Admission Checker</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admission Checker</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    /* Enhanced Form Styling */
    .admission-checker-form {
        background: #ffffff;
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .admission-checker-form:hover {
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.12);
    }
    
    .contact__form-input {
        position: relative;
        margin-bottom: 25px;
    }
    
    .contact__form-input label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    .contact__form-input input {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #e1e8ed;
        border-radius: 10px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }
    
    .contact__form-input input:focus {
        outline: none;
        border-color: #227353;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(34, 115, 83, 0.1);
        transform: translateY(-2px);
    }
    
    .contact__form-input input.is-invalid {
        border-color: #dc3545;
        background: #fff5f5;
    }
    
    .contact__form-input input.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
    }
    
    .form-text {
        margin-top: 8px;
        font-size: 13px;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .form-text i {
        color: #227353;
    }
    
    /* Enhanced Button */
    #submitBtn {
        width: 100%;
        padding: 16px 30px;
        background: linear-gradient(135deg, #004829 0%, #009454 100%);
        border: none;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(34, 115, 83, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    #submitBtn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34, 115, 83, 0.4);
    }
    
    #submitBtn:active:not(:disabled) {
        transform: translateY(0);
    }
    
    #submitBtn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    #submitBtn .btn-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    /* Enhanced Error Messages */
    #errorMessage {
        background: linear-gradient(135deg, #fff5f5 0%, #ffe5e5 100%);
        border: 2px solid #dc3545;
        border-left: 5px solid #dc3545;
        padding: 16px 20px;
        border-radius: 10px;
        animation: slideDown 0.3s ease;
        margin-top: 20px;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    #errorMessage i {
        color: #dc3545;
        margin-right: 8px;
    }
    
    /* Enhanced Result Card */
    .admission-result-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        animation: fadeInUp 0.5s ease;
        border: 1px solid #e9ecef;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .admission-result-card h4 {
        color: #004829;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .admission-result-card h4 i {
        color: #009454;
        font-size: 28px;
    }
    
    .result-row {
        padding: 15px 0;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        align-items: center;
    }
    
    .result-row:last-child {
        border-bottom: none;
    }
    
    .result-label {
        font-weight: 600;
        color: #495057;
        width: 40%;
        font-size: 14px;
    }
    
    .result-value {
        color: #212529;
        font-weight: 500;
        width: 60%;
        font-size: 15px;
    }
    
    .result-value.code {
        font-family: 'Courier New', monospace;
        color: #227353;
        font-weight: 700;
        font-size: 18px;
        letter-spacing: 1px;
    }
    
    /* Enhanced Status Badges */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
    }
    
    .status-badge.admitted {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }
    
    .status-badge.rejected {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }
    
    .status-badge.under-review {
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        color: #000;
    }
    
    .status-badge.pending {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
        color: white;
    }
    
    /* Enhanced Alert Boxes */
    .status-alert {
        border-radius: 12px;
        padding: 20px;
        margin: 25px 0;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .status-alert.success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border-left: 5px solid #28a745;
    }
    
    .status-alert.danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        border-left: 5px solid #dc3545;
    }
    
    .status-alert.info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        border-left: 5px solid #17a2b8;
    }
    
    .status-alert h5 {
        font-weight: 700;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .admission-checker-form {
            padding: 25px;
        }
        
        .result-row {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .result-label,
        .result-value {
            width: 100%;
        }
        
        .result-label {
            margin-bottom: 5px;
        }
    }
    
    /* Loading Animation */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    
    .loading-spinner {
        text-align: center;
    }
    
    .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #227353;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
    <section class="contact__area">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-6">
                    <div class="contact__wrapper">
                        <div class="section__title-wrapper mb-25">
                            <h2 class="section__title">Check Your <span class="yellow-bg yellow-bg-big">Admission Status<img
                                        src="{{ asset('website_assets/img/shape/yellow-bg.png') }}" alt=""></span></h2>
                            <p class="mt-3" style="font-size: 16px; color: #6c757d;">Enter your email address and application code to check your admission status.</p>
                        </div>

                        <div class="admission-checker-form">
                            <form action="{{ route('website.admission_checker.check') }}" method="POST" id="admissionCheckerForm">
                                @csrf
                                
                                @if(session('status_message') && session('status_type') === 'danger')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px; margin-bottom: 25px; border-left: 5px solid #dc3545; padding: 16px 20px;">
                                        <i class="fas fa-exclamation-circle"></i> <strong>Error:</strong> {{ session('status_message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <label for="email">
                                                <i class="fas fa-envelope" style="color: #227353; margin-right: 6px;"></i>
                                                Email Address <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" id="email" name="email" placeholder="Enter the email you used to register" 
                                                   value="{{ old('email') }}" required class="@error('email') is-invalid @enderror">
                                            @error('email')
                                                <small class="text-danger d-block mt-2" style="display: flex; align-items: center; gap: 6px;">
                                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <label for="application_code">
                                                <i class="fas fa-key" style="color: #227353; margin-right: 6px;"></i>
                                                Application Code <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" id="application_code" name="application_code" placeholder="Enter your application code (e.g., ABC123XYZ)" 
                                                   value="{{ old('application_code') }}" required style="text-transform: uppercase;" class="@error('application_code') is-invalid @enderror">
                                            <small class="form-text">
                                                <i class="fas fa-info-circle"></i> Your application code was sent to your email after submission.
                                            </small>
                                            @error('application_code')
                                                <small class="text-danger d-block mt-2" style="display: flex; align-items: center; gap: 6px;">
                                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="contact__btn mt-4">
                                    <button type="submit" class="e-btn" id="submitBtn">
                                        <span class="btn-content">
                                            <i class="fas fa-search"></i>
                                            <span>Check Admission Status</span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                            
                            <div id="errorMessage" class="alert alert-danger mt-3" style="display: none;">
                                <i class="fas fa-exclamation-circle"></i> <strong>Error:</strong> <span id="errorText"></span>
                            </div>
                        </div>
                        
                        <!-- Result Container - Will be populated via AJAX -->
                        <div id="resultContainer"></div>

                        @if(isset($checked) && $checked && isset($application))
                            <div id="resultContainer">
                            <div class="admission-result-card">
                                <h4>
                                    <i class="fas fa-graduation-cap"></i> Admission Status Result
                                </h4>
                                
                                <div class="result-row">
                                    <div class="result-label">
                                        <i class="fas fa-hashtag" style="color: #227353; margin-right: 6px;"></i> Application Code:
                                    </div>
                                    <div class="result-value code">{{ $application->unique_id }}</div>
                                </div>
                                
                                <div class="result-row">
                                    <div class="result-label">
                                        <i class="fas fa-user" style="color: #227353; margin-right: 6px;"></i> Full Name:
                                    </div>
                                    <div class="result-value">{{ $application->full_name }}</div>
                                </div>
                                
                                <div class="result-row">
                                    <div class="result-label">
                                        <i class="fas fa-book" style="color: #227353; margin-right: 6px;"></i> Programme:
                                    </div>
                                    <div class="result-value">{{ $application->programme ? $application->programme->type . ' - ' . $application->programme->name : 'N/A' }}</div>
                                </div>
                                
                                <div class="result-row">
                                    <div class="result-label">
                                        <i class="fas fa-info-circle" style="color: #227353; margin-right: 6px;"></i> Status:
                                    </div>
                                    <div class="result-value">
                                        @if($application->status === 'accepted')
                                            <span class="status-badge admitted">
                                                <i class="fas fa-check-circle"></i> ADMITTED
                                            </span>
                                        @elseif($application->status === 'rejected')
                                            <span class="status-badge rejected">
                                                <i class="fas fa-times-circle"></i> NOT ADMITTED
                                            </span>
                                        @elseif($application->status === 'under_review')
                                            <span class="status-badge under-review">
                                                <i class="fas fa-clock"></i> UNDER REVIEW
                                            </span>
                                        @else
                                            <span class="status-badge pending">
                                                <i class="fas fa-hourglass-half"></i> PENDING
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if($application->status === 'accepted')
                                    <div class="status-alert success" role="alert">
                                        <h5 style="color: #155724;">
                                            <i class="fas fa-check-circle"></i> Congratulations!
                                        </h5>
                                        <p class="mb-0">You have been admitted to <strong>{{ config('mail.from.name', 'CAST Obubra') }}</strong>. Further instructions will be sent to your email address.</p>
                                    </div>
                                @elseif($application->status === 'rejected')
                                    <div class="status-alert danger" role="alert">
                                        <h5 style="color: #721c24;">
                                            <i class="fas fa-times-circle"></i> Admission Not Granted
                                        </h5>
                                        <p class="mb-0">Unfortunately, your application was not successful at this time.</p>
                                    </div>
                                @else
                                    <div class="status-alert info" role="alert">
                                        <h5 style="color: #0c5460;">
                                            <i class="fas fa-info-circle"></i> Application {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </h5>
                                        <p class="mb-0">Your application is currently being reviewed. You will be notified via email once a decision has been made.</p>
                                    </div>
                                @endif

                                @if($application->remarks)
                                    <div class="mt-4 p-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-left: 5px solid #227353; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                                        <strong style="color: #227353; display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                                            <i class="fas fa-comment-alt"></i> Remarks:
                                        </strong>
                                        <p class="mb-0" style="color: #495057; line-height: 1.6;">{{ $application->remarks }}</p>
                                    </div>
                                @endif

                                <div class="mt-4 pt-4" style="border-top: 2px solid #e9ecef; text-align: center;">
                                    <small style="color: #6c757d; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                        <i class="fas fa-calendar-alt"></i> Submitted: {{ $application->created_at->format('F d, Y') }}
                                    </small>
                                </div>
                            </div>
                            </div>
                        @endif
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
                                            <svg class="mail" viewBox="0 0 24 24">
                                                <path class="st0"
                                                      d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z"></path>
                                                <polyline class="st0" points="22,6 12,13 2,6 "></polyline>
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Need Help?</h4>
                                            <p>
                                                <a href="mailto:applications@castobubra.ng">applications@castobubra.ng</a>
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
                                            <h4>For Technical Support</h4>
                                            <p>
                                                <a href="https://wa.me/2348131913864" target="_blank" style="color: #227353; text-decoration: underline;">
                                                    WhatsApp (08131913864)
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Auto-uppercase application code input
    document.getElementById('application_code')?.addEventListener('input', function(e) {
        this.value = this.value.toUpperCase();
    });

    // Form submission with AJAX
    const form = document.getElementById('admissionCheckerForm');
    const submitBtn = document.getElementById('submitBtn');
    const errorMessageDiv = document.getElementById('errorMessage');
    const errorText = document.getElementById('errorText');
    
    let formSubmitHandler = function(e) {
        e.preventDefault();
        
        const emailInput = document.getElementById('email');
        const applicationCodeInput = document.getElementById('application_code');
        const email = emailInput.value.trim();
        const applicationCode = applicationCodeInput.value.trim();
        
        // Preserve field values explicitly
        const preservedEmail = email;
        const preservedCode = applicationCode;
        
        // Hide previous error and clear previous results (but keep form fields)
        errorMessageDiv.style.display = 'none';
        document.getElementById('resultContainer').innerHTML = '';
        
        // Basic validation
        if (!email || !applicationCode) {
            showError('Please fill in all required fields');
            // Ensure fields are still filled
            if (!emailInput.value) emailInput.value = preservedEmail;
            if (!applicationCodeInput.value) applicationCodeInput.value = preservedCode;
            return false;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showError('Please enter a valid email address');
            // Ensure fields are still filled
            if (!emailInput.value) emailInput.value = preservedEmail;
            if (!applicationCodeInput.value) applicationCodeInput.value = preservedCode;
            return false;
        }
        
        // Show loading state (but don't clear form fields)
        submitBtn.disabled = true;
        submitBtn.querySelector('.btn-content').innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Checking...</span>';
        
        // Submit form via AJAX
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(async response => {
            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || 'An error occurred');
                }
                return data;
            } else {
                // If not JSON, it's probably an HTML error page
                const text = await response.text();
                throw new Error('Server returned an unexpected response. Please try again.');
            }
        })
        .then(data => {
            if (data.success && data.application) {
                // Success - display result without reloading
                // Ensure form fields remain filled
                if (emailInput.value !== preservedEmail) emailInput.value = preservedEmail;
                if (applicationCodeInput.value !== preservedCode) applicationCodeInput.value = preservedCode;
                
                displayResult(data.application);
                submitBtn.disabled = false;
                submitBtn.querySelector('.btn-content').innerHTML = '<i class="fas fa-search"></i> <span>Check Admission Status</span>';
                // Scroll to result
                setTimeout(() => {
                    document.getElementById('resultContainer').scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            } else {
                // Ensure form fields remain filled
                if (emailInput.value !== preservedEmail) emailInput.value = preservedEmail;
                if (applicationCodeInput.value !== preservedCode) applicationCodeInput.value = preservedCode;
                
                showError(data.message || 'An error occurred while checking your admission status.');
                submitBtn.disabled = false;
                submitBtn.querySelector('.btn-content').innerHTML = '<i class="fas fa-search"></i> <span>Check Admission Status</span>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Ensure form fields remain filled
            if (emailInput.value !== preservedEmail) emailInput.value = preservedEmail;
            if (applicationCodeInput.value !== preservedCode) applicationCodeInput.value = preservedCode;
            
            // Handle different error types
            let errorMessage = 'No application found with the provided email and application code. Please check your details and try again.';
            if (error.message && !error.message.includes('Server returned')) {
                errorMessage = error.message;
            }
            showError(errorMessage);
            submitBtn.disabled = false;
            submitBtn.querySelector('.btn-content').innerHTML = '<i class="fas fa-search"></i> <span>Check Admission Status</span>';
        });
    };
    
    form?.addEventListener('submit', formSubmitHandler);
    
    function showError(message) {
        errorText.textContent = message;
        errorMessageDiv.style.display = 'block';
        // Clear any previous results
        document.getElementById('resultContainer').innerHTML = '';
        // Scroll to error with smooth animation
        setTimeout(() => {
            errorMessageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 100);
    }
    
    function displayResult(application) {
        const resultContainer = document.getElementById('resultContainer');
        
        // Determine status badge
        let statusBadge = '';
        let statusClass = '';
        let statusIcon = '';
        let statusText = '';
        
        if (application.status === 'accepted') {
            statusClass = 'admitted';
            statusIcon = 'fas fa-check-circle';
            statusText = 'ADMITTED';
        } else if (application.status === 'rejected') {
            statusClass = 'rejected';
            statusIcon = 'fas fa-times-circle';
            statusText = 'NOT ADMITTED';
        } else if (application.status === 'under_review') {
            statusClass = 'under-review';
            statusIcon = 'fas fa-clock';
            statusText = 'UNDER REVIEW';
        } else {
            statusClass = 'pending';
            statusIcon = 'fas fa-hourglass-half';
            statusText = 'PENDING';
        }
        
        statusBadge = `<span class="status-badge ${statusClass}"><i class="${statusIcon}"></i> ${statusText}</span>`;
        
        // Determine alert box
        const schoolName = @json(config('mail.from.name', 'CAST Obubra'));
        let alertBox = '';
        if (application.status === 'accepted') {
            alertBox = `
                <div class="status-alert success" role="alert">
                    <h5 style="color: #155724;">
                        <i class="fas fa-check-circle"></i> Congratulations!
                    </h5>
                    <p class="mb-0">You have been admitted to <strong>${escapeHtml(schoolName)}</strong>. Further instructions will be sent to your email address.</p>
                </div>
            `;
        } else if (application.status === 'rejected') {
            alertBox = `
                <div class="status-alert danger" role="alert">
                    <h5 style="color: #721c24;">
                        <i class="fas fa-times-circle"></i> Admission Not Granted
                    </h5>
                    <p class="mb-0">Unfortunately, your application was not successful at this time.</p>
                </div>
            `;
        } else {
            const statusDisplay = application.status.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
            alertBox = `
                <div class="status-alert info" role="alert">
                    <h5 style="color: #0c5460;">
                        <i class="fas fa-info-circle"></i> Application ${statusDisplay}
                    </h5>
                    <p class="mb-0">Your application is currently being reviewed. You will be notified via email once a decision has been made.</p>
                </div>
            `;
        }
        
        // Remarks section
        const remarksSection = application.remarks ? `
            <div class="mt-4 p-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-left: 5px solid #227353; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <strong style="color: #227353; display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                    <i class="fas fa-comment-alt"></i> Remarks:
                </strong>
                <p class="mb-0" style="color: #495057; line-height: 1.6;">${escapeHtml(application.remarks)}</p>
            </div>
        ` : '';
        
        // Build HTML
        const html = `
            <div class="admission-result-card">
                <h4>
                    <i class="fas fa-graduation-cap"></i> Admission Status Result
                </h4>
                
                <div class="result-row">
                    <div class="result-label">
                        <i class="fas fa-hashtag" style="color: #227353; margin-right: 6px;"></i> Application Code:
                    </div>
                    <div class="result-value code">${escapeHtml(application.unique_id)}</div>
                </div>
                
                <div class="result-row">
                    <div class="result-label">
                        <i class="fas fa-user" style="color: #227353; margin-right: 6px;"></i> Full Name:
                    </div>
                    <div class="result-value">${escapeHtml(application.full_name)}</div>
                </div>
                
                <div class="result-row">
                    <div class="result-label">
                        <i class="fas fa-book" style="color: #227353; margin-right: 6px;"></i> Programme:
                    </div>
                    <div class="result-value">${escapeHtml(application.programme)}</div>
                </div>
                
                <div class="result-row">
                    <div class="result-label">
                        <i class="fas fa-info-circle" style="color: #227353; margin-right: 6px;"></i> Status:
                    </div>
                    <div class="result-value">
                        ${statusBadge}
                    </div>
                </div>

                ${alertBox}
                ${remarksSection}

                <div class="mt-4 pt-4" style="border-top: 2px solid #e9ecef; text-align: center;">
                    <small style="color: #6c757d; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        <i class="fas fa-calendar-alt"></i> Submitted: ${escapeHtml(application.created_at)}
                    </small>
                </div>
            </div>
        `;
        
        resultContainer.innerHTML = html;
    }
    
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Add input focus animations
    document.querySelectorAll('.contact__form-input input').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.01)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });
</script>
@endsection
