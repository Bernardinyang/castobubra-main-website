@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Manage Tags</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Name</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Post Slug</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $key => $tag)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->getPost->title }}</td>
                                    <td>{{ $tag->getPost->slug }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('post.show', $tag->post_id) }}" class="btn btn-secondary">
                                                View Post
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
