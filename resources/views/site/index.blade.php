@extends('site.master')

@section('meta_tags')
    <!-- Primary Meta Tags -->
    <meta charset="utf-8">
    <title> Escape House - Scariest Escape Rooms </title>
    <meta name="title" content="  Escape House">
    <meta name="description" content=" Escape House">
    <meta name="keywords" content="Escape House">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://escapehouseuae.com/">
    <meta property="og:title" content="Escape House">
    <meta property="og:description" content="Escape House!">
    <meta property="og:image" content="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://escapehouseuae.com/">
    <meta property="twitter:title" content="Escape House!">
    <meta property="twitter:description" content="Escape House!">
    <meta property="twitter:image" content="{{ asset('assets/site/images/uae/logo-menu.webp') }}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection


@section('content')
    <div class="bg-cover">
        <div class="overlay"></div>
        <div class="container text-center content">
            <img class="logo mb-4" src="{{ asset('assets/site/images/logo.webp') }}" alt="Logo">
            <div class="mb-4">
                <h4>Choose Your <span>Country</span></h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12 mb-4">
                    <h3>UAE</h3>
                    <div class="box_position">
                        <div class="option-box mt-3" onclick="location.href='{{ route('homepage.index') }}';">
                            <img src="{{ asset('assets/site/images/ae.svg') }}" alt="UAE Map">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                    <h3>SAUDI ARABIA</h3>
                    <div class="box_position">
                        <div class="option-box mt-3" onclick="location.href='{{ route('homesaudi.index') }}';">
                            <img src="{{ asset('assets/site/images/saudimap.svg') }}" alt="Saudi Arabia Map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
