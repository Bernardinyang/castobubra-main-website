@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Edit Programme</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('programme.index') }}" class="btn btn-outline-light">
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

                    @if($errors->any())
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text">
                                <h6>Validation Errors</h6>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('programme.update', $programme->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label">Programme Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $programme->name) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="code" class="form-label">Programme Code</label>
                                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $programme->code) }}" placeholder="e.g., CS101">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="type" class="form-label">Programme Type <span class="text-danger">*</span></label>
                                        <select class="form-control" id="type" name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="ND" {{ old('type', $programme->type) == 'ND' ? 'selected' : '' }}>ND (National Diploma)</option>
                                            <option value="HND" {{ old('type', $programme->type) == 'HND' ? 'selected' : '' }}>HND (Higher National Diploma)</option>
                                            <option value="Certificate" {{ old('type', $programme->type) == 'Certificate' ? 'selected' : '' }}>Certificate</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="duration" class="form-label">Duration (Years)</label>
                                        <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $programme->duration) }}" min="1" placeholder="e.g., 2">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="order" class="form-label">Display Order</label>
                                        <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $programme->order) }}" min="0">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $programme->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Active (Show on application form)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $programme->description) }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Update Programme</button>
                                        <a href="{{ route('programme.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

