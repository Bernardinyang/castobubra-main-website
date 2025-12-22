<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $title }}</title>
<meta content="{{ $description }}" name="description"/>

<link rel="canonical" href="{{ \Illuminate\Support\Facades\Request::url() }}"/>
<meta property="og:locale" content="en_US"/>

<!--twitter og-->
@php
    $ogImageUrl = asset('assets/images/opengraph.jpg');
@endphp
<meta name="twitter:site" content="@castobubra_ng">
<meta name="twitter:creator" content="@castobubra_ng">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta content="{{ $description }}" property="twitter:description"/>
<meta name="twitter:image" content="{{ $ogImageUrl }}">

<!--facebook og-->
<meta property="og:url" content="{{ \Illuminate\Support\Facades\Request::url() }}">
<meta property="og:title" content="{{ $title }}">
<meta content="{{ $description }}" property="og:description"/>
<meta property="og:image" content="{{ $ogImageUrl }}">
<meta property="og:image:secure_url" content="{{ $ogImageUrl }}">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="600">
<meta property="og:type" content="website"/>

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('website_assets/img/castobubra-sidebar-image.jpg') }}">
<link rel="icon" type="image/jpg" href="{{ asset('website_assets/img/castobubra-sidebar-image.jpg') }}">
<link rel="apple-touch-icon" href="{{ asset('website_assets/img/castobubra-sidebar-image.jpg') }}">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3FB2E10GXR"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-3FB2E10GXR');
</script>
