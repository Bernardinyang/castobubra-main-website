@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Edit Coming Soon Slider Image</h3>
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
                    <form class="container" id="needs-validation" novalidate
                          action="{{ route('slider-image.update', $slider_image->id) }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text"><h6>Gallery Successfully updated</h6>
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title"
                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                       id="title" placeholder="Title" value="{{ $slider_image->title }}" required>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image">Desktop Image (1920x950)</label>
                                <input type="file" name="img" accept="image/*"
                                       class="form-control form-control-lg @error('img') is-invalid @enderror"
                                       id="image">
                                <small class="form-text text-muted">
                                    Leave blank to continue with previous image! Main image for desktop and tablet screens.
                                </small>
                                @if($slider_image->img)
                                    <div class="mt-2">
                                        <img src="{{ asset('website_assets/img/slider-image/' . $slider_image->img) }}" 
                                             alt="Current desktop image" 
                                             style="max-width: 200px; height: auto; border-radius: 4px;">
                                    </div>
                                @endif
                                @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mobile_image">Mobile Image (768x1024) <span class="text-muted">(Optional)</span></label>
                                <input type="file" name="mobile_img" accept="image/*"
                                       class="form-control form-control-lg @error('mobile_img') is-invalid @enderror"
                                       id="mobile_image">
                                <small class="form-text text-muted">
                                    Leave blank to keep current mobile image. Optimized image for mobile devices.
                                </small>
                                @if($slider_image->mobile_img)
                                    <div class="mt-2">
                                        <img src="{{ asset('website_assets/img/slider-image/' . $slider_image->mobile_img) }}" 
                                             alt="Current mobile image" 
                                             style="max-width: 200px; height: auto; border-radius: 4px;">
                                    </div>
                                @endif
                                @error('mobile_img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption"
                                       class="form-control form-control-lg @error('caption') is-invalid @enderror"
                                       id="caption" placeholder="Caption" required value="{{ $slider_image->caption }}">
                                @error('caption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sup_text">Super Text</label>
                                <input type="text" name="sup_text"
                                       class="form-control form-control-lg @error('sup_text') is-invalid @enderror"
                                       id="sup_text" placeholder="Super Text" required value="{{ $slider_image->sup_text }}">
                                @error('sup_text')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="link_text">Link Text <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="link_text"
                                       class="form-control form-control-lg @error('link_text') is-invalid @enderror"
                                       id="link_text" placeholder="Link Text" value="{{ $slider_image->link_text }}">
                                @error('link_text')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="link">Link <span class="text-muted">(Optional)</span></label>
                                <input type="url" name="link"
                                       class="form-control form-control-lg @error('link') is-invalid @enderror"
                                       id="link" placeholder="Link" value="{{ $slider_image->link }}">
                                @error('link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                var form = document.getElementById('needs-validation');
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }, false);
        })();
    </script>
@endsection
