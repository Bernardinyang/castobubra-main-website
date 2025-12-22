@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title text-uppercase">Manage System Settings</h3>
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
                    <form class="container needs-validation" novalidate action="{{ route('user.settings.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status_message') && session('status_type'))
                            <div class="alert alert-pro alert-{{ session('status_type') }}">
                                <div class="alert-text"><h6>Setting Successfully updated</h6>
                                    <p>{{ session('status_message') }}</p>
                                </div>
                            </div>
                        @endif
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="app_name" value="{{ $setting->app_name }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_name') is-invalid @enderror"
                                               required id="app_name">
                                        <label class="form-label-outlined" for="app_name">
                                            <strong class="text-uppercase">App Name</strong>
                                        </label>
                                    </div>
                                </div>
                                @error('app_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="email" name="app_email" value="{{ $setting->app_email }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_email') is-invalid @enderror"
                                               required id="app_email">
                                        <label class="form-label-outlined" for="app_email"><strong
                                                class="text-uppercase">App Email</strong></label>
                                    </div>
                                </div>
                                @error('app_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="email" name="app_email_2" value="{{ $setting->app_email_2 }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_email_2') is-invalid @enderror"
                                               id="app_email_2">
                                        <label class="form-label-outlined" for="app_email_2"><strong
                                                class="text-uppercase">App Email Two</strong></label>
                                    </div>
                                </div>
                                @error('app_email_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="email" name="app_email_3" value="{{ $setting->app_email_3 }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_email_3') is-invalid @enderror"
                                               id="app_email_3">
                                        <label class="form-label-outlined" for="app_email_3"><strong
                                                class="text-uppercase">App Email Three</strong></label>
                                    </div>
                                </div>
                                @error('app_email_3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="app_mobile_no_1"
                                               value="{{ $setting->app_mobile_no_1 }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_mobile_no_1') is-invalid @enderror"
                                               required id="app_mobile_no_1">
                                        <label class="form-label-outlined" for="app_mobile_no_1"><strong
                                                class="text-uppercase">App Mobile Number One</strong></label>
                                    </div>
                                </div>
                                @error('app_mobile_no_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="app_mobile_no_2"
                                               value="{{ $setting->app_mobile_no_2 }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_mobile_no_2') is-invalid @enderror"
                                               id="app_mobile_no_2">
                                        <label class="form-label-outlined" for="app_mobile_no_2"><strong
                                                class="text-uppercase">App Mobile Number Two</strong></label>
                                    </div>
                                </div>
                                @error('app_mobile_no_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="app_location" value="{{ $setting->app_location }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_location') is-invalid @enderror"
                                               required id="app_location">
                                        <label class="form-label-outlined" for="app_location"><strong
                                                class="text-uppercase">App Location</strong></label>
                                    </div>
                                </div>
                                @error('app_location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="url" name="app_url" value="{{ $setting->app_url }}"
                                               class="form-control form-control-lg form-control-outlined @error('app_url') is-invalid @enderror"
                                               required id="app_url">
                                        <label class="form-label-outlined" for="app_url"><strong class="text-uppercase">App
                                                URL</strong></label>
                                    </div>
                                </div>
                                @error('app_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="timezone" value="{{ $setting->timezone }}"
                                               class="form-control form-control-lg form-control-outlined @error('timezone') is-invalid @enderror"
                                               required id="timezone">
                                        <label class="form-label-outlined" for="timezone"><strong
                                                class="text-uppercase">Timezone</strong></label>
                                    </div>
                                </div>
                                @error('timezone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="facebook_url" value="{{ $setting->facebook_url }}"
                                               class="form-control form-control-lg form-control-outlined @error('facebook_url') is-invalid @enderror"
                                               id="facebook_url">
                                        <label class="form-label-outlined" for="facebook_url">
                                            <strong class="text-uppercase">Facebook URL</strong>
                                        </label>
                                    </div>
                                </div>
                                @error('facebook_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="twitter_url" value="{{ $setting->twitter_url }}"
                                               class="form-control form-control-lg form-control-outlined @error('twitter_url') is-invalid @enderror"
                                               id="twitter_url">
                                        <label class="form-label-outlined" for="twitter_url"><strong
                                                class="text-uppercase">Twitter URL</strong></label>
                                    </div>
                                </div>
                                @error('twitter_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="youtube_url"
                                               value="{{ $setting->youtube_url }}"
                                               class="form-control form-control-lg form-control-outlined @error('youtube_url') is-invalid @enderror"
                                               id="youtube_url">
                                        <label class="form-label-outlined" for="youtube_url"><strong
                                                class="text-uppercase">Youtube URL</strong></label>
                                    </div>
                                </div>
                                @error('youtube_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="instagram_url"
                                               value="{{ $setting->instagram_url }}"
                                               class="form-control form-control-lg form-control-outlined @error('instagram_url') is-invalid @enderror"
                                               id="instagram_url">
                                        <label class="form-label-outlined" for="instagram_url"><strong
                                                class="text-uppercase">Instagram URL</strong></label>
                                    </div>
                                </div>
                                @error('instagram_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="number" name="registration_amount"
                                               value="{{ $setting->registration_amount }}"
                                               class="form-control form-control-lg form-control-outlined @error('registration_amount') is-invalid @enderror"
                                               id="registration_amount">
                                        <label class="form-label-outlined" for="registration_amount"><strong
                                                class="text-uppercase">Registration Amount</strong></label>
                                    </div>
                                </div>
                                @error('registration_amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-control-wrap">
                                    <select id="is_registration_on" data-ui="lg"
                                            name="is_registration_on"
                                            class="form-select form-select-outlined js-select2 @error('is_registration_on') is-invalid @enderror"
                                            required>
                                        <option value="1" {{ $setting->is_registration_on === 1 ? 'selected' : '' }}>
                                            Open
                                        </option>
                                        <option value="0" {{ $setting->is_registration_on === 0 ? 'selected' : '' }}>
                                            Closed
                                        </option>
                                    </select>
                                    <label class="form-label-outlined"
                                           for="is_registration_on">
                                        {{ __('Registration Status') }}
                                        <span class="text-danger font-weight-bold">*</span>
                                    </label>
                                    @error('is_registration_on')
                                    <div class="invalid-feedback font-weight-bold">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary btn-lg mt-2" type="submit">Save Settings</button>
                            </div>
                        </div>
                    </form>
                    @if(auth()->user()->hasRole('developer'))
                        <hr class="mt-5">
                        <hr>
                        <form class="container mt-5 needs-validation" novalidate
                              action="{{ route('user.settings.server.store') }}"
                              enctype="multipart/form-data" method="POST">
                            @if(session('server_is_registration_on_message') && session('server_status_type'))
                                <div class="alert alert-pro alert-{{ session('server_status_type') }}">
                                    <div class="alert-text"><h6>Setting Successfully updated</h6>
                                        <p>{{ session('server_status_message') }}</p>
                                    </div>
                                </div>
                            @endif
                            @method('PUT')
                            @csrf
                            <div class="nk-block-head mb-4">
                                <div class="nk-block-head-content">
                                    <h4 class="title nk-block-title text-uppercase">Manage Server Settings</h4>
                                    <div class="nk-block-des">
                                        <p>
                                            You are currently editing a server details on this website, kindly confirm
                                            your update as this could break the website entirely.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <select name="is_live" data-ui="lg"
                                                    class="form-select form-control-lg form-control-outlined @error('is_live') is-invalid @enderror"
                                                    id="is_live" required>
                                                <option value="" hidden>Select an Option</option>
                                                <option value="1" {{ $setting->is_live ? 'selected' : '' }}>Online
                                                </option>
                                                <option value="0" {{ !$setting->is_live ? 'selected' : '' }}>Offline
                                                </option>
                                            </select>
                                            <label class="form-label-outlined" for="is_live"><strong
                                                    class="text-uppercase">Server Status</strong></label>
                                        </div>
                                    </div>
                                    @error('is_live')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <select name="is_website_locked" data-ui="lg"
                                                    class="form-select form-control-lg form-control-outlined @error('is_website_locked') is-invalid @enderror"
                                                    id="is_website_locked" required>
                                                <option value="" hidden>Select an Option</option>
                                                <option value="1" {{ $setting->is_website_locked ? 'selected' : '' }}>
                                                    Lock
                                                </option>
                                                <option value="0" {{ !$setting->is_website_locked ? 'selected' : '' }}>
                                                    Unlock
                                                </option>
                                            </select>
                                            <label class="form-label-outlined" for="is_website_locked"><strong
                                                    class="text-uppercase">Website Status</strong></label>
                                        </div>
                                    </div>
                                    @error('is_website_locked')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <select name="app_debug" data-ui="lg"
                                                    class="form-select form-control-lg form-control-outlined @error('app_debug') is-invalid @enderror"
                                                    id="app_debug" required>
                                                <option value="" hidden>Select an Option</option>
                                                <option value="1" {{ $setting->app_debug ? 'selected' : '' }}>
                                                    System Debugging Online
                                                </option>
                                                <option value="0" {{ !$setting->app_debug ? 'selected' : '' }}>
                                                    System Debugging Offline
                                                </option>
                                            </select>
                                            <label class="form-label-outlined" for="app_debug"><strong
                                                    class="text-uppercase">Website Status</strong></label>
                                        </div>
                                    </div>
                                    @error('is_website_locked')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <input type="text" name="mail_mailer"
                                                   value="{{ $setting->mail_mailer }}"
                                                   class="form-control form-control-lg form-control-outlined @error('mail_mailer') is-invalid @enderror"
                                                   required id="mail_mailer">
                                            <label class="form-label-outlined" for="mail_mailer"><strong
                                                    class="text-uppercase">Mail Mailer</strong></label>
                                        </div>
                                    </div>
                                    @error('mail_mailer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <input type="text" name="mail_host"
                                                   value="{{ $setting->mail_host }}"
                                                   class="form-control form-control-lg form-control-outlined @error('mail_host') is-invalid @enderror"
                                                   required id="mail_host">
                                            <label class="form-label-outlined" for="mail_host"><strong
                                                    class="text-uppercase">Mail Host</strong></label>
                                        </div>
                                    </div>
                                    @error('mail_host')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <input type="number" name="mail_port"
                                                   value="{{ $setting->mail_port }}"
                                                   class="form-control form-control-lg form-control-outlined @error('mail_port') is-invalid @enderror"
                                                   required id="mail_port">
                                            <label class="form-label-outlined" for="mail_port"><strong
                                                    class="text-uppercase">Mail Port</strong></label>
                                        </div>
                                    </div>
                                    @error('mail_port')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <input type="text" name="mail_username"
                                                   value="{{ $setting->mail_username }}"
                                                   class="form-control form-control-lg form-control-outlined @error('mail_username') is-invalid @enderror"
                                                   required id="mail_username">
                                            <label class="form-label-outlined" for="mail_username"><strong
                                                    class="text-uppercase">Mail Username</strong></label>
                                        </div>
                                    </div>
                                    @error('mail_username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <div class="input-group">
                                                <input type="password" name="mail_password"
                                                       value="{{ $setting->mail_password }}"
                                                       class="form-control form-control-lg form-control-outlined @error('mail_password') is-invalid @enderror"
                                                       required id="mail_password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary btn-primary rounded seen"
                                                            type="button">
                                                        <em class="icon ni ni-eye-alt-fill text-white"></em>
                                                    </button>
                                                </div>
                                                <label class="form-label-outlined" for="mail_password"><strong
                                                        class="text-uppercase">Mail Password</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('mail_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="form-control-wrap">
                                            <input type="text" name="mail_encryption"
                                                   value="{{ $setting->mail_encryption }}"
                                                   class="form-control form-control-lg form-control-outlined @error('mail_encryption') is-invalid @enderror"
                                                   required id="mail_encryption">
                                            <label class="form-label-outlined" for="mail_encryption"><strong
                                                    class="text-uppercase">Mail Encryption</strong></label>
                                        </div>
                                    </div>
                                    @error('mail_encryption')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn-lg mt-2" type="submit">Save Settings</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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

        const visibility_btn = document.querySelector('.seen');
        const password_input = document.querySelector('#mail_password');

        visibility_btn.addEventListener('click', () => {
            if (password_input.type === 'password') {
                password_input.type = 'text';
            } else {
                password_input.type = 'password';
            }
        });
    </script>
@endsection
