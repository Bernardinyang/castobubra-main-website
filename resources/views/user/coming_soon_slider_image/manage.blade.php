@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content"><h3 class="nk-block-title page-title">Manage Coming Soon Sliders</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ route('coming-soon-slider-image.create') }}" class="btn btn-primary">
                                                <em class="icon ni ni-plus-fill-c"></em>
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
                            <div class="alert-text"><h6>Image Successfully deleted</h6>
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
                                <th scope="col">Caption</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coming_soon_slider_images as $key => $coming_soon_slider_image)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ asset('coming_soon_assets/img/coming-soon-slider-image/' . $coming_soon_slider_image->img) }}" target="_blank">
                                            <img src="{{ asset('coming_soon_assets/img/coming-soon-slider-image/' . $coming_soon_slider_image->img) }}" alt="{{ $coming_soon_slider_image->title }}" width="50px">
                                        </a>
                                    </td>
                                    <td>{{ $coming_soon_slider_image->title }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('coming-soon-slider-image.show', $coming_soon_slider_image->id) }}" class="btn btn-primary">
                                                <em class="icon ni ni-eye-fill"></em>
{{--                                                View--}}
                                            </a>
                                            <a href="{{ route('coming-soon-slider-image.edit', $coming_soon_slider_image->id) }}" class="btn btn-secondary">
                                                <em class="icon ni ni-pen-fill"></em>
{{--                                                Edit--}}
                                            </a>
                                            <form class="btn btn-danger" onclick="this.submit()" action="{{ route('coming-soon-slider-image.destroy', $coming_soon_slider_image->id) }}" method="POST">
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
