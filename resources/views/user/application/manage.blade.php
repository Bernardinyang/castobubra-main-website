@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Manage Applications</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('application.export') }}" class="btn btn-success">
                                                <em class="icon ni ni-download"></em>
                                                <span>Export All (CSV + Documents)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status_type') && session('status_message'))
                        <div class="alert alert-pro alert-{{ session('status_type') }}">
                            <div class="alert-text">
                                <h6>{{ ucfirst(session('status_type')) }}</h6>
                                <p>{{ session('status_message') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Unique ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Programme</th>
                                <th scope="col">Status</th>
                                <th scope="col">Submitted</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($applications as $index => $application)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $application->unique_id }}</strong></td>
                                    <td>{{ $application->full_name }}</td>
                                    <td>{{ $application->email }}</td>
                                    <td>{{ $application->phone_number }}</td>
                                    <td>
                                        @if($application->programme)
                                            <span class="badge badge-info">{{ $application->programme->type }}</span>
                                            <br>{{ $application->programme->name }}
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($application->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($application->status == 'under_review')
                                            <span class="badge badge-info">Under Review</span>
                                        @elseif($application->status == 'accepted')
                                            <span class="badge badge-success">Accepted</span>
                                        @elseif($application->status == 'rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $application->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('application.show', $application->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No applications found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

