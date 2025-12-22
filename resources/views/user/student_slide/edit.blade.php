@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Edit Slide</h3>
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
                    <form class="container" id="needs-validation" novalidate
                          action="{{ route('student-slide.update', $student_slide->id) }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text"><h6>Slide Successfully updated</h6>
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="title">Section Title (e.g., CASTObubra Student Community)</label>
                                <input type="text" name="title"
                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                       id="title" placeholder="Section Title" value="{{ $student_slide->title ?? old('title') }}">
                                <small class="form-text text-muted">This title will be displayed above the student slider section. Leave blank if you don't want to change it.</small>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-4">
                                <hr>
                                <h5 class="mb-3">Student Information</h5>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <label for="names">Names</label>
                                <input type="text" name="names"
                                       class="form-control form-control-lg @error('names') is-invalid @enderror"
                                       id="names" placeholder="Names" required value="{{ $student_slide->names }}">
                                @error('names')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="role">Role</label>
                                <input type="text" name="role"
                                       class="form-control form-control-lg @error('role') is-invalid @enderror"
                                       id="role" placeholder="Role" value="{{ $student_slide->role }}"
                                       required>
                                @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="location">Location</label>
                                <input type="text" name="location"
                                       class="form-control form-control-lg @error('location') is-invalid @enderror"
                                       id="location" placeholder="Address" required value="{{ $student_slide->location }}">
                                @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-4">
                                <hr>
                                <h5 class="mb-3">Media</h5>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="img">Image</label>
                                <input type="file" name="img" accept="image/*"
                                       class="form-control form-control-lg @error('img') is-invalid @enderror"
                                       id="img">
                                <small class="form-text text-muted">Leave blank to keep current image. Upload a circular image (recommended: 36x36px or square)</small>
                                @if($student_slide->img)
                                <div class="mt-2">
                                    <img src="{{ asset('website_assets/img/student-slide-image/' . $student_slide->img) }}" 
                                         alt="Current image" 
                                         style="max-width: 100px; height: auto; border-radius: 50%; border: 2px solid #ddd;">
                                </div>
                                @endif
                                @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-4">
                                <hr>
                                <h5 class="mb-3">Content</h5>
                            </div>
                            
                            <div class="col-12 mb-4">
                                <label for="desc">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" required
                                          name="content" id="desc" cols="20"
                                          rows="10">{{ $student_slide->content }}</textarea>
                                @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary btn-lg" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
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

        ClassicEditor
            .create(document.querySelector('#desc'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [
                        {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                        {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                        {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                        {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                        {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                        {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                        {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'},
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
