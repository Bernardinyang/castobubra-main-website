@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">View Gallery Image</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('gallery.index') }}"
                                               class="btn btn-secondary">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                <span>Back</span>
                                            </a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('gallery.edit', $gallery->id) }}"
                                               class="btn btn-primary">
                                                <em class="icon ni ni-pen-fill"></em>
                                                <span>Edit</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="nk-block">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label><strong class="text-uppercase">Image</strong></label>
                            <div>
                                <a href="{{ asset('website_assets/img/gallery/' . $gallery->img) }}" target="_blank">
                                    <img src="{{ asset('website_assets/img/gallery/' . $gallery->img) }}" 
                                         alt="{{ $gallery->title }}" 
                                         style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label><strong class="text-uppercase">Title</strong></label>
                                <p class="form-control form-control-lg" style="background: #f8f9fa;">{{ $gallery->title }}</p>
                            </div>
                            <div class="mb-3">
                                <label><strong class="text-uppercase">Caption</strong></label>
                                <p class="form-control form-control-lg" style="background: #f8f9fa; min-height: 100px;">{{ $gallery->caption ?? 'N/A' }}</p>
                            </div>
                            <div class="mb-3">
                                <label><strong class="text-uppercase">Order</strong></label>
                                <p class="form-control form-control-lg" style="background: #f8f9fa;">{{ $gallery->order }}</p>
                            </div>
                            <div class="mb-3">
                                <label><strong class="text-uppercase">Status</strong></label>
                                <p class="form-control form-control-lg" style="background: #f8f9fa;">
                                    @if($gallery->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3">
                                <label><strong class="text-uppercase">Created At</strong></label>
                                <p class="form-control form-control-lg" style="background: #f8f9fa;">{{ $gallery->created_at->format('F d, Y h:i A') }}</p>
                            </div>
                            <div class="mb-3">
                                <label><strong class="text-uppercase">Updated At</strong></label>
                                <p class="form-control form-control-lg" style="background: #f8f9fa;">{{ $gallery->updated_at->format('F d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

