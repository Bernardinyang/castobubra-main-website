<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $metaTitle = "College of Agriculture, Science and Technology, Obubra - Cross River State";
        $metaDescription = "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future";
        $ogImageUrl = asset('assets/images/opengraph.jpg');
    @endphp

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:image:secure_url" content="{{ $ogImageUrl }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@castobubra_ng">
    <meta name="twitter:creator" content="@castobubra_ng">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImageUrl }}">
    
    <link rel="icon" href="{{ asset('website_assets/img/castobubra-sidebar-image.jpg') }}" type="image/jpg">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website_assets/img/castobubra-sidebar-image.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('website_assets/img/castobubra-sidebar-image.jpg') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/jquery.fancybox.min.css') }}">

    <style>
        code {
            font-weight: 700 !important;
        }
        
        .document-preview {
            transition: transform 0.3s ease;
        }
        
        .document-preview:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        /* Override any remaining blue colors with green */
        .nk-footer .nav-link {
            color: #227353 !important;
        }
        
        .nk-footer .nav-link:hover {
            color: #164734 !important;
        }
        
        .user-avatar {
            background: #227353 !important;
        }
        
        .nk-header.is-light {
            background: #fff !important;
        }
    </style>

    @yield('styles')

</head>
<body class="nk-body npc-cryptlite has-sidebar has-sidebar-fat no-touch nk-nio-theme">
<div class="nk-app-root">
    <div class="nk-main ">
        @include('partials.dashboard.__sidebar')
        <div class="nk-wrap ">
            @include('partials.dashboard.__header')
            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                        @section('content')
                        @show
                    </div>
                </div>
            </div>
            @include('partials.dashboard.__footer')
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('website_assets/js/jquery.fancybox.min.js') }}"></script>

@yield('scripts')

</body>
</html>
