@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Add Board Member</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('academic-board.index') }}" class="btn btn-secondary">
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
                <div class="nk-block">
                    <form class="container" id="needs-validation" novalidate action="{{ route('academic-board.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text"><h6>Board member Successfully added</h6>
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="names">Names</label>
                                <input type="text" name="names"
                                       class="form-control form-control-lg @error('names') is-invalid @enderror"
                                       id="names" placeholder="Names" required value="{{ old('names') }}">
                                @error('names')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="position">Position</label>
                                <input type="text" name="position"
                                       class="form-control form-control-lg @error('position') is-invalid @enderror"
                                       id="position" placeholder="Position" required value="{{ old('position') }}">
                                @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="img" accept="image/*"
                                       class="form-control form-control-lg @error('img') is-invalid @enderror"
                                       id="image" required>
                                @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="facebook_url">Facebook</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon"><em class="icon ni ni-facebook-fill"></em></div>
                                    <input type="url" name="facebook_url"
                                           class="form-control form-control-lg @error('facebook_url') is-invalid @enderror"
                                           id="facebook_url" placeholder="Facebook"
                                           value="{{ old('facebook_url') }}">
                                    @error('facebook_url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="twitter">Twitter</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon"><em class="icon ni ni-twitter"></em></div>
                                    <input type="url" name="twitter_url"
                                           class="form-control form-control-lg @error('twitter') is-invalid @enderror"
                                           id="twitter" placeholder="Twitter" value="{{ old('twitter') }}">
                                    @error('twitter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="instagram">Instagram</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon"><em class="icon ni ni-instagram"></em></div>
                                    <input type="url" name="instagram_url"
                                           class="form-control form-control-lg @error('instagram') is-invalid @enderror"
                                           id="instagram" placeholder="Instagram"
                                           value="{{ old('instagram') }}">
                                    @error('instagram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="linkedin_url">LinkedIn</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon"><em class="icon ni ni-linkedin"></em></div>
                                    <input type="url" name="linkedin_url"
                                           class="form-control form-control-lg @error('linkedin_url') is-invalid @enderror"
                                           id="linkedin_url" placeholder="LinkedIn"
                                           value="{{ old('linkedin_url') }}">
                                    @error('linkedin_url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon"><em class="icon ni ni-emails-fill"></em></div>
                                    <input type="email" name="email"
                                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                                           id="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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
