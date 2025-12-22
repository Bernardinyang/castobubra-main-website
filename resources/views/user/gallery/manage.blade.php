@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage Gallery</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('gallery.create') }}" class="btn btn-primary">
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
                        <div class="alert alert-pro alert-success">
                            <div class="alert-text"><h6>Success</h6>
                                <p>{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Caption</th>
                                <th scope="col">Order</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $key => $gallery)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ asset('website_assets/img/gallery/' . $gallery->img) }}" target="_blank">
                                            <img src="{{ asset('website_assets/img/gallery/' . $gallery->img) }}" alt="{{ $gallery->title }}" width="80px" height="60px" style="object-fit: cover;">
                                        </a>
                                    </td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ Str::limit($gallery->caption, 50) }}</td>
                                    <td>{{ $gallery->order }}</td>
                                    <td>
                                        @if($gallery->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('gallery.show', $gallery->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                            <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
                                            </a>
                                            <form class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete this gallery image?')) { this.submit(); }" action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <em class="icon ni ni-trash-fill"></em>
                                            </form>
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
@endsection

