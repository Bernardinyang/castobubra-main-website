@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Edit Post</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('post.index') }}" class="btn btn-secondary">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                <span>Back</span>
                                            </a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                                <span>View</span>
                                            </a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <form class="btn btn-danger" onclick="this.submit()"
                                                  action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <em class="icon ni ni-trash-fill"></em>
                                                <span>Delete</span>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <form class="container" id="needs-validation" novalidate action="{{ route('post.update', $post->id) }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text"><h6>Post Successfully updated</h6>
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title"
                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                       id="title" placeholder="Title" required value="{{ $post->title }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category">Category</label>
                                <select name="category_id"
                                        class="form-control form-control-lg @error('category_id') is-invalid @enderror"
                                        id="category" required>
                                    <option value="" hidden>Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags"
                                       class="form-control form-control-lg @error('tags') is-invalid @enderror"
                                       id="tags" required  value="{{ $post->tags }}">
                                @error('tags')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small>
                                    Use comma(,) to separate each tag.
                                </small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="banner_img">Banner Image</label>
                                <input type="file" name="banner_img" accept="image/*"
                                       class="form-control form-control-lg @error('banner_img') is-invalid @enderror"
                                       id="banner_img">
                                @error('banner_img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <small>
                                    Leave Blank to use previous uploaded image
                                </small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="date_of_event">Date of Publish</label>
                                <input type="date" name="date_of_event"
                                       class="form-control form-control-lg @error('date_of_event') is-invalid @enderror"
                                       id="date_of_event" required  value="value="{{ $post->date_of_event }}"">
                                @error('date_of_event')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="summary">Summary <strong class="summary_count badge {{ strlen($post->summary) >= 100 ? 'badge-primary' : 'badge-danger' }}">{{ strlen($post->summary) }}</strong></label>
                                <textarea class="form-control @error('summary') is-invalid @enderror" required
                                          name="summary" id="summary" minlength="100" rows="5" style="resize: none; padding: 10px;">{{ $post->summary }}</textarea>
                                @error('summary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="post">Description</label>
                                <textarea class="form-control @error('post') is-invalid @enderror" required
                                          name="post" id="post" cols="20" rows="10">{{ $post->post }}</textarea>
                                @error('post')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <div class="custom-control custom-switch">
                                        <input id="publish" type="checkbox" name="publish"
                                               class="custom-control-input" {{ $post->published_at ? 'checked' : '' }}>
                                        <label for="publish" class="custom-control-label">Publish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary mt-4" type="submit">Submit</button>
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

        class MyUploadAdapter {

            constructor( loader ) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            // Aborts the upload process.
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open( 'POST', '{{ route('image.store') }}', true );
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve( {
                        default: response.url
                    } );
                } );

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            // Prepares the data and sends the request.
            _sendRequest( file ) {
                // Prepare the form data.
                const data = new FormData();

                data.append( 'upload', file );

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send( data );
            }
        }

        function SimpleUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter( loader );
            };
        }

        ClassicEditor
            .create(document.querySelector('#post'), {
                extraPlugins: [ SimpleUploadAdapterPlugin ],
            })
            .catch(error => {
                console.error(error);
            });

        const summary = document.querySelector('#summary');
        const count = document.querySelector('.summary_count');

        summary.addEventListener('keyup', () => {
            count.textContent = summary.value.length;

            if(summary.value.length >= 100) {
                count.classList.remove('badge-danger');
                count.classList.add('badge-primary');
            } else {
                count.classList.add('badge-danger');
                count.classList.remove('badge-primary');
            }
        });
    </script>
@endsection
