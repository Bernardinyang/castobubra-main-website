@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage Programmes</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('programme.create') }}" class="btn btn-primary">
                                                <em class="icon ni ni-plus-fill-c"></em>
                                                <span>Add Programme</span>
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
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Type</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Order</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($programmes as $index => $programme)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $programme->name }}</td>
                                    <td>{{ $programme->code ?? 'N/A' }}</td>
                                    <td><span class="badge badge-info">{{ $programme->type }}</span></td>
                                    <td>{{ $programme->duration ? $programme->duration . ' years' : 'N/A' }}</td>
                                    <td>{{ $programme->order }}</td>
                                    <td>
                                        @if($programme->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('programme.show', $programme->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                            <a href="{{ route('programme.edit', $programme->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()"
                                                  action="{{ route('programme.destroy', $programme->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <em class="icon ni ni-trash-fill"></em>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No programmes found. <a href="{{ route('programme.create') }}">Add one now</a></td>
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

