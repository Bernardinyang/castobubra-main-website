@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View News</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'news-alert', 'id' => $news_alert->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="container">
                        @if(session('status_message'))
                            <div class="alert alert-pro alert-success">
                                <div class="alert-text">
                                    <p>{{ session('status_message') }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title">Title</label>
                                <input type="text" disabled readonly
                                       class="form-control form-control-lg"
                                       id="title" value="{{ $news_alert->title }}">
                            </div>
                            <div class="col-12">
                                <hr>
                                <label for="desc" class="bg-light p-4 d-block font-weight-bold text-uppercase">Details</label>
                                {!! $news_alert->details !!}
                            </div>
                            <div class="col-12">
                                <hr>
                                @if($news_alert->is_active)
                                    <a href="{{ route('user.news-alert.deactivate', $news_alert->id) }}"
                                       class="btn btn-danger mt-4" type="submit">Deactivate</a>
                                @else
                                    <a href="{{ route('user.news-alert.activate', $news_alert->id) }}"
                                       class="btn btn-primary mt-4" type="submit">Activate</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
