<div class="nk-sidebar nk-sidebar-fixed is-dark nk-sidebar-active" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none toggle-active" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="{{ route('user.dashboard') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('assets/images/castobubra_logo_light.png') }}" width="100%"
                     srcset="{{ asset('assets/images/castobubra_logo_light.png') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('assets/images/castobubra_logo_light.png') }}" width="100%"
                     srcset="{{ asset('assets/images/castobubra_logo_light.png') }}" alt="logo">
            </a>
        </div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -24px 0px -48px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 24px 0 48px;">
                                    <ul class="nk-menu">
                                        <li class="nk-menu-item active current-page">
                                            <a href="{{ route('user.dashboard') }}" class="nk-menu-link"
                                               data-original-title="" title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-home-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">Dashboard</span>
                                            </a>
                                        </li>
                                        @if(auth()->user()->hasRoles(['developer']))
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-building-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Governing Councils</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('bot.create') }}" class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Governing Council</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('bot.index') }}" class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Governing Councils</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-grid-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Academic Boards</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('academic-board.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Academic Board</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('academic-board.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Academic Boards</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-book-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Academic Staffs</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('academic-staff.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Non Academic Staff</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('academic-staff.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Non Academic Boards</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-users-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Non Academic Staffs</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('non-academic-staff.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Non Academic Staff</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('non-academic-staff.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Non Academic Boards</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-star-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">SUG Exco Members</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('sug-excos.create') }}" class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Exco Member</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('sug-excos.index') }}" class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Exco Members</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-user-add-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">System Users</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('system_user.create') }}" class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add System User</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('system_user.index') }}" class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage System Users</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        @if(auth()->user()->hasRoles(['developer', 'admin']))
                                            <li class="nk-menu-item">
                                                <a href="{{ route('user.contacts') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-contact-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Manage Contacts</span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="{{ route('user.sug_contacts') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-contact-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Manage SUG Contacts</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(auth()->user()->hasRoles(['developer']))
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-img-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Coming Soon Slider</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('coming-soon-slider-image.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Image</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('coming-soon-slider-image.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Images</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-img-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Website Slider</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('slider-image.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Image</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('slider-image.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Images</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-camera-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Gallery</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('gallery.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Image</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('gallery.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Images</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-book-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Programmes</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('programme.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Programme</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('programme.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Programmes</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-file-text-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Applications</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('application.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Applications</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('application.export') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Export to CSV</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="{{ route('user.welcome-section') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-home-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Welcome Section</span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-chat-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Wise Quotes</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('wise-talk.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Quote</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('wise-talk.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Quote</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-help"></em>
                                                </span>
                                                    <span class="nk-menu-text">FAQ</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('faq.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add FAQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('faq.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage FAQs</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item has-sub">
                                                <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                                   title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-share"></em>
                                                </span>
                                                    <span class="nk-menu-text">Social Media</span>
                                                </a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('social-media.create') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Add Social Media</span>
                                                        </a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="{{ route('social-media.index') }}"
                                                           class="nk-menu-link"
                                                           data-original-title="" title="">
                                                            <span class="nk-menu-text">Manage Social Media</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="{{ route('user.subscribers') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-mail-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Manage Subscribers</span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="{{ route('user.settings') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-setting-fill"></em>
                                                </span>
                                                    <span class="nk-menu-text">Manage System Settings</span>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="nk-menu-item has-sub {{ str_contains(\Illuminate\Support\Facades\Request::path(), 'editor/post') ? 'active' : '' }}">
                                            <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                                                <span class="nk-menu-text">Posts</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item {{ str_contains(\Illuminate\Support\Facades\Request::path(), 'editor/post/create') ? 'active' : '' }}">
                                                    <a href="{{ route('post.create') }}"
                                                       class="nk-menu-link">
                                                        <span class="nk-menu-text">Add Post</span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item {{ str_contains(\Illuminate\Support\Facades\Request::path(), 'editor/post') ? 'active' : '' }}">
                                                    <a href="{{ route('post.index') }}"
                                                       class="nk-menu-link">
                                                        <span class="nk-menu-text">Manage Posts</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item has-sub {{ str_contains(\Illuminate\Support\Facades\Request::path(), 'editor/category') ? 'active' : '' }}">
                                            <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                                                <span class="nk-menu-text">Categories</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item {{ str_contains(\Illuminate\Support\Facades\Request::path(), 'category/create') ? 'active' : '' }}">
                                                    <a href="{{ route('category.create') }}"
                                                       class="nk-menu-link">
                                                        <span class="nk-menu-text">Add Category</span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item {{ str_contains(\Illuminate\Support\Facades\Request::path(), 'editor/category') ? 'active' : '' }}">
                                                    <a href="{{ route('category.index') }}"
                                                       class="nk-menu-link">
                                                        <span class="nk-menu-text">Manage Categories</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item {{ str_contains(\Illuminate\Support\Facades\Request::path(), 'editor/tag') ? 'active' : '' }}">
                                            <a href="{{ route('tag.index') }}"
                                               class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-tags-fill"></em></span>
                                                <span class="nk-menu-text">Tags</span>
                                            </a>
                                        </li>

                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                               title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-alert-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">Website News Bar</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('news-bar.create') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Add News</span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('news-bar.index') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Manage News</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                               title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-alert-circle-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">Student News Bar</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('student-news-bar.create') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Add News</span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('student-news-bar.index') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Manage News</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                               title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-masonry-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">News Alerts</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('news-alert.create') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Add News</span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('news-alert.index') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Manage News</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title=""
                                               title="">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-camera-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">Student Community Slides</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('student-slide.create') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Add Slide</span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{ route('student-slide.index') }}"
                                                       class="nk-menu-link"
                                                       data-original-title="" title="">
                                                        <span class="nk-menu-text">Manage Slides</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('user.student.community') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-users-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">Student Community</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('user.cta') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-call-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">Call to Action</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1388px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                         `style="height: 262px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
