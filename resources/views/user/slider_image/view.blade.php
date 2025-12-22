@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">View Slider Image</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'slider-image', 'id' => $slider_image->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="nk-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mb-5">
                                <h5 class="mb-3">Desktop Image (1920x950)</h5>
                                <a href="{{ asset('website_assets/img/slider-image/' . $slider_image->img) }}" target="_blank">
                                    <img src="{{ asset('website_assets/img/slider-image/' . $slider_image->img) }}" alt="{{ $slider_image->title }}" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 4px;">
                                </a>
                            </div>
                            <div class="col-md-6 mb-5">
                                <h5 class="mb-3">Mobile Image (768x1024)</h5>
                                @if($slider_image->mobile_img)
                                    <a href="{{ asset('website_assets/img/slider-image/' . $slider_image->mobile_img) }}" target="_blank">
                                        <img src="{{ asset('website_assets/img/slider-image/' . $slider_image->mobile_img) }}" alt="{{ $slider_image->title }} - Mobile" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 4px;">
                                    </a>
                                @else
                                    <div class="alert alert-info">
                                        <p class="mb-0">No mobile image uploaded. Desktop image will be used on mobile devices.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="image">Desktop Image Name</label>
                                <input type="text" id="image" readonly disabled value="{{ $slider_image->img }}"
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mobile_image">Mobile Image Name</label>
                                <input type="text" id="mobile_image" readonly disabled value="{{ $slider_image->mobile_img ?: 'Not set' }}"
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title">Title</label>
                                <input type="text" id="title" readonly disabled value="{{ $slider_image->title }}"
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="caption">Caption</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="caption" value="{{ $slider_image->caption }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sup_text">Super Text</label>
                                <input type="text"
                                       class="form-control form-control-lg" disabled readonly
                                       id="sup_text" value="{{ $slider_image->sup_text }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="link_text">Link Text</label>
                                <input type="text" disabled readonly
                                       class="form-control form-control-lg"
                                       id="link_text" value="{{ $slider_image->link_text }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sup_text">Link</label>
                                <input type="url"
                                       class="form-control form-control-lg" disabled readonly
                                       id="sup_text" value="{{ $slider_image->link }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
