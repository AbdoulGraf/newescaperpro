<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}"{!! theme()->printHtmlAttributes('html') !!}
    {{ theme()->printHtmlClasses('html') }}>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/uae/logo-menu.webp') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/uae/logo-menu.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/uae/logo-menu.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/uae/logo-menu.webp') }}">
    <link rel="manifest" href="{{ asset('images/uae/logo-menu.webp') }}">


    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="manifest" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-250168513-1"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-250168513-1');
    </script>
    <!-- Google Tag Manager -->

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':

                    new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-KGH983M');
    </script>

    <!-- End Google Tag Manager -->
    <meta name="facebook-domain-verification" content="bnedou4iyh3gat5iuya60wwi17fvic" />







    @yield('meta_tags')
    @include('site.layouts.css')
    @yield('styles')
    @livewireStyles




    @if (App::environment('APP_URL') != 'https://newescapepro.test/')
        @include('site.layouts.tags')
    @endif

</head>

<body>
    <!-- main-area -->
   
        @yield('content')
    <!-- main-area-end -->
    <!-- JS here -->
    @include('site.layouts.js')
    @yield('scripts')
    @livewireScripts


    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5ZF96X" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->

</body>

</html>
