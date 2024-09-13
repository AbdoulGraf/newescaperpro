@extends('site.abudhabi.master')
@section('meta_tags')
    <!-- Primary Meta Tags -->
    <title>Black Out - Scariest Escape Rooms</title>
    <meta name="title" content="Black Out - Scariest Escape Rooms">
    <meta name="description" content="Black Out - Gather your team and try it out yourself!">
    <meta name="keywords" content=" Black out, Black out UAE, Black Out Dubai, Escape ">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://black-out.ae/">
    <meta property="og:title" content="Black Out - Scariest Escape Rooms">
    <meta property="og:description" content="Black Out - Gather your team and try it out yourself!">
    <meta property="og:image" content="{{ asset('img/logo/haunted-meta-logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://black-out.ae/">
    <meta property="twitter:title" content="Black Out - Scariest Escape Rooms">
    <meta property="twitter:description" content="Black Out - Gather your team and try it out yourself!">
    <meta property="twitter:image" content="{{ asset('img/logo/haunted-meta-logo.png') }}">

@endsection
@section('styles')
    <style>
       
    </style>
@endsection

@section('content')

  

<section class="page-banner"
style="position: static; overflow: hidden;">
<video playsinline="playsinline" autoplay="autoplay"
    muted="muted" loop="loop"
    style="position: absolute;  left: 50%; transform: translate(-50%, -50%); width: 100vw; height: 100vh; object-fit: cover; z-index: -1;">
    <source src="{{asset('assets/site/images/thumbnail/5.mp4')}}" type="video/mp4">
    Your browser does not support the video tag.
</video>
<!-- Image on top of the video -->
<img src="{{asset('assets/site/images/ImagesThumb/Horror_Background.webp')}}"
    class="top___image__slide"
    alt="Descriptive Text" />
<div class="banner-inner">
    <div class="auto-container">
        <!-- Content here -->
    </div>
</div>
</section>

<section class="faq-section"
style=" padding-bottom: 100px; padding-top:240px;">
<div class="featured-game-bg">
    <video autoplay loop muted playsinline
        style="height: 100%;">
        <source src="{{asset('assets/site/images/newVideo/escape/4.mp4')}}"
            type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<div class="top-pattern-layer"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>

<!-- bottom for pattern -->
<div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-bottom.webp')}}); bottom: -73px;"></div>

<div class="auto-container" style="margin-bottom: 50px;">

    <div class="row">

        <div class="col-12">
            <div
                class="section-title title-style-three white-title"
                style="text-align: center; width:100%;">
                <h2 style="color: #910611;" class="glitch">FAQ
                    <span></span></h2>
                <p style="color: #cccccc; font-size: 20px;">
                    Answers to Common Questions... </p>
            </div>

        </div>
    </div>




    <div class="faq-container">
        <div class="accordion-box">
            @foreach($allfaq as $faq)
                @if($faq->placefor == 'Abu Dhabi')
                    <div class="accordion block wow fadeInUp"
                        data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="acc-btn">{{ $faq->question }} 
                            <div class="icon flaticon-cross"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text" style="color: #ffff;">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Remove the printed FAQ entry from the collection
                    $allfaq = $allfaq->filter(function ($item) use ($faq) {
                        return $item->question !== $faq->question;
                    });
                    ?>
                @endif
            @endforeach
        </div>
    </div>
    
    


    {{-- <div class="faq-container">
        <div class="accordion-box">
            @foreach($allfaq as $faq)
                @if(($faq->placefor) == 'Abu Dhabi')
                    <div class="accordion block wow fadeInUp"
                        data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="acc-btn">{{ $faq->question }} 
                            <div class="icon flaticon-cross"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text" style="color: #ffff;">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div> --}}


   

</div>

</section>

<section class="reviews-section" style="background: url({{asset('assets/site/images/newImages/blackIcon/white_bg_crack-04.webp')}})">

    <div class="bottom-pattern-layer-dark-allblack"
        style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>
    
<div class="auto-container">
    <div class="row">
        <div class="col-12">
            <div class="slide-item">
                <div class="inner">
                    <div class="text">
                        <p
                            style="text-align: center; font-size: 20px; color: #910613;">
                            <strong
                                style="color: #cbcbcb;">Black
                                Out escape rooms are a
                                unique and fun way to
                                engage</strong> with your
                            colleagues and test how well
                            your team works together.
                        </p>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

</section>
@endsection

@section('scripts')
    <script>

    </script>
@endsection



