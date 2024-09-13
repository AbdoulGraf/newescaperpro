<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}"{!! theme()->printHtmlAttributes('html') !!}
    {{ theme()->printHtmlClasses('html') }}>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Escape Rooms in Abudhabi | Black Out</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta_tags')
    <meta name="facebook-domain-verification" content="bnedou4iyh3gat5iuya60wwi17fvic" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/images/logoPart/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/site/images/logoPart/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/site/images/logoPart/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/site/images/logoPart/favicon.png') }}">
    <link rel="manifest" href="{{ asset('assets/site/images/logoPart/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">




    @include('site.abudhabi.layouts.css')
    @yield('styles')




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

</head>

<body>

    <div class="page-wrapper">

        <a href="https://wa.me/+971586000041" target="_blank" class="whatsapp-icon">
            <i class="fab fa-whatsapp"></i>
        </a>

        {{-- header area start --}}

        @php use Illuminate\Support\Facades\Request; @endphp

        {{-- @if (Request::is('abudhabi'))
            @include('site.abudhabi.layouts.header')
        @else
            @include('site.abudhabi.layouts.headers2')
        @endif --}}

        @include('site.abudhabi.layouts.header')


        {{-- @include('site.abudhabi.layouts.header')
     @include('site.abudhabi.layouts.header2') --}}

        {{-- header area finish --}}

        <!-- main-area -->
        <main>
            @yield('content')
        </main>
        <!-- main-area-end -->
        <!-- footer-area -->
        @include('site.abudhabi.layouts.footer')
        <!-- footer-area-end -->


        <div class="scroll-to-top scroll-to-target" data-target="html">
            <span class="flaticon-up-arrow"></span>
        </div>

        <!-- JS here -->
        @include('site.abudhabi.layouts.js')
        @yield('scripts')


        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5ZF96X" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->


</body>

</html>
