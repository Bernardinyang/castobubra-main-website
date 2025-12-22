@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View Slide</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'student-slide', 'id' => $student_slide->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <a href="{{ asset('website_assets/img/student-slide-image/' . $student_slide->img) }}" target="_blank">
                                    <img src="{{ asset('website_assets/img/student-slide-image/' . $student_slide->img) }}" alt="{{ $student_slide->names }}" width="300px">
                                </a>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="title">Section Title</label>
                                <input type="text" class="form-control form-control-lg" id="title" disabled readonly
                                       value="{{ $student_slide->title ?? 'Not set' }}" />
                                <small class="form-text text-muted">This title will be displayed above the student slider section on the homepage.</small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="names">Names</label>
                                <input type="text" class="form-control form-control-lg" id="names" disabled readonly
                                       value="{{ $student_slide->names }}" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="role">Role</label>
                                <input type="text" disabled readonly
                                       class="form-control form-control-lg"
                                       id="role" value="{{ $student_slide->role }}"/>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="location">Location</label>
                                <input type="text" disabled readonly
                                       class="form-control form-control-lg"
                                       id="location"
                                       value="{{ $student_slide->location }}" />
                            </div>
                            <div class="col-12">
                                <label for="desc">Content</label>
                                <textarea class="form-control" id="desc" cols="20" disabled readonly
                                          rows="10">{{ $student_slide->content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
