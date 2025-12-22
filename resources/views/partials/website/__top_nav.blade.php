<div class="top-bar">
    <div class="container">
        <div class="main-nav__header-one__top clearfix">
            <div class="main-nav__header-one__top-left">
                <ul class="list-unstyled">
                    <li>
                        <div class="icon">
                            <i class="fas fa-phone-square-alt"></i>
                        </div>
                        <div class="text">
                            <p><a href="tel:{{ \App\Http\Services\HelperService::getSettings()->app_mobile_no_1 }}">{{ \App\Http\Services\HelperService::getSettings()->app_mobile_no_1 }}</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text">
                            <p><a href="mailto:{{ \App\Http\Services\HelperService::getSettings()->app_email }}">{{ \App\Http\Services\HelperService::getSettings()->app_email }}</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            {{--            <div class="main-nav__header-one__top-right">--}}
            {{--                <div class="main-nav__header-one__top-social">--}}
            {{--                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>--}}
            {{--                    <a href="https://www.instagram.com/mediatrixfoundation/" target="_blank"><i--}}
            {{--                            class="fab fa-instagram"></i></a>--}}
            {{--                    <a href="https://web.facebook.com/MDFnigeria" target="_blank"><i class="fab fa-facebook-square"></i></a>--}}
            {{--                    <a href="https://www.youtube.com/channel/UCdZUYkQeMu47GP65xysQIwg" target="_blank"><i--}}
            {{--                            class="fab fa-youtube"></i></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
<div class="news_slide_section">
    <div class="container bg-white">
        <marquee scrolldelay="100" class="news_slide">
            @foreach($website_new_bars as $website_new_bar)
                <span>{{ $website_new_bar->news }}</span>
            @endforeach
        </marquee>
    </div>
</div>

