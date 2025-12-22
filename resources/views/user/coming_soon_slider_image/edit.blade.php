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
                                    @include('partials.dashboard.__header_action', ['data' => 'coming-soon-slider-image', 'id' => $coming_soon_slider_image->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="nk-block">
                    <form class="container" id="needs-validation" novalidate
                          action="{{ route('coming-soon-slider-image.update', $coming_soon_slider_image->id) }}"
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
                                       id="title" placeholder="Title" value="{{ $coming_soon_slider_image->title }}" required>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="img" accept="image/*"
                                       class="form-control form-control-lg @error('img') is-invalid @enderror"
                                       id="image">
                                <small>
                                    Leave blank to continue with previous image!
                                </small>
                                @error('img')
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
