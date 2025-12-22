@props([
    'items' => [],
    'title' => 'Slider',
    'subtitle' => '',
    'imagePath' => 'website_assets/img/gallery/',
    'sectionClass' => 'pt-120 pb-120',
    'sliderId' => 'carousel-slider',
    'slidesPerView' => 3,
    'spaceBetween' => 20,
    'showNavigation' => true,
    'showPagination' => true,
    'autoplay' => false,
    'autoplayDelay' => 3000,
    'loop' => true,
])

@if(count($items) > 0)
<section class="carousel-slider__area {{ $sectionClass }}" 
         data-carousel-id="{{ $sliderId }}"
         data-slides-per-view="{{ $slidesPerView }}"
         data-space-between="{{ $spaceBetween }}"
         data-autoplay="{{ $autoplay ? 'true' : 'false' }}"
         data-autoplay-delay="{{ $autoplayDelay }}"
         data-loop="{{ $loop ? 'true' : 'false' }}"
         data-breakpoint-320="1"
         data-breakpoint-576="1"
         data-breakpoint-768="2"
         data-breakpoint-992="3"
         data-breakpoint-1200="3">
    <div class="container">
        @if($title || $subtitle)
        <div class="row">
            <div class="col-12">
                <div class="section__title-wrapper text-center mb-60">
                    @if($title)
                        <h2 class="section__title">{{ $title }}</h2>
                    @endif
                    @if($subtitle)
                        <p class="section__subtitle">{{ $subtitle }}</p>
                    @endif
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="carousel-slider__wrapper">
                    <div class="swiper-container carousel-slider" data-carousel-instance="{{ $sliderId }}">
                        <div class="swiper-wrapper">
                            @foreach($items as $item)
                                <div class="swiper-slide">
                                    <div class="carousel-slider__item">
                                        <div class="carousel-slider__thumb">
                                            @if(isset($item->link) || isset($item['link']))
                                                <a href="{{ $item->link ?? $item['link'] }}" class="carousel-slider__link">
                                            @else
                                                <a href="{{ asset($imagePath . ($item->img ?? $item['img'] ?? '')) }}" 
                                                   data-fancybox="carousel-{{ $sliderId }}" 
                                                   data-caption="{{ $item->caption ?? $item['caption'] ?? $item->title ?? $item['title'] ?? '' }}"
                                                   class="carousel-slider__link">
                                            @endif
                                                <img src="{{ asset($imagePath . ($item->img ?? $item['img'] ?? '')) }}" 
                                                     alt="{{ $item->title ?? $item['title'] ?? 'Slide' }}" 
                                                     class="carousel-slider__img">
                                                @if(isset($item->title) || isset($item['title']))
                                                    <div class="carousel-slider__overlay">
                                                        <div class="carousel-slider__content">
                                                            <h4 class="carousel-slider__title">{{ $item->title ?? $item['title'] }}</h4>
                                                            @if(isset($item->caption) || isset($item['caption']))
                                                                <p class="carousel-slider__caption">{{ Str::limit($item->caption ?? $item['caption'], 80) }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($showNavigation)
                            <div class="swiper-button-prev carousel-slider__button-prev"></div>
                            <div class="swiper-button-next carousel-slider__button-next"></div>
                        @endif
                        @if($showPagination)
                            <div class="swiper-pagination carousel-slider__pagination"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

