@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Edit Social Media</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('social-media.index') }}" class="btn btn-secondary">
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
                          action="{{ route('social-media.update', $social_media->id) }}"
                          method="POST">
                        @if(session('status'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text"><h6>Social Media Successfully updated</h6>
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="name">Platform <span class="text-danger">*</span></label>
                                <select name="name"
                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       id="name" required>
                                    <option value="">Select a platform</option>
                                    <option value="Facebook" {{ $social_media->name == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="Twitter" {{ $social_media->name == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                                    <option value="YouTube" {{ $social_media->name == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                                    <option value="Instagram" {{ $social_media->name == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="LinkedIn" {{ $social_media->name == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                                    <option value="Pinterest" {{ $social_media->name == 'Pinterest' ? 'selected' : '' }}>Pinterest</option>
                                    <option value="TikTok" {{ $social_media->name == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                                    <option value="WhatsApp" {{ $social_media->name == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                                </select>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small class="form-text text-muted">Icon and color styling will be automatically applied</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="url">URL <span class="text-danger">*</span></label>
                                <input type="url" name="url"
                                       class="form-control form-control-lg @error('url') is-invalid @enderror"
                                       id="url" placeholder="https://..." required value="{{ $social_media->url }}">
                                @error('url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="order">Display Order</label>
                                <input type="number" name="order"
                                       class="form-control form-control-lg @error('order') is-invalid @enderror"
                                       id="order" placeholder="Order (lower numbers appear first)" value="{{ $social_media->order }}" min="0">
                                @error('order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small class="form-text text-muted">Lower numbers appear first. Default is 0.</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $social_media->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Show on website)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary mt-4" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
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

