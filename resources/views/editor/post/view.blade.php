@extends('layouts.app')

@section('styles')
    @livewireStyles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View Post</h3>
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
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-edit-fill"></em>
                                                <span>Edit</span>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <img src="{{ asset('website_assets/img/posts/' . $post->banner_img) }}"
                                     title="{{ $post->banner_img }}" alt="{{ $post->title }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="title">Title</label>
                                <input type="text" disabled readonly
                                       class="form-control form-control-lg"
                                       id="title" value="{{ $post->title }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="slug" value="{{ $post->slug }}"
                                       disabled readonly>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="category">Category</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="category" disabled readonly value="{{ $post->getCategory->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="tags">Tags</label>
                                <input type="text" id="tags"
                                       class="form-control form-control-lg"
                                       value="{{ $post->tags }}" disabled readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="published_at">Published at</label>
                                <input type="text"
                                       value="{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('M d, Y h:iA') : 'Not published' }}"
                                       class="form-control form-control-lg"
                                       id="published_at" disabled readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="created_at">Created at</label>
                                <input type="text"
                                       value="{{ $post->created_at->format('M d, Y h:iA') }}"
                                       class="form-control form-control-lg"
                                       id="created_at" disabled readonly>
                            </div>
                        </div>
                        <hr>
                        <p>Post Summary</p>
                        <div class="card bg-light p-4" style="border-radius: 5px;">
                            {{ $post->summary }}
                        </div>
                        <hr>
                        <p>Post Content</p>
                        <div class="card p-4" style="border-radius: 5px;">
                            {!! $post->post !!}
                        </div>
                        <livewire:publish-post :post_id="$post->id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @livewireScripts
@endsection
