@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">System Overview</h3>
                            <div class="nk-block-des text-soft text-capitalize"><p>Welcome to
                                    CASTObubra {{ auth()->user()->getRole->name }}'s Dashboard.</p></div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs">
                        @if(auth()->user()->hasRole(['developer']))
                            <div class="col-lg-4 col-xxl-12">
                                <div class="card card-bordered">
                                    <div class="card-inner bg-light">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title text-uppercase">Board Of Trustees</h6>
                                            </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                    data-placement="left"
                                                    data-original-title="Total number of Executive Members"></em>
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">{{ $board_members }}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="{{ route('bot.index') }}" class="btn btn-danger">View All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xxl-12">
                                <div class="card card-bordered">
                                    <div class="card-inner bg-light">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title text-uppercase">System Users</h6>
                                            </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                    data-placement="left"
                                                    data-original-title="Total number users on the system"></em>
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">{{ $system_users }}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="{{ route('system_user.index') }}" class="btn btn-danger">View
                                            All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xxl-12">
                                <div class="card card-bordered">
                                    <div class="card-inner bg-light">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title text-uppercase">Coming Soon Slider</h6>
                                            </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                    data-placement="left"
                                                    data-original-title="Total number of coming soon slider"></em>
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">{{ $coming_slider_image_count }}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="{{ route('coming-soon-slider-image.index') }}" class="btn btn-danger">View
                                            All</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-4 col-xxl-12">
                            <div class="card card-bordered">
                                <div class="card-inner bg-light">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title text-uppercase">Contact Messages</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left"
                                                data-original-title="Total number of contact messages"></em>
                                        </div>
                                    </div>
                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                        <div class="nk-sale-data">
                                            <span class="amount">{{ $contact }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="{{ route('user.contacts') }}" class="btn btn-danger">View All</a>
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->hasRole(['developer']))
                            <div class="col-lg-4 col-xxl-12">
                                <div class="card card-bordered">
                                    <div class="card-inner bg-light">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title text-uppercase">Subscribers List</h6>
                                            </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                    data-placement="left"
                                                    data-original-title="Total number of Email Subscribers"></em>
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">{{ $subscribers }}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="{{ route('user.subscribers') }}" class="btn btn-danger">View
                                            All</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
