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
                                    @include('partials.dashboard.__header_action', ['data' => 'sug-excos'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status'))
                        <div class="alert alert-pro alert-danger">
                            <div class="alert-text"><h6>Exco Member Successfully deleted</h6>
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
                            @foreach($sug_exco_members as $key => $sug_exco_member)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ asset('coming_soon_assets/img/sug-excos/' . $sug_exco_member->image) }}" target="_blank">
                                            <img src="{{ asset('coming_soon_assets/img/sug-excos/' . $sug_exco_member->image) }}" alt="{{ $sug_exco_member->names }}" width="50px">
                                        </a>
                                    </td>
                                    <td>{{ $sug_exco_member->names }}</td>
                                    <td>{{ $sug_exco_member->position }}</td>
                                    <td>
                                        @if($sug_exco_member->facebook_url)
                                            <a href="{{ $sug_exco_member->facebook_url }}" target="_blank">{{ $sug_exco_member->facebook_url }}</a>
                                        @else
                                            <p>N/A</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('sug-excos.show', $sug_exco_member->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                            <a href="{{ route('sug-excos.edit', $sug_exco_member->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()" action="{{ route('sug-excos.destroy', $sug_exco_member->id) }}" method="POST">
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
