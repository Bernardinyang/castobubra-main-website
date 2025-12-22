@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Manage Contacts Messages</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status'))
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text">
                                <h6>Message Successfully deleted</h6>
                                <p>{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Names</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $key => $contact)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $contact->names }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->mobile_no }}</td>
                                    <td>{{ substr($contact->message, 0, 30) }}...</td>
                                    <td>
                                        @if($contact->is_read)
                                            <p class="badge badge-circle badge-primary">Read</p>
                                        @else
                                            <p class="badge badge-circle badge-danger">Unread</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('user.sug_contact.show', $contact->unique_id) }}"
                                               class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                                {{--                                                View--}}
                                            </a>
                                            @if(auth()->user()->hasRole('developer'))
                                                <form class="btn btn-danger" onclick="this.submit()"
                                                      action="{{ route('user.sug_contact.destroy', $contact->unique_id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <em class="icon ni ni-trash-fill"></em>
                                                </form>
                                            @endif
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
