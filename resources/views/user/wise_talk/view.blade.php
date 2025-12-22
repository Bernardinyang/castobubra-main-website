@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">View Wise Talk</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'wise-talk', 'id' => $wise_talk->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="nk-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="author">Author</label>
                                <input type="text" id="author" readonly disabled value="{{ $wise_talk->author }}"
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="source">Source</label>
                                <input type="text" id="source" readonly disabled value="{{ $wise_talk->source ?: 'N/A' }}"
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="date_added">Date Added</label>
                                <input type="text" id="date_added" readonly disabled value="{{ \App\Http\Services\DateHelperService::formatTimestamp($wise_talk->created_at) }}"
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="quote">Quote</label>
                                <textarea class="form-control" readonly disabled id="quote" cols="20"
                                          rows="10">{{ $wise_talk->quote }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
