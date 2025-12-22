@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Add Slider Image</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('slider-image.index') }}"
                                               class="btn btn-secondary">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                <span>Back</span>
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
                    <form class="container" id="needs-validation" novalidate
                          action="{{ route('slider-image.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text"><h6>Slider Successfully added</h6>
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title"
                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                       id="title" placeholder="Title" required value="{{ old('title') }}">
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
                                       id="image" required>
                                <small class="form-text text-muted">Main image for desktop and tablet screens</small>
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
                                <small class="form-text text-muted">Optimized image for mobile devices. If not provided, desktop image will be used.</small>
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
                                       id="caption" placeholder="Caption" required value="{{ old('caption') }}">
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
                                       id="sup_text" placeholder="Super Text" required value="{{ old('sup_text') }}">
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
                                       id="link_text" placeholder="Link Text" value="{{ old('link_text') }}">
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
                                       id="link" placeholder="Link" value="{{ old('link') }}">
                                @error('link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary mt-4" type="submit">Submit</button>
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
