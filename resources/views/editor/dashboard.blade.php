@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">System Overview</h3>
                            <div class="nk-block-des text-soft"><p>Welcome to Editor's Dashboard.</p></div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-4 col-xxl-12">
                            <div class="card card-bordered">
                                <div class="card-inner bg-light">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title text-uppercase">Posts</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left"
                                                data-original-title="Total number of post data"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount">{{ $posts }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="{{ route('post.index') }}" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-12">
                            <div class="card card-bordered">
                                <div class="card-inner bg-light">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title text-uppercase">Categories</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left" data-original-title="Total number of categories"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount">{{ $categories }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="{{ route('category.index') }}" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-12">
                            <div class="card card-bordered">
                                <div class="card-inner bg-light">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title text-uppercase">Tags</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left"
                                                data-original-title="Total number of tags"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount">{{ $tags }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="{{ route('tag.index') }}" class="btn btn-primary">View
                                        All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
