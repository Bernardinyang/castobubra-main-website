@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage Slides</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'student-slide'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status'))
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text"><h6>Event Successfully deleted</h6>
                                <p>{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Unique ID</th>
                                <th scope="col">Names</th>
                                <th scope="col">Role</th>
                                <th scope="col">Location</th>
                                <th scope="col">Content</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($student_slides as $key => $student_slide)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ asset('website_assets/img/student-slide-image/' . $student_slide->img) }}" target="_blank">
                                            <img src="{{ asset('website_assets/img/student-slide-image/' . $student_slide->img) }}" alt="{{ $student_slide->names }}" width="50px">
                                        </a>
                                    </td>
                                    <td>{{ $student_slide->names }}</td>
                                    <td>{{ $student_slide->role }}</td>
                                    <td>{{ $student_slide->location }}</td>
                                    <td>{{ substr($student_slide->content, 0, 20) }}...</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('student-slide.show', $student_slide->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
{{--                                                View--}}
                                            </a>
                                            <a href="{{ route('student-slide.edit', $student_slide->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
{{--                                                Edit--}}
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()" action="{{ route('student-slide.destroy', $student_slide->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <em class="icon ni ni-trash-fill"></em>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
