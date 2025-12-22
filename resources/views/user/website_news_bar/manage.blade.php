@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage News Bar</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('news-bar.create') }}" class="btn btn-primary">
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
                     @if(session('status_message'))
                        <div class="alert alert-pro alert-{{ session('status_type') }}">
                            <div class="alert-text"><h6>News Successfully updated</h6>
                                <p>{{ session('status_message') }}</p>
                            </div>
                        </div>
                    @endif
                    @if(session('status'))
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text"><h6>News Successfully deleted</h6>
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
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $key => $news_bar)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $news_bar->unique_id }}</td>
                                    <td>{{ $news_bar->news }}</td>
                                        @if ($news_bar->is_active)
                                            <td><span class="badge bg-primary text-white">Active</span></td>
                                        @else
                                            <td><span class="badge bg-danger text-white">Inactive</span></td>
                                        @endif
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('news-bar.edit', $news_bar->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
                                                {{--                                                Edit--}}
                                            </a>
                                            @if ($news_bar->is_active)
                                                <a href="{{ route('news-bar.deactivate', $news_bar->id) }}"
                                                   class="btn btn-warning">
                                                    <em class="icon ni ni-check-round-fill mr-1"></em>
                                                    Deactivate
                                                </a>
                                            @else
                                                <a href="{{ route('news-bar.activate', $news_bar->id) }}"
                                                   class="btn btn-success">
                                                    <em class="icon ni ni-check-round-fill mr-1"></em>
                                                    Activate
                                                </a>
                                            @endif
                                            <form class="btn btn-danger" onclick="this.submit()"
                                                  action="{{ route('news-bar.destroy', $news_bar->id) }}" method="POST">
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
    <script>
    </script>
@endsection
