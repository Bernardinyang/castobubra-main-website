@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View FAQ</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('faq.index') }}" class="btn btn-secondary">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                <span>Back</span>
                                            </a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-edit-fill"></em>
                                                <span>Edit</span>
                                            </a>
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
                            <div class="col-md-12 mb-3">
                                <label for="question">Question</label>
                                <input type="text" disabled readonly
                                       class="form-control form-control-lg"
                                       id="question" value="{{ $faq->question }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="answer">Answer</label>
                                <div class="card bg-light p-4" style="border-radius: 5px;">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="order">Display Order</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="order" value="{{ $faq->order }}" disabled readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="status">Status</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="status" value="{{ $faq->is_active ? 'Active' : 'Inactive' }}" disabled readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="created_at">Created at</label>
                                <input type="text"
                                       value="{{ \App\Http\Services\DateHelperService::formatTimestamp($faq->created_at) }}"
                                       class="form-control form-control-lg"
                                       id="created_at" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

