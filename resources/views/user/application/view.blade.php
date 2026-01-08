@extends('layouts.app')

@section('styles')
<style>
    /* Modern Application Detail Styles */
    .application-header {
        background: linear-gradient(135deg, #004829 0%, #009454 100%);
        border-radius: 12px;
        padding: 25px 30px;
        margin-bottom: 30px;
        color: white;
        box-shadow: 0 4px 20px rgba(0, 72, 41, 0.2);
    }
    
    .application-header h3 {
        color: white;
        margin: 0;
        font-weight: 600;
        font-size: 24px;
    }
    
    .application-header .badge {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 12px;
    }
    
    .info-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        border: none;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }
    
    .info-card:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }
    
    .info-card .card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 3px solid #227353;
        padding: 18px 25px;
        border-radius: 12px 12px 0 0;
    }
    
    .info-card .card-header h5 {
        margin: 0;
        color: #004829;
        font-weight: 700;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .info-card .card-header h5 i {
        color: #009454;
        font-size: 20px;
    }
    
    .info-item {
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .info-item:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .info-value {
        font-size: 15px;
        color: #212529;
        font-weight: 500;
    }
    
    .info-value a {
        color: #227353;
        text-decoration: none;
        transition: all 0.2s;
    }
    
    .info-value a:hover {
        color: #004829;
        text-decoration: underline;
    }
    
    .status-badge-modern {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .status-badge-modern.pending {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
        color: white;
    }
    
    .status-badge-modern.under_review {
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        color: #000;
    }
    
    .status-badge-modern.accepted {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }
    
    .status-badge-modern.rejected {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }
    
    .document-card {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        height: 100%;
    }
    
    .document-card:hover {
        background: #e9ecef;
        border-color: #227353;
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .document-card .doc-label {
        font-size: 13px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .document-card img {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .document-card:hover img {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    
    .status-form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        border: none;
        margin-bottom: 25px;
    }
    
    .status-form-card .card-header {
        background: linear-gradient(135deg, #227353 0%, #009454 100%);
        color: white;
        padding: 18px 25px;
        border-radius: 12px 12px 0 0;
    }
    
    .status-form-card .card-header h5 {
        margin: 0;
        color: white;
        font-weight: 700;
    }
    
    .form-control:focus {
        border-color: #227353;
        box-shadow: 0 0 0 0.2rem rgba(34, 115, 83, 0.25);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #004829 0%, #009454 100%);
        border: none;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(34, 115, 83, 0.4);
    }
    
    .quick-info-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
        border-left: 4px solid #227353;
    }
    
    .quick-info-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .quick-info-item:last-child {
        border-bottom: none;
    }
    
    .quick-info-item i {
        color: #227353;
        font-size: 18px;
        width: 24px;
    }
    
    .quick-info-item .info-text {
        flex: 1;
    }
    
    .quick-info-item .info-label {
        font-size: 11px;
        text-transform: uppercase;
        color: #6c757d;
        font-weight: 600;
        margin-bottom: 3px;
    }
    
    .quick-info-item .info-value {
        font-size: 14px;
        color: #212529;
        font-weight: 600;
    }
    
    .check-history-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        border: none;
        margin-top: 30px;
    }
    
    .check-history-card .card-header {
        background: linear-gradient(135deg, #004829 0%, #009454 100%);
        color: white;
        padding: 20px 25px;
        border-radius: 12px 12px 0 0;
    }
    
    .check-history-card .card-header h5 {
        margin: 0;
        color: white;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .check-history-card .card-header .badge {
        background: rgba(255, 255, 255, 0.3);
        color: white;
    }
    
    .check-history-table {
        margin: 0;
    }
    
    .check-history-table thead {
        background: #f8f9fa;
    }
    
    .check-history-table thead th {
        border-bottom: 2px solid #dee2e6;
        font-weight: 700;
        color: #495057;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        padding: 15px;
    }
    
    .check-history-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .check-history-table tbody tr:hover {
        background: #f8f9fa;
        transform: scale(1.01);
    }
    
    .check-history-table tbody td {
        padding: 15px;
        vertical-align: middle;
    }
    
    .pagination-wrapper {
        display: flex;
        justify-content: center;
    }
    
    .pagination-wrapper .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        justify-content: center;
        align-items: center;
        gap: 4px;
    }
    
    .pagination-wrapper .pagination .page-item {
        margin: 0;
    }
    
    .pagination-wrapper .pagination .page-link {
        color: #227353;
        border: 1px solid #e5e9f2;
        background-color: #fff;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        min-width: 32px;
        height: 32px;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 500;
        line-height: 1.2;
    }
    
    /* Previous and Next buttons styling */
    .pagination-wrapper .pagination .page-item:first-child .page-link,
    .pagination-wrapper .pagination .page-item:last-child .page-link {
        padding: 0.375rem 1rem;
        min-width: auto;
        font-weight: 600;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-color: #dee2e6;
    }
    
    .pagination-wrapper .pagination .page-link:hover:not(.disabled) {
        background: linear-gradient(135deg, #004829 0%, #009454 100%);
        color: white;
        border-color: #227353;
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(34, 115, 83, 0.25);
    }
    
    .pagination-wrapper .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #004829 0%, #009454 100%);
        border-color: #227353;
        color: white;
        z-index: 1;
        font-weight: 600;
    }
    
    .pagination-wrapper .pagination .page-item.disabled .page-link {
        color: #adb5bd;
        background-color: #f8f9fa;
        border-color: #e9ecef;
        cursor: not-allowed;
        pointer-events: none;
        opacity: 0.7;
    }
    
    .pagination-wrapper .pagination .page-item.disabled .page-link:hover {
        transform: none;
        box-shadow: none;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #adb5bd;
    }
    
    /* Remove arrow symbols, keep text only */
    .pagination-wrapper .pagination .page-link::before,
    .pagination-wrapper .pagination .page-link::after {
        display: none;
    }
    
    .pagination-info {
        font-size: 0.75rem;
    }
    
    @media (max-width: 768px) {
        .application-header {
            padding: 20px;
        }
        
        .info-card .card-header {
            padding: 15px 20px;
        }
        
        .document-card {
            margin-bottom: 20px;
        }
        
        .pagination .page-link {
            padding: 8px 12px;
            font-size: 14px;
        }
    }
</style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <!-- Modern Header -->
                <div class="application-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h3>
                                <i class="icon ni ni-file-text"></i> Application Details
                                <span class="badge">{{ $application->unique_id }}</span>
                            </h3>
                            <p class="mb-0 mt-2" style="opacity: 0.9;">
                                <i class="icon ni ni-user"></i> {{ $application->full_name }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('application.index') }}" class="btn btn-light">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Back to List</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    @if(session('status_type') && session('status_message'))
                        <div class="alert alert-pro alert-{{ session('status_type') }} alert-dismissible fade show" role="alert">
                            <div class="alert-text">
                                <h6>{{ ucfirst(session('status_type')) }}</h6>
                                <p>{{ session('status_message') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Personal Information Card -->
                            <div class="info-card card">
                                <div class="card-header">
                                    <h5>
                                        <i class="icon ni ni-user"></i> Personal Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="info-item">
                                                <div class="info-label">Surname</div>
                                                <div class="info-value">{{ $application->surname }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="info-item">
                                                <div class="info-label">First Name</div>
                                                <div class="info-value">{{ $application->first_name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="info-item">
                                                <div class="info-label">Other Name</div>
                                                <div class="info-value">{{ $application->other_name ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-item">
                                                <div class="info-label">
                                                    <i class="icon ni ni-mail"></i> Email
                                                </div>
                                                <div class="info-value">
                                                    <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-item">
                                                <div class="info-label">
                                                    <i class="icon ni ni-call"></i> Phone Number
                                                </div>
                                                <div class="info-value">
                                                    <a href="tel:{{ $application->phone_number }}">{{ $application->phone_number }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-item">
                                                <div class="info-label">Gender</div>
                                                <div class="info-value">{{ $application->gender ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-item">
                                                <div class="info-label">Marital Status</div>
                                                <div class="info-value">{{ $application->marital_status ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-item">
                                                <div class="info-label">State of Origin</div>
                                                <div class="info-value">{{ $application->state_of_origin ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-item">
                                                <div class="info-label">Local Government</div>
                                                <div class="info-value">{{ $application->local_government ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="info-item">
                                                <div class="info-label">
                                                    <i class="icon ni ni-map-pin"></i> Current Address
                                                </div>
                                                <div class="info-value">{{ $application->current_address ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Document Uploads Card -->
                            <div class="info-card card">
                                <div class="card-header">
                                    <h5>
                                        <i class="icon ni ni-file-docs"></i> Document Uploads
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="document-card">
                                                <div class="doc-label">
                                                    <i class="icon ni ni-file-text"></i> SSCE Certificate
                                                </div>
                                            @if($application->ssce_certificate)
                                                @php
                                                    $sscePath = asset('website_assets/uploads/applications/ssce/' . $application->ssce_certificate);
                                                    $ssceExt = strtolower(pathinfo($application->ssce_certificate, PATHINFO_EXTENSION));
                                                    $isSsceImage = in_array($ssceExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isSsceImage)
                                                        <a href="{{ $sscePath }}" data-fancybox="documents" data-caption="SSCE Certificate">
                                                            <img src="{{ $sscePath }}" alt="SSCE Certificate" style="max-width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; cursor: pointer;">
                                                        </a>
                                                    @else
                                                        <a href="{{ $sscePath }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                            <i class="icon ni ni-file-pdf"></i> View PDF
                                                        </a>
                                                    @endif
                                                @else
                                                    <div class="text-muted py-3">
                                                        <i class="icon ni ni-cross-circle" style="font-size: 32px;"></i>
                                                        <p class="mb-0 mt-2">Not uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="document-card">
                                                <div class="doc-label">
                                                    <i class="icon ni ni-file-text"></i> Birth Certificate
                                                </div>
                                            @if($application->birth_certificate)
                                                @php
                                                    $birthPath = asset('website_assets/uploads/applications/birth/' . $application->birth_certificate);
                                                    $birthExt = strtolower(pathinfo($application->birth_certificate, PATHINFO_EXTENSION));
                                                    $isBirthImage = in_array($birthExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isBirthImage)
                                                        <a href="{{ $birthPath }}" data-fancybox="documents" data-caption="Birth Certificate">
                                                            <img src="{{ $birthPath }}" alt="Birth Certificate" style="max-width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; cursor: pointer;">
                                                        </a>
                                                    @else
                                                        <a href="{{ $birthPath }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                            <i class="icon ni ni-file-pdf"></i> View PDF
                                                        </a>
                                                    @endif
                                                @else
                                                    <div class="text-muted py-3">
                                                        <i class="icon ni ni-cross-circle" style="font-size: 32px;"></i>
                                                        <p class="mb-0 mt-2">Not uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="document-card">
                                                <div class="doc-label">
                                                    <i class="icon ni ni-image"></i> Passport Photograph
                                                </div>
                                            @if($application->passport_photograph)
                                                @php
                                                    $passportPath = asset('website_assets/uploads/applications/passport/' . $application->passport_photograph);
                                                @endphp
                                                    <a href="{{ $passportPath }}" data-fancybox="documents" data-caption="Passport Photograph">
                                                        <img src="{{ $passportPath }}" alt="Passport Photograph" style="max-width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; cursor: pointer;">
                                                    </a>
                                            @else
                                                    <div class="text-muted py-3">
                                                        <i class="icon ni ni-cross-circle" style="font-size: 32px;"></i>
                                                        <p class="mb-0 mt-2">Not uploaded</p>
                                                    </div>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="document-card">
                                                <div class="doc-label">
                                                    <i class="icon ni ni-file-text"></i> Evidence of Payment
                                                </div>
                                            @if($application->evidence_of_payment)
                                                @php
                                                    $paymentPath = asset('website_assets/uploads/applications/payment/' . $application->evidence_of_payment);
                                                    $paymentExt = strtolower(pathinfo($application->evidence_of_payment, PATHINFO_EXTENSION));
                                                    $isPaymentImage = in_array($paymentExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isPaymentImage)
                                                        <a href="{{ $paymentPath }}" data-fancybox="documents" data-caption="Evidence of Payment">
                                                            <img src="{{ $paymentPath }}" alt="Evidence of Payment" style="max-width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; cursor: pointer;">
                                                        </a>
                                                    @else
                                                        <a href="{{ $paymentPath }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                            <i class="icon ni ni-file-pdf"></i> View PDF
                                                        </a>
                                                    @endif
                                                @else
                                                    <div class="text-muted py-3">
                                                        <i class="icon ni ni-cross-circle" style="font-size: 32px;"></i>
                                                        <p class="mb-0 mt-2">Not uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="document-card">
                                                <div class="doc-label">
                                                    <i class="icon ni ni-file-text"></i> JAMB Result
                                                </div>
                                            @if($application->jamb_result)
                                                @php
                                                    $jambPath = asset('website_assets/uploads/applications/jamb/' . $application->jamb_result);
                                                    $jambExt = strtolower(pathinfo($application->jamb_result, PATHINFO_EXTENSION));
                                                    $isJambImage = in_array($jambExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isJambImage)
                                                        <a href="{{ $jambPath }}" data-fancybox="documents" data-caption="JAMB Result">
                                                            <img src="{{ $jambPath }}" alt="JAMB Result" style="max-width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; cursor: pointer;">
                                                        </a>
                                                    @else
                                                        <a href="{{ $jambPath }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                            <i class="icon ni ni-file-pdf"></i> View PDF
                                                        </a>
                                                    @endif
                                                @else
                                                    <div class="text-muted py-3">
                                                        <i class="icon ni ni-cross-circle" style="font-size: 32px;"></i>
                                                        <p class="mb-0 mt-2">Not uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if($application->other_uploads)
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="document-card">
                                                    <div class="doc-label">
                                                        <i class="icon ni ni-file-text"></i> Other Uploads
                                                    </div>
                                                @php
                                                    $otherPath = asset('website_assets/uploads/applications/other/' . $application->other_uploads);
                                                    $otherExt = strtolower(pathinfo($application->other_uploads, PATHINFO_EXTENSION));
                                                    $isOtherImage = in_array($otherExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isOtherImage)
                                                        <a href="{{ $otherPath }}" data-fancybox="documents" data-caption="Other Uploads">
                                                            <img src="{{ $otherPath }}" alt="Other Uploads" style="max-width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; cursor: pointer;">
                                                        </a>
                                                @else
                                                        <a href="{{ $otherPath }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                            <i class="icon ni ni-file-pdf"></i> View PDF
                                                        </a>
                                                @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <!-- Status Update Card -->
                            <div class="status-form-card card">
                                <div class="card-header">
                                    <h5>
                                        <i class="icon ni ni-activity"></i> Update Status
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4 text-center">
                                        <span class="status-badge-modern {{ $application->status }}">
                                            @if($application->status === 'accepted')
                                                <i class="icon ni ni-check-circle"></i> Accepted
                                            @elseif($application->status === 'rejected')
                                                <i class="icon ni ni-cross-circle"></i> Rejected
                                            @elseif($application->status === 'under_review')
                                                <i class="icon ni ni-clock"></i> Under Review
                                            @else
                                                <i class="icon ni ni-hourglass"></i> Pending
                                            @endif
                                        </span>
                                    </div>
                                    
                                    <form action="{{ route('application.updateStatus', $application->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="status" class="form-label fw-bold">Change Status</label>
                                            <select class="form-control form-select" id="status" name="status" required style="border-radius: 8px; padding: 10px;">
                                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="under_review" {{ $application->status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="remarks" class="form-label fw-bold">Remarks</label>
                                            <textarea class="form-control" id="remarks" name="remarks" rows="4" style="border-radius: 8px;" placeholder="Add any remarks or notes...">{{ old('remarks', $application->remarks) }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="icon ni ni-save"></i> Update Status
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Programme Selection Card -->
                            <div class="info-card card">
                                <div class="card-header">
                                    <h5>
                                        <i class="icon ni ni-book"></i> Programme Selection
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if($application->programme)
                                        <div class="text-center">
                                            <span class="badge badge-lg d-inline-block mb-2" style="background: linear-gradient(135deg, #227353 0%, #009454 100%); color: white; padding: 10px 20px; font-size: 14px; border-radius: 8px;">
                                                {{ $application->programme->type }}
                                            </span>
                                            <p class="info-value mb-0" style="font-size: 16px; line-height: 1.5;">{{ $application->programme->name }}</p>
                                        </div>
                                    @else
                                        <p class="text-muted mb-0 text-center">
                                            <i class="icon ni ni-info"></i> No programme selected
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Quick Info Card -->
                            <div class="quick-info-card">
                                <h6 class="mb-3" style="color: #227353; font-weight: 700;">
                                    <i class="icon ni ni-info"></i> Application Details
                                </h6>
                                <div class="quick-info-item">
                                    <i class="icon ni ni-hash"></i>
                                    <div class="info-text">
                                        <div class="info-label">Unique ID</div>
                                        <div class="info-value">{{ $application->unique_id }}</div>
                                    </div>
                                </div>
                                <div class="quick-info-item">
                                    <i class="icon ni ni-calendar"></i>
                                    <div class="info-text">
                                        <div class="info-label">Submitted</div>
                                        <div class="info-value">{{ $application->created_at->format('M d, Y h:i A') }}</div>
                                    </div>
                                </div>
                                <div class="quick-info-item">
                                    <i class="icon ni ni-update"></i>
                                    <div class="info-text">
                                        <div class="info-label">Last Updated</div>
                                        <div class="info-value">{{ $application->updated_at->format('M d, Y h:i A') }}</div>
                                    </div>
                                </div>
                                @if($application->remarks)
                                    <div class="quick-info-item">
                                        <i class="icon ni ni-note"></i>
                                        <div class="info-text">
                                            <div class="info-label">Remarks</div>
                                            <div class="info-value">{{ strlen($application->remarks) > 50 ? substr($application->remarks, 0, 50) . '...' : $application->remarks }}</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Admission Check History - Full Width at Bottom -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="check-history-card card">
                                <div class="card-header">
                                    <h5>
                                        <i class="icon ni ni-activity"></i> Admission Check History
                                        <span class="badge">{{ $admissionCheckLogs->total() }}</span>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if($admissionCheckLogs->count() > 0)
                                        @php
                                            $lastCheck = $admissionCheckLogs->first();
                                        @endphp
                                        <div class="alert alert-info mb-4" style="border-radius: 10px; border-left: 4px solid #17a2b8;">
                                            <div class="d-flex align-items-center gap-3">
                                                <i class="icon ni ni-clock" style="font-size: 24px;"></i>
                                                <div>
                                                    <strong>Last Checked:</strong> {{ $lastCheck->created_at->format('F d, Y h:i A') }}
                                                    <br>
                                                    <small class="text-muted">{{ $lastCheck->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="table-responsive">
                                            <table class="table check-history-table">
                                                <thead>
                                                    <tr>
                                                        <th>Date & Time</th>
                                                        <th>Browser</th>
                                                        <th>Platform</th>
                                                        <th>Device</th>
                                                        <th>IP Address</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($admissionCheckLogs as $log)
                                                        <tr>
                                                            <td>
                                                                <div style="display: flex; align-items: center; gap: 10px;">
                                                                    <i class="icon ni ni-calendar" style="color: #227353;"></i>
                                                                    <div>
                                                                        <strong style="display: block;">{{ $log->created_at->format('M d, Y') }}</strong>
                                                                        <small class="text-muted">{{ $log->created_at->format('h:i A') }}</small>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                                    <i class="icon ni ni-global" style="color: #227353;"></i>
                                                                    <div>
                                                                        <strong>{{ $log->browser }}</strong>
                                                                        @if($log->browser_version)
                                                                            <br><small class="text-muted">v{{ $log->browser_version }}</small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                                    <i class="icon ni ni-monitor" style="color: #227353;"></i>
                                                                    <strong>{{ $log->platform }}</strong>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                                    @if($log->device_type === 'Mobile')
                                                                        <i class="icon ni ni-mobile" style="color: #227353;"></i>
                                                                    @elseif($log->device_type === 'Tablet')
                                                                        <i class="icon ni ni-tablet" style="color: #227353;"></i>
                                                                    @else
                                                                        <i class="icon ni ni-monitor" style="color: #227353;"></i>
                                                                    @endif
                                                                    <div>
                                                                        <strong>{{ $log->device_type }}</strong>
                                                                        @if($log->device_name)
                                                                            <br><small class="text-muted">{{ $log->device_name }}</small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <code style="background: #f8f9fa; padding: 6px 12px; border-radius: 6px; color: #227353; font-weight: 600;">{{ $log->ip_address }}</code>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <!-- Pagination -->
                                        <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="pagination-info mb-3 mb-md-0">
                                                <span class="text-muted">
                                                    Showing <strong>{{ $admissionCheckLogs->firstItem() }}</strong> to <strong>{{ $admissionCheckLogs->lastItem() }}</strong> of <strong>{{ $admissionCheckLogs->total() }}</strong> results
                                                </span>
                                            </div>
                                            <div class="pagination-wrapper">
                                                {{ $admissionCheckLogs->onEachSide(1)->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center py-5">
                                            <i class="icon ni ni-info text-muted" style="font-size: 64px; opacity: 0.5;"></i>
                                            <p class="text-muted mt-3 mb-0" style="font-size: 16px;">No admission checks recorded yet.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Initialize Fancybox for document images
    document.addEventListener('DOMContentLoaded', function() {
        // Check if jQuery is available
        if (typeof jQuery !== 'undefined' && typeof jQuery.fn.fancybox !== 'undefined') {
            jQuery('[data-fancybox="documents"]').fancybox({
                buttons: [
                    "zoom",
                    "share",
                    "slideShow",
                    "fullScreen",
                    "download",
                    "thumbs",
                    "close"
                ],
                loop: true,
                protect: true,
                transitionEffect: "slide",
                transitionDuration: 366,
                infobar: true,
                toolbar: true,
                caption: function(instance, item) {
                    return jQuery(this).data('caption') || '';
                }
            });
        } else {
            // Fallback: if Fancybox is not available, ensure images are clickable
            document.querySelectorAll('[data-fancybox="documents"]').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    // If Fancybox is not loaded, open in new tab
                    if (typeof jQuery === 'undefined' || typeof jQuery.fn.fancybox === 'undefined') {
                        e.preventDefault();
                        window.open(this.href, '_blank');
                    }
                });
            });
        }
    });
</script>
@endsection

