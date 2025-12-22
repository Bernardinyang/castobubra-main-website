@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage News</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'news-alert'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status_update'))
                        <div class="alert alert-pro alert-{{ session('status_type') }}">
                            <div class="alert-text"><h6>News Successfully updated</h6>
                                <p>{{ session('status_update') }}</p>
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
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news_alerts as $key => $news_alert)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $news_alert->title }}</td>
                                    @if($news_alert->is_active)
                                        <td>
                                            <span class="badge badge-primary">Active</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger">Inactive</span>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            @if ($news_alert->is_active)
                                                <a href="{{ route('user.news-alert.deactivate', $news_alert->id) }}"
                                                   class="btn btn-warning">
                                                    <em class="icon ni ni-check-round-fill mr-1"></em>
                                                    Deactivate
                                                </a>
                                            @else
                                                <a href="{{ route('user.news-alert.activate', $news_alert->id) }}"
                                                   class="btn btn-success">
                                                    <em class="icon ni ni-check-round-fill mr-1"></em>
                                                    Activate
                                                </a>
                                            @endif
                                            <a href="{{ route('news-alert.show', $news_alert->id) }}"
                                               class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                                {{--                                                View--}}
                                            </a>
                                            <a href="{{ route('news-alert.edit', $news_alert->id) }}"
                                               class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
                                                {{--                                                Edit--}}
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()"
                                                  action="{{ route('news-alert.destroy', $news_alert->id) }}"
                                                  method="POST">
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
