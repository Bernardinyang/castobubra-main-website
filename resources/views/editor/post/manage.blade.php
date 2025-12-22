@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage Posts</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('post.create') }}" class="btn btn-primary">
                                                <em class="icon ni ni-plus-fill-c"></em>
                                                <span>Add</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status'))
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text"><h6>Post Successfully deleted</h6>
                                <p>{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    @if(session('status_message') && session('status_type'))
                        <div class="alert alert-pro alert-{{ session('status_type') }} mb-3">
                                <p>{{ session('status_message') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Image</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Title</th>
                                <th scope="col">Post</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $key => $post)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        @if($post->banner_img)
                                            <a href="{{ asset('website_assets/img/posts/' . $post->banner_img) }}"
                                               target="_blank">
                                                <img src="{{ asset('website_assets/img/posts/' . $post->banner_img) }}"
                                                     alt="{{ $post->title }}" width="50px">
                                            </a>
                                        @else
                                            <p>N/A</p>
                                        @endif
                                    </td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ substr($post->post, 0, 20) }}...</td>
                                    <td>
                                        @if($post->published_at)
                                            <p class="badge badge-circle badge-primary">Published</p>
                                        @else
                                            <p class="badge badge-circle badge-danger">Not Published</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                                {{--                                                View--}}
                                            </a>
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
                                                {{--                                                Edit--}}
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()"
                                                  action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <em class="icon ni ni-trash-fill"></em>
                                            </form>
                                            <a href="{{ route('post.publish', $post->id) }}" class="btn btn-info">
                                                @if($post->published_at)
                                                    <em class="icon ni ni-eye-off-fill"></em>
                                                @else
                                                    <em class="icon ni ni-check-fill-c"></em>
                                                @endif
                                            </a>
                                        </div>
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
