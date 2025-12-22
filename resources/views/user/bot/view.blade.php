@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">View Governing Council Member</h3></div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'bot', 'id' => $bot->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <img src="{{ asset('website_assets/img/board-of-directors/' . $bot->image) }}" title="{{ $bot->image }}" alt="{{ $bot->names }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="image_name">Image Name</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="image_name" value="{{ $bot->image }}">
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="names">Names</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="names" value="{{ $bot->names }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="position">Position</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="position" value="{{ $bot->position }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="facebook_url">Facebook</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon"><em class="icon ni ni-facebook-fill"></em></div>
                                    <input type="url" readonly disabled
                                           class="form-control form-control-lg"
                                           id="facebook_url"
                                           value="{{ $bot->facebook_url ?: 'N/A' }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="twitter">Twitter</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon">
                                        <em class="icon ni ni-twitter"></em>
                                    </div>
                                    <input type="url" readonly disabled
                                           class="form-control form-control-lg"
                                           id="twitter" value="{{ $bot->twitter_url ?: 'N/A' }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="instagram">Instagram</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon">
                                        <em class="icon ni ni-instagram"></em>
                                    </div>
                                    <input type="url" readonly disabled
                                           class="form-control form-control-lg"
                                           id="instagram"
                                           value="{{ $bot->instagram_url ?: 'N/A' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="linkedin_url">LinkedIn</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon">
                                        <em class="icon ni ni-linkedin"></em>
                                    </div>
                                    <input type="url" readonly disabled
                                           class="form-control form-control-lg"
                                           id="linkedin_url"
                                           value="{{ $bot->linkedin_url ?: 'N/A' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon"><em class="icon ni ni-emails-fill"></em></div>
                                    <input type="email" readonly disabled
                                           class="form-control form-control-lg"
                                           id="email" value="{{ $bot->email ?: 'N/A' }}">
                                </div>
                            </div>
                        </div>
                    </div>
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
