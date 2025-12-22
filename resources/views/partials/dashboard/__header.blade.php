<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{ route('website.home') }}" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('assets/images/castobubra_logo.png') }}" width="100%"
                         srcset="{{ asset('assets/images/castobubra_logo.png') }}" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('assets/images/castobubra_logo.png') }}" width="100%"
                         srcset="{{ asset('assets/images/castobubra_logo.png') }}" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            {{--            <div class="nk-header-news d-none d-xl-block">--}}
            {{--                <div class="nk-news-list">--}}
            {{--                    <a class="nk-news-item" href="#">--}}
            {{--                        <div class="nk-news-icon">--}}
            {{--                            <em class="icon ni ni-card-view"></em>--}}
            {{--                        </div>--}}
            {{--                        <div class="nk-news-text">--}}
            {{--                            <p>Do you know the latest update of 2019? <span> A overview of our is now available on YouTube</span></p>--}}
            {{--                            <em class="icon ni ni-external"></em>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div><!-- .nk-header-news -->--}}
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status text-capitalize">{{ auth()->user()->getRole->name }}</div>
                                    <div class="user-name dropdown-indicator">{{ auth()->user()->name }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ auth()->user()->name }}</span>
                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner bg-lighter">
                                <ul class="link-list">
                                    {{--                                    <li><a href="{{ route('user.profile.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>--}}
                                    <li><a href="{{ route('user.profile.change_password') }}"><em
                                                class="icon ni ni-setting-alt"></em><span>Change Password</span></a>
                                    </li>
                                    <li><a href="{{ route('user.profile.activity') }}"><em
                                                class="icon ni ni-activity-alt"></em><span>Login Activity</span></a>
                                    </li>
                                    <li><a class="dark-switch" href="#"><em
                                                class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner bg-danger-dim">
                                <ul class="link-list">
                                    <li>
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="text-danger"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                                <em class="icon ni ni-signout"></em><span>{{ __('Log Out') }}</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
