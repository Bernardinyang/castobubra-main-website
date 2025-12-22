@if($cta)
<section class="cta__area pb-100 pt-100" style="background-image: url('{{ asset('website_assets/img/world-map-bg.jpg') }}'); background-size: contain; background-position: center; background-repeat: no-repeat;">
    <div class="cta__overlay"></div>
    <div class="container">
        @if($cta->type === 'image' && $cta->img)
            {{-- Image Type CTA --}}
            <div class="cta__image-wrapper">
                @if($cta->url)
                    <a href="{{ $cta->url }}" class="cta__image-link">
                        <img src="{{ asset('website_assets/img/cta/' . $cta->img) }}" 
                             alt="{{ $cta->title ?: 'CTA Image' }}" 
                             class="cta__image">
                        @if($cta->url_text)
                            <div class="cta__image-overlay">
                                <div class="cta__image-button">{{ $cta->url_text }}</div>
                            </div>
                        @endif
                    </a>
                @else
                    <img src="{{ asset('website_assets/img/cta/' . $cta->img) }}" 
                         alt="{{ $cta->title ?: 'CTA Image' }}" 
                         class="cta__image">
                @endif
            </div>
        @else
            {{-- Text Type CTA --}}
            <div class="cta__inner-3 p-relative grey-bg-2 pt-75 pb-75 fix">
                <div class="cta__shape-3">
                    <img class="cta-2" src="{{ asset('website_assets/img/cta/cta-shape-1.png') }}" alt="">
                    <img class="cta-3" src="{{ asset('website_assets/img/cta/cta-shape-2.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="cta__content text-center p-relative">
                            @if($cta->sup_text)
                                <span>{{ $cta->sup_text }}</span>
                            @endif
                            <h3 class="cta__title-2">{{ $cta->title }}</h3>
                            @if($cta->subtitle)
                                <p class="cta__subtitle">{{ $cta->subtitle }}</p>
                            @endif
                            @if($cta->content)
                                <div style="text-align: justify;">
                                    {!! nl2br(e($cta->content)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($cta->url && $cta->url_text)
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="text-center">
                                <a href="{{ $cta->url }}" class="e-btn e-btn-6">{{ $cta->url_text }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>
@endif
