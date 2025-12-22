@extends('layouts.app')

@section('content')
    <div class="modal-content">
        <a href="{{ url()->previous() }}" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-md">
            <h5 class="title">Change Password</h5>
            <form id="needs-validation" novalidate action="{{ route('user.profile.change_password.edit', auth()->user()->id) }}"  method="POST">
                <hr>
                @if(session('status'))
                    <div class="alert alert-pro alert-success">
                        <div class="alert-text"><h6>Password Successfully updated</h6>
                            <p>{{ session('status') }}</p>
                        </div>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-pro alert-danger">
                        <div class="alert-text"><h6>Password doesn't match</h6>
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                @endif
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                    <div class="form-control-wrap">
                        <input type="email" name="email"
                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                               id="email" value="{{ auth()->user()->email }}" readonly
                               required autocomplete="off">
                        @error('email')
                        <div class="invalid-feedback font-weight-bold">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="current_password">Current Password <span class="text-danger">*</span></label>
                    <div class="form-control-wrap">
                        <input type="password" name="current_password"
                               class="form-control form-control-lg @error('current_password') is-invalid @enderror"
                               id="current_password"
                               placeholder="Enter Current Password" required maxlength="190" autocomplete="off">
                        @error('current_password')
                        <div class="invalid-feedback font-weight-bold">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="new_password">New Password <span class="text-danger">*</span></label>
                    <div class="form-control-wrap">
                        <input type="password" name="new_password"
                               class="form-control form-control-lg @error('new_password') is-invalid @enderror"
                               id="new_password"
                               placeholder="Enter new password" required
                               maxlength="190" autocomplete="off">
                        @error('new_password')
                        <div class="invalid-feedback font-weight-bold">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="confirm_password">Retype New Password <span
                            class="text-danger">*</span></label>
                    <div class="form-control-wrap">
                        <input type="password" name="confirm_password"
                               class="form-control form-control-lg @error('confirm_password') is-invalid @enderror"
                               id="confirm_password"
                               placeholder="Retype new password"
                               required maxlength="190" autocomplete="off">
                        @error('confirm_password')
                        <div class="invalid-feedback font-weight-bold">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                    <li>
                        <button type="submit" id="update-password" class="btn btn-primary">Update Password</button>
                    </li>
                    <li>
                        <a href="{{ url()->previous() }}" class="link link-light">Cancel</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@endsection
