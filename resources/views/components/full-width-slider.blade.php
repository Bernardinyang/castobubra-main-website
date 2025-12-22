@props([
    'items' => [],
    'title' => 'Slider',
    'subtitle' => '',
    'imagePath' => 'website_assets/img/gallery/',
    'sectionClass' => 'pt-120 pb-120 grey-bg',
    'sliderId' => 'full-width-slider',
    'lightboxGroup' => 'gallery',
    'showOverlay' => true,
    'thumbnailSize' => 80,
])

@if(count($items) > 0)
<section class="gallery__area {{ $sectionClass }}" data-slider-id="{{ $sliderId }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title-wrapper text-center mb-60">
                    <h2 class="section__title">{{ $title }}</h2>
                    @if($subtitle)
                        <p class="section__subtitle">{{ $subtitle }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="gallery__slider-wrapper">
                    <div class="gallery__slider-3" data-slider-instance="{{ $sliderId }}">
                        <div class="swiper-container gallery-text mb-35" data-main-slider="{{ $sliderId }}">
                            <div class="swiper-wrapper">
                                @foreach($items as $item)
                                    <div class="swiper-slide">
                                        <div class="gallery__item">
                                            <div class="gallery__thumb">
                                                @if(isset($item->link) || isset($item['link']))
                                                    <a href="{{ $item->link ?? $item['link'] }}" 
                                                       data-fancybox="{{ $lightboxGroup }}" 
                                                       data-caption="{{ $item->caption ?? $item['caption'] ?? $item->title ?? $item['title'] ?? '' }}"
                                                       class="gallery__link">
                                                @else
                                                    <a href="{{ asset($imagePath . ($item->img ?? $item['img'] ?? '')) }}" 
                                                       data-fancybox="{{ $lightboxGroup }}" 
                                                       data-caption="{{ $item->caption ?? $item['caption'] ?? $item->title ?? $item['title'] ?? '' }}"
                                                       class="gallery__link">
                                                @endif
                                                    <img src="{{ asset($imagePath . ($item->img ?? $item['img'] ?? '')) }}" 
                                                         alt="{{ $item->title ?? $item['title'] ?? 'Slide' }}" 
                                                         class="gallery__img">
                                                    @if($showOverlay)
                                                        <div class="gallery__overlay">
                                                            <div class="gallery__content">
                                                                <h4 class="gallery__title">{{ $item->title ?? $item['title'] ?? 'Slide' }}</h4>
                                                                @if(isset($item->caption) || isset($item['caption']))
                                                                    <p class="gallery__caption">{{ Str::limit($item->caption ?? $item['caption'], 80) }}</p>
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
                        </div>
                        <div class="swiper-container gallery-nav" data-nav-slider="{{ $sliderId }}">
                            <div class="swiper-wrapper">
                                @foreach($items as $index => $item)
                                    <div class="swiper-slide" data-slide-index="{{ $index }}">
                                        <div class="gallery__nav-thumb" style="cursor: pointer;">
                                            <img src="{{ asset($imagePath . ($item->img ?? $item['img'] ?? '')) }}" 
                                                 alt="{{ $item->title ?? $item['title'] ?? 'Thumbnail' }}"
                                                 style="width: {{ $thumbnailSize }}px; height: {{ $thumbnailSize }}px;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

