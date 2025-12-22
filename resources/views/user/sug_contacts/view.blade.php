@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View Contact Message</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('user.sug_contacts') }}" class="btn btn-secondary">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                <span>Back</span>
                                            </a>
                                        </li>
                                        @if(auth()->user()->hasRole('developer'))
                                            <li class="nk-block-tools-opt">
                                                <form class="btn btn-danger" onclick="this.submit()"
                                                      action="{{ route('user.sug_contact.destroy', $contact->unique_id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <em class="icon ni ni-trash-fill"></em>
                                                    <span>Delete</span>
                                                </form>
                                            </li>
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="unique_id">Unique ID</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="unique_id" value="{{ $contact->unique_id }}">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="names">Names</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="names" value="{{ $contact->names }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="email" value="{{ $contact->email }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="mobile_no" value="{{ $contact->mobile_no }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label for="email">First Read By</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="email" value="{{ $contact->user->name }} - {{ $contact->user->email }}">
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="mobile_no">First Read At</label>
                                <input type="text" readonly disabled
                                       class="form-control form-control-lg"
                                       id="mobile_no"
                                       value="{{ \Carbon\Carbon::parse($contact->is_read)->format('d F, Y h:i:sA') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="message">Message</label>
                                <textarea class="form-control" disabled readonly id="message" cols="20"
                                          rows="10">{{ $contact->message }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
