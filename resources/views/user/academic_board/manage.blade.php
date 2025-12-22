@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage Board Members</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    @include('partials.dashboard.__header_action', ['data' => 'academic-board'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status'))
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text"><h6>Board Member Successfully deleted</h6>
                                <p>{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Image</th>
                                <th scope="col">Names</th>
                                <th scope="col">Position</th>
                                <th scope="col">Facebook</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($board_members as $key => $board_member)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ asset('website_assets/img/academic-boards/' . $board_member->image) }}" target="_blank">
                                            <img src="{{ asset('website_assets/img/academic-boards/' . $board_member->image) }}" alt="{{ $board_member->names }}" width="50px">
                                        </a>
                                    </td>
                                    <td>{{ $board_member->names }}</td>
                                    <td>{{ $board_member->position }}</td>
                                    <td>
                                        @if($board_member->facebook_url)
                                            <a href="{{ $board_member->facebook_url }}" target="_blank">{{ $board_member->facebook_url }}</a>
                                        @else
                                            <p>N/A</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('academic-board.show', $board_member->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
{{--                                                View--}}
                                            </a>
                                            <a href="{{ route('academic-board.edit', $board_member->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
{{--                                                Edit--}}
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()" action="{{ route('academic-board.destroy', $board_member->id) }}" method="POST">
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
