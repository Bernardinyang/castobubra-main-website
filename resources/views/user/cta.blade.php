@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title text-uppercase">Manage CTA</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-5">
                <div class="nk-block">
                    <form class="container needs-validation" novalidate
                          action="{{ route('user.cta.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status_message') && session('status_type'))
                            <div class="alert alert-pro alert-{{ session('status_type') }}">
                                <div class="alert-text"><h6>CTA Successfully updated</h6>
                                    <p>{{ session('status_message') }}</p>
                                </div>
                            </div>
                        @endif
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <!-- Type Selector -->
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label class="form-label"><strong class="text-uppercase">CTA Type</strong></label>
                                    <select name="type" id="cta_type" class="form-control form-control-lg @error('type') is-invalid @enderror" required>
                                        <option value="text" {{ old('type', $cta->type ?? 'text') === 'text' ? 'selected' : '' }}>Text Content</option>
                                        <option value="image" {{ old('type', $cta->type ?? 'text') === 'image' ? 'selected' : '' }}>Image Only</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Text Type Fields -->
                            <div id="text_fields" class="col-12" style="display: {{ old('type', $cta->type ?? 'text') === 'text' ? 'block' : 'none' }};">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <div class="form-group mb-3">
                                            <div class="form-control-wrap">
                                                <input type="text" name="sup_text" value="{{ old('sup_text', $cta->sup_text) }}"
                                                       class="form-control form-control-lg form-control-outlined @error('sup_text') is-invalid @enderror"
                                                       id="sup_text">
                                                <label class="form-label-outlined" for="sup_text">
                                                    <strong class="text-uppercase">Super Text</strong>
                                                </label>
                                            </div>
                                            @error('sup_text')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-7 mb-3">
                                        <div class="form-group mb-3">
                                            <div class="form-control-wrap">
                                                <input type="text" name="title" value="{{ old('title', $cta->title) }}"
                                                       class="form-control form-control-lg form-control-outlined @error('title') is-invalid @enderror"
                                                       id="title">
                                                <label class="form-label-outlined" for="title">
                                                    <strong class="text-uppercase">Title</strong>
                                                </label>
                                            </div>
                                            @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group mb-3">
                                            <div class="form-control-wrap">
                                                <input type="text" name="subtitle" value="{{ old('subtitle', $cta->subtitle) }}"
                                                       class="form-control form-control-lg form-control-outlined @error('subtitle') is-invalid @enderror"
                                                       id="subtitle">
                                                <label class="form-label-outlined" for="subtitle">
                                                    <strong class="text-uppercase">Subtitle (Optional)</strong>
                                                </label>
                                            </div>
                                            @error('subtitle')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-control-wrap">
                                            <textarea
                                                class="form-control form-control-lg form-control-outlined @error('content') is-invalid @enderror"
                                                name="content" id="desc" cols="20"
                                                rows="10">{{ old('content', $cta->content) }}</textarea>
                                            <label class="form-label-outlined" for="desc">
                                                <strong class="text-uppercase">Description</strong>
                                            </label>
                                        </div>
                                        @error('content')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-7 mb-3">
                                        <div class="form-group mb-3">
                                            <div class="form-control-wrap">
                                                <input type="url" name="url" value="{{ old('url', $cta->url) }}"
                                                       class="form-control form-control-lg form-control-outlined @error('url') is-invalid @enderror"
                                                       id="url">
                                                <label class="form-label-outlined" for="url">
                                                    <strong class="text-uppercase">URL Link</strong>
                                                </label>
                                            </div>
                                            @error('url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <div class="form-group mb-3">
                                            <div class="form-control-wrap">
                                                <input type="text" name="url_text" value="{{ old('url_text', $cta->url_text) }}"
                                                       class="form-control form-control-lg form-control-outlined @error('url_text') is-invalid @enderror"
                                                       id="url_text">
                                                <label class="form-label-outlined" for="url_text">
                                                    <strong class="text-uppercase">URL Text</strong>
                                                </label>
                                            </div>
                                            @error('url_text')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Type Fields -->
                            <div id="image_fields" class="col-12" style="display: {{ old('type', $cta->type ?? 'text') === 'image' ? 'block' : 'none' }};">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label"><strong class="text-uppercase">CTA Image</strong></label>
                                            <div class="form-control-wrap">
                                                <input type="file" name="img" 
                                                       class="form-control form-control-lg @error('img') is-invalid @enderror"
                                                       id="img" accept="image/*">
                                                @error('img')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            @if($cta->img)
                                                <div class="mt-3">
                                                    <p class="text-muted">Current Image:</p>
                                                    <img src="{{ asset('website_assets/img/cta/' . $cta->img) }}" 
                                                         alt="Current CTA Image" 
                                                         style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                                    <p class="text-muted mt-2"><small>Leave blank to keep current image</small></p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-3">
                                            <div class="form-control-wrap">
                                                <input type="url" name="url" value="{{ old('url', $cta->url) }}"
                                                       class="form-control form-control-lg form-control-outlined @error('url') is-invalid @enderror"
                                                       id="url_image">
                                                <label class="form-label-outlined" for="url_image">
                                                    <strong class="text-uppercase">Link URL (Optional)</strong>
                                                </label>
                                            </div>
                                            @error('url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-3">
                                            <div class="form-control-wrap">
                                                <input type="text" name="url_text" value="{{ old('url_text', $cta->url_text) }}"
                                                       class="form-control form-control-lg form-control-outlined @error('url_text') is-invalid @enderror"
                                                       id="url_text_image">
                                                <label class="form-label-outlined" for="url_text_image">
                                                    <strong class="text-uppercase">Button Text (Optional)</strong>
                                                </label>
                                            </div>
                                            @error('url_text')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary btn-lg mt-2" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('cta_type');
            const textFields = document.getElementById('text_fields');
            const imageFields = document.getElementById('image_fields');

            typeSelect.addEventListener('change', function() {
                if (this.value === 'text') {
                    textFields.style.display = 'block';
                    imageFields.style.display = 'none';
                } else {
                    textFields.style.display = 'none';
                    imageFields.style.display = 'block';
                }
            });

            // Form validation
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    const forms = document.querySelectorAll('.needs-validation');
                    forms.forEach(form => {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        });
    </script>
@endsection
