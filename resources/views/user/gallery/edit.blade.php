@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Edit Gallery Image</h3>
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
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="nk-block">
                    <form class="container" id="needs-validation" novalidate
                          action="{{ route('gallery.update', $gallery->id) }}"
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
                            <div class="col-md-6 mb-4">
                                <label for="title"><strong class="text-uppercase">Title</strong></label>
                                <input type="text" name="title"
                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                       id="title" placeholder="Title" value="{{ old('title', $gallery->title) }}" required>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="image"><strong class="text-uppercase">Image</strong></label>
                                <input type="file" name="img" accept="image/*"
                                       class="form-control form-control-lg @error('img') is-invalid @enderror"
                                       id="image">
                                <small class="form-text text-muted">
                                    Leave blank to continue with previous image! Recommended size: 800x600px
                                </small>
                                @if($gallery->img)
                                    <div class="mt-2">
                                        <img src="{{ asset('website_assets/img/gallery/' . $gallery->img) }}" 
                                             alt="Current image" 
                                             style="max-width: 200px; height: auto; border-radius: 4px;">
                                    </div>
                                @endif
                                @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="caption"><strong class="text-uppercase">Caption (Optional)</strong></label>
                                <textarea name="caption" rows="3"
                                       class="form-control form-control-lg @error('caption') is-invalid @enderror"
                                       id="caption" placeholder="Caption">{{ old('caption', $gallery->caption) }}</textarea>
                                @error('caption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="order"><strong class="text-uppercase">Order</strong></label>
                                <input type="number" name="order"
                                       class="form-control form-control-lg @error('order') is-invalid @enderror"
                                       id="order" placeholder="0" value="{{ old('order', $gallery->order) }}">
                                <small class="form-text text-muted">Lower numbers appear first</small>
                                @error('order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        <strong class="text-uppercase">Active</strong>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary btn-lg mt-4" type="submit">Update</button>
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

