<footer>
    <div class="footer__area footer-bg" style="background-image: url('{{ asset('website_assets/img/footer/footer-bg.jpg') }}');">
        <div class="footer__top pt-90 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <div class="footer__logo">
                                    <a href="{{ route('website.home') }}">
                                        <img src="{{ asset('assets/images/castobubra_logo_light.png') }}" width="100%" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="footer__widget-body">
                                <p>We’re committed to Advancing education, research, and innovation that align with national and global development needs.</p>

                                <div class="footer__social">
                                    <ul>
                                        @php
                                            $social_media = \App\Models\SocialMedia::where('is_active', true)
                                                ->orderBy('order', 'asc')
                                                ->orderBy('created_at', 'asc')
                                                ->get();
                                        @endphp
                                        @forelse($social_media as $social)
                                            <li>
                                                <a href="{{ $social->url }}" 
                                                   target="_blank" 
                                                   rel="noopener noreferrer"
                                                   class="{{ $social->color_class ?? '' }}"
                                                   title="{{ $social->name }}">
                                                    <i class="{{ $social->icon_class ?? '' }}"></i>
                                                </a>
                                            </li>
                                        @empty
                                            {{-- Fallback to old system settings if no social media configured --}}
                                            @if(\App\Http\Services\HelperService::getSettings()->facebook_url)
                                                <li>
                                                    <a href="{{ \App\Http\Services\HelperService::getSettings()->facebook_url }}"><i
                                                            class="social_facebook"></i></a>
                                                </li>
                                            @endif
                                            @if(\App\Http\Services\HelperService::getSettings()->twitter_url)
                                                <li>
                                                    <a href="{{ \App\Http\Services\HelperService::getSettings()->twitter_url }}"
                                                       class="tw"><i class="social_twitter"></i></a>
                                                </li>
                                            @endif
                                            @if(\App\Http\Services\HelperService::getSettings()->youtube_url)
                                                <li>
                                                    <a href="{{ \App\Http\Services\HelperService::getSettings()->youtube_url }}"
                                                       class="pin"><i class="social_youtube"></i></a>
                                                </li>
                                            @endif
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-5 offset-sm-1">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">About CASTObubra</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        <li><a href="{{ route('website.about') }}">Our History</a></li>
                                        <li><a href="{{ route('website.vision_and_mission') }}">Vision & Mission</a>
                                        </li>
                                        <li><a href="{{ route('website.our_identity') }}">Our Identity</a></li>
                                        <li><a href="{{ route('website.leadership') }}">Leadership</a></li>
                                        <li><a href="#">Organizational
                                                Chart</a></li>
                                        <!-- <li><a href="{{ route('website.college_song') }}">College Song</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 offset-lg-0 col-md-3 offset-md-1 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">Portals</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        <li><a href="#">Student Portal</a>
                                        </li>
                                        <li><a href="#">Staff Portal</a>
                                        </li>
                                        <li><a href="#">Alumni Portal</a>
                                        </li>
                                        <li><a href="#">Transcript
                                                Portal</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">Academics</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        <li><a href="{{ route('website.requirement') }}">Entry Requirement</a>
                                        </li>
                                        <li><a href="{{ route('website.fees') }}">School Fees</a></li>
                                        <li><a href="#">Department</a></li>
                                        <li><a href="#">Courses</a></li>
                                        <li><a href="{{ route('website.faq') }}">FAQ</a></li>
                                        <li><a href="#">Resources</a></li>
                                        <li><a href="#">Academic
                                                Calender</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">Research & Development</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        <li><a href="#">Publications</a></li>
                                        <li><a href="#">Collaborations and Partnerships</a></li>
                                        <li><a href="#">Investment Opportunities</a></li>
                                        <li><a href="#">Ongoing Projects</a></li>
                                        <li><a href="#">Donors and Sponsors</a></li>
                                        <li><a href="#">Innovation Hub</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="footer__copyright text-center">
                            <p>© {{ date('Y') }} CASTObubra, All Rights Reserved. Built By <a href="" target="_blank">CASTObubra
                                    IT Dept</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
