<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ printHtmlAttributes('html') }}>
<!--begin::Head-->

<head>
    <base href="" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="ar_AR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <link rel="canonical" href="" />

    {{-- //data for success --}}

    <meta name="title" content="Escape House - Scariest Escape Rooms- Dashboard">
    {{-- {!! includeFavicon() !!} --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <link rel="manifest" href="{{ asset('assets/site/images/uae/logo-menu.webp') }}">

    <!--begin::Fonts-->
    {!! includeFonts() !!}
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    @foreach (getGlobalAssets('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Vendor Stylesheets(used by this page)-->
    @foreach (getVendors('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Vendor Stylesheets-->

    <!--begin::Custom Stylesheets(optional)-->
    @foreach (getCustomCss() as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Custom Stylesheets-->

    @livewireStyles
    @livewire('livewire-ui-modal')
    @yield('styles')

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>

    @include('partials/theme-mode/_init')

    @yield('content')

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    @foreach (getGlobalAssets() as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used by this page)-->
    @foreach (getVendors('js') as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(optional)-->
    @foreach (getCustomJs() as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

    @livewireScripts
    @yield('scripts')
</body>
<!--end::Body-->

</html>
