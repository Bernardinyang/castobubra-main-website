@extends('layouts.app')

@section('content')

    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">Login Activity</h2>
            <div class="nk-block-des">
                <p>Here is your activities log. <span class="text-soft"><em
                            class="icon ni ni-info tipinfo" title=""
                            data-original-title="Stored activities whenever you login into account."></em></span>
                </p>
            </div>
        </div>
    </div>
    <div class="nk-block">
        @if(count($activities) > 0)
            <div class="card card-bordered">
                <table class="table table-ulogs">
                    <thead class="thead-light">
                    <tr>
                        <th class="tb-col-os"><span class="overline-title">Browser <span
                                    class="d-sm-none">/ IP Address</span></span></th>
                        <th class="tb-col-ip"><span class="overline-title">IP Address</span></th>
                        <th class="tb-col-time"><span class="overline-title">Time</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td class="tb-col-os">{{ $activity->browser }} on {{ $activity->system }}</td>
                            <td class="tb-col-ip"><span class="sub-text">{{ $activity->ip_address }}</span></td>
                            <td class="tb-col-time">
                                <span class="sub-text">{{ $activity->created_at->format('M d, Y') }}  <span
                                        class="d-none d-sm-inline-block"> {{ $activity->created_at->format('h:m:s A') }}</span></span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="nk-block nk-block-xs">
                <div class="nk-odr-list is-stretch card card-bordered ">
                    <div class="nk-odr-item">
                        <div class="nk-odr-col">No records found!</div>
                    </div>
                </div>
                <div class="mt-4">
                </div>
            </div>
        @endif

    </div>

@endsection
