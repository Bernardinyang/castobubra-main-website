@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View Application - {{ $application->unique_id }}</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('application.index') }}" class="btn btn-outline-light">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Back</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status_type') && session('status_message'))
                        <div class="alert alert-pro alert-{{ session('status_type') }}">
                            <div class="alert-text">
                                <h6>{{ ucfirst(session('status_type')) }}</h6>
                                <p>{{ session('status_message') }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <strong>Surname:</strong>
                                            <p>{{ $application->surname }}</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <strong>First Name:</strong>
                                            <p>{{ $application->first_name }}</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <strong>Other Name:</strong>
                                            <p>{{ $application->other_name ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Email:</strong>
                                            <p><a href="mailto:{{ $application->email }}">{{ $application->email }}</a></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Phone Number:</strong>
                                            <p><a href="tel:{{ $application->phone_number }}">{{ $application->phone_number }}</a></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Gender:</strong>
                                            <p>{{ $application->gender ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Marital Status:</strong>
                                            <p>{{ $application->marital_status ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>State of Origin:</strong>
                                            <p>{{ $application->state_of_origin ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Local Government:</strong>
                                            <p>{{ $application->local_government ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <strong>Current Address:</strong>
                                            <p>{{ $application->current_address ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5>Programme Selection</h5>
                                </div>
                                <div class="card-body">
                                    @if($application->programme)
                                        <p><strong>Programme:</strong> <span class="badge badge-info">{{ $application->programme->type }}</span> {{ $application->programme->name }}</p>
                                    @else
                                        <p class="text-muted">No programme selected</p>
                                    @endif
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5>Document Uploads</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <strong>SSCE Certificate:</strong>
                                            @if($application->ssce_certificate)
                                                @php
                                                    $sscePath = asset('website_assets/uploads/applications/ssce/' . $application->ssce_certificate);
                                                    $ssceExt = strtolower(pathinfo($application->ssce_certificate, PATHINFO_EXTENSION));
                                                    $isSsceImage = in_array($ssceExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isSsceImage)
                                                    <p>
                                                        <a href="{{ $sscePath }}" data-fancybox="documents" data-caption="SSCE Certificate">
                                                            <img src="{{ $sscePath }}" alt="SSCE Certificate" class="document-preview img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: cover; cursor: pointer;">
                                                        </a>
                                                    </p>
                                                @else
                                                    <p><a href="{{ $sscePath }}" target="_blank" class="btn btn-sm btn-outline-primary">View PDF</a></p>
                                                @endif
                                            @else
                                                <p class="text-muted">Not uploaded</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Birth Certificate:</strong>
                                            @if($application->birth_certificate)
                                                @php
                                                    $birthPath = asset('website_assets/uploads/applications/birth/' . $application->birth_certificate);
                                                    $birthExt = strtolower(pathinfo($application->birth_certificate, PATHINFO_EXTENSION));
                                                    $isBirthImage = in_array($birthExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isBirthImage)
                                                    <p>
                                                        <a href="{{ $birthPath }}" data-fancybox="documents" data-caption="Birth Certificate">
                                                            <img src="{{ $birthPath }}" alt="Birth Certificate" class="document-preview img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: cover; cursor: pointer;">
                                                        </a>
                                                    </p>
                                                @else
                                                    <p><a href="{{ $birthPath }}" target="_blank" class="btn btn-sm btn-outline-primary">View PDF</a></p>
                                                @endif
                                            @else
                                                <p class="text-muted">Not uploaded</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Passport Photograph:</strong>
                                            @if($application->passport_photograph)
                                                @php
                                                    $passportPath = asset('website_assets/uploads/applications/passport/' . $application->passport_photograph);
                                                @endphp
                                                <p>
                                                    <a href="{{ $passportPath }}" data-fancybox="documents" data-caption="Passport Photograph">
                                                        <img src="{{ $passportPath }}" alt="Passport Photograph" class="document-preview img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: cover; cursor: pointer;">
                                                    </a>
                                                </p>
                                            @else
                                                <p class="text-muted">Not uploaded</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Evidence of Payment:</strong>
                                            @if($application->evidence_of_payment)
                                                @php
                                                    $paymentPath = asset('website_assets/uploads/applications/payment/' . $application->evidence_of_payment);
                                                    $paymentExt = strtolower(pathinfo($application->evidence_of_payment, PATHINFO_EXTENSION));
                                                    $isPaymentImage = in_array($paymentExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isPaymentImage)
                                                    <p>
                                                        <a href="{{ $paymentPath }}" data-fancybox="documents" data-caption="Evidence of Payment">
                                                            <img src="{{ $paymentPath }}" alt="Evidence of Payment" class="document-preview img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: cover; cursor: pointer;">
                                                        </a>
                                                    </p>
                                                @else
                                                    <p><a href="{{ $paymentPath }}" target="_blank" class="btn btn-sm btn-outline-primary">View PDF</a></p>
                                                @endif
                                            @else
                                                <p class="text-muted">Not uploaded</p>
                                            @endif
                                        </div>
                                        @if($application->other_uploads)
                                            <div class="col-md-12 mb-3">
                                                <strong>Other Uploads:</strong>
                                                @php
                                                    $otherPath = asset('website_assets/uploads/applications/other/' . $application->other_uploads);
                                                    $otherExt = strtolower(pathinfo($application->other_uploads, PATHINFO_EXTENSION));
                                                    $isOtherImage = in_array($otherExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                @endphp
                                                @if($isOtherImage)
                                                    <p>
                                                        <a href="{{ $otherPath }}" data-fancybox="documents" data-caption="Other Uploads">
                                                            <img src="{{ $otherPath }}" alt="Other Uploads" class="document-preview img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: cover; cursor: pointer;">
                                                        </a>
                                                    </p>
                                                @else
                                                    <p><a href="{{ $otherPath }}" target="_blank" class="btn btn-sm btn-outline-primary">View PDF</a></p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Application Status</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('application.updateStatus', $application->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="under_review" {{ $application->status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea class="form-control" id="remarks" name="remarks" rows="4">{{ old('remarks', $application->remarks) }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Update Status</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5>Application Details</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>Unique ID:</strong><br>{{ $application->unique_id }}</p>
                                    <p><strong>Submitted:</strong><br>{{ $application->created_at->format('F d, Y h:i A') }}</p>
                                    <p><strong>Last Updated:</strong><br>{{ $application->updated_at->format('F d, Y h:i A') }}</p>
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

