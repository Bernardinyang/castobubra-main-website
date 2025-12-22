@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage Wise Talk</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('wise-talk.create') }}" class="btn btn-secondary">
                                                <em class="icon ni ni-plus"></em>
                                                <span>Add</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status'))
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text"><h6>Quote Successfully deleted</h6>
                                <p>{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Author</th>
                                <th scope="col">Source</th>
                                <th scope="col">Quote</th>
                                <th scope="col">Date Added</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wise_talks as $key => $wise_talk)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $wise_talk->author }}</td>
                                    <td>{{ $wise_talk->source ?: 'N/A' }}</td>
                                    <td>{{ substr($wise_talk->quote, 0, 50) }}...</td>
                                    <td>{{ \App\Http\Services\DateHelperService::formatTimestamp($wise_talk->created_at) }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('wise-talk.show', $wise_talk->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                            <a href="{{ route('wise-talk.edit', $wise_talk->id) }}"
                                               class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()"
                                                  action="{{ route('wise-talk.destroy', $wise_talk->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <em class="icon ni ni-trash-fill"></em>
                                            </form>
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
