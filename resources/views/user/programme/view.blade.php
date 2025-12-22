@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View Programme</h3>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Programme Name:</strong>
                                    <p>{{ $programme->name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Programme Code:</strong>
                                    <p>{{ $programme->code ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Type:</strong>
                                    <p><span class="badge badge-info">{{ $programme->type }}</span></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Duration:</strong>
                                    <p>{{ $programme->duration ? $programme->duration . ' years' : 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Display Order:</strong>
                                    <p>{{ $programme->order }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Status:</strong>
                                    <p>
                                        @if($programme->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </p>
                                </div>
                                @if($programme->description)
                                    <div class="col-md-12 mb-3">
                                        <strong>Description:</strong>
                                        <p>{{ $programme->description }}</p>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <a href="{{ route('programme.edit', $programme->id) }}" class="btn btn-primary">Edit Programme</a>
                                    <a href="{{ route('programme.index') }}" class="btn btn-outline-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

