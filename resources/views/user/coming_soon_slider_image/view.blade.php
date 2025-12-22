@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">View Coming Soon Slider</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'coming-soon-slider-image', 'id' => $coming_soon_slider_image->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="nk-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <a href="{{ asset('coming_soon_assets/img/coming-soon-slider-image/' . $coming_soon_slider_image->img) }}" target="_blank">
                                    <img src="{{ asset('coming_soon_assets/img/coming-soon-slider-image/' . $coming_soon_slider_image->img) }}" alt="{{ $coming_soon_slider_image->title }}" width="300px">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="image">Image Name</label>
                                <input type="text" id="image" readonly disabled value="{{ $coming_soon_slider_image->img }}"
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title">Caption</label>
                                <input type="text" id="title" readonly disabled value="{{ $coming_soon_slider_image->title }}"
                                       class="form-control form-control-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
