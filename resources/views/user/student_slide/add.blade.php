@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Add Slide</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('student-slide.index') }}" class="btn btn-secondary">
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
                    <form class="container" id="needs-validation" novalidate action="{{ route('student-slide.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text"><h6>Slide Successfully added</h6>
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="title">Section Title (e.g., CASTObubra Student Community)</label>
                                <input type="text" name="title"
                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                       id="title" placeholder="Section Title" value="{{ old('title') }}">
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
                                       id="names" placeholder="Names" required value="{{ old('names') }}">
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
                                       id="role" placeholder="Role" value="{{ old('role') }}"
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
                                       id="location" placeholder="Address" required value="{{ old('location') }}">
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
                                       id="img" required>
                                <small class="form-text text-muted">Upload a circular image (recommended: 36x36px or square)</small>
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
                                          rows="10">{{ old('content') }}</textarea>
                                @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#desc'), {
                toolbar: ['bold', 'italic', 'link', 'blockQuote'],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
