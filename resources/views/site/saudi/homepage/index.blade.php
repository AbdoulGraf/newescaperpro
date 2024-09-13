@extends('site.abudhabi.master')



@section('styles')
<style>
    .justify-full-width {
        max-width: 1050px;
        font-size: 70px; /* Adjusts the font size */
        font-weight: 400; /* Adjusts the font weight */
        text-align: justify; /* Justifies the text */
        width: 100%; /* Sets the width to full container width */
        margin: 0 auto; /* Centers the block */
    }

    .justify-full-width:after {
        content: '';
        display: inline-block;
        width: 100%;
    }
</style>
@endsection

@section('content')
<section class="banner-section banner-style-two"
style="padding-left: 0px !important ; padding-right: 0px !important;">
<div class="banner-carousel owl-theme owl-carousel">

    <div class="slide-item">

        <div class="image-layer"  id="image-layer-1" style="background: url('{{ asset('assets/site/images/sliderhero/bg_1.webp') }}')"></div>

        <div class="link-box" style="position: absolute; top:84%; text-align:center; width:100%; border-top: 1px solid rgba(255, 255, 255, 0.10);">
            <a href="#rooms"
                class="theme-btn btn-style-one" style="font-size:50px;cursor:pointer; z-index:99999 "><span
                    class="" style="cursor:pointer"
                   >
                   &#x2193;</span></a>
        </div>


        <div class="auto-container">
            <div class="content-box">
                <div class="content">


                    <h2 class="hero_slide_title" style="text-shadow: 10px 10px 25px rgba(0, 0, 0, 0.5),
                    -10px 10px 25px rgba(0, 0, 0, 0.5),
                    -10px -10px 25px rgba(0, 0, 0, 0.5),
                    10px -10px 25px rgba(0, 0, 0, 0.5);
                   
       "> EXPERIENCE
                        THE
                        <span class="">
                            THRILL OF A LIFETIME
                        </span>
                       </h2>

                       <h3 class="mobil_width_hero">
                        IN THE MIDDLE EAST
                    </h3>

                        <h3 class="justify-full-width">
                            I&nbsp;N &nbsp; T&nbsp;H&nbsp;E &nbsp; M&nbsp;I&nbsp;D&nbsp;D&nbsp;L&nbsp;E &nbsp; E&nbsp;A&nbsp;S&nbsp;T
                        </h3>


                    <div class="link-box book_now_button" style="text-align: justify">
                        <a href="{{route('rooms.abudhabi')}}"
                            class="theme-btn btn-style-one"><span
                                class="btn-title btn_font_mobile"
                                style="background: #00ef4c; border-radius:30px !important; color:#000; font-weight:900; padding:19px 115px; font-size:35px">
                                Book Now</span></a>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <div class="slide-item">

        <div class="image-layer"  id="image-layer-2" style="background: url('{{ asset('assets/site/images//sliderhero/bg_2.webp') }}')"></div>

        <div class="link-box" style="position: absolute; top:84%; text-align:center; width:100%; border-top: 1px solid rgba(255, 255, 255, 0.10);">
            <a href="#rooms"
                class="theme-btn btn-style-one" style="font-size:50px;cursor:pointer"><span
                    class="" style="cursor:pointer"
                   >
                   &#x2193;</span></a>
        </div>


        <div class="auto-container">
            <div class="content-box">
                <div class="content">


                    <h2 class="hero_slide_title" style="text-shadow: 10px 10px 25px rgba(0, 0, 0, 0.5),
                    -10px 10px 25px rgba(0, 0, 0, 0.5),
                    -10px -10px 25px rgba(0, 0, 0, 0.5),
                    10px -10px 25px rgba(0, 0, 0, 0.5);
                   
       "> EXPERIENCE
                        THE
                        <span class="">
                            THRILL OF A LIFETIME
                        </span>
                       </h2>

                       <h3 class="mobil_width_hero">
                        IN THE MIDDLE EAST
                    </h3>

                        <h3 class="justify-full-width">
                            I&nbsp;N &nbsp; T&nbsp;H&nbsp;E &nbsp; M&nbsp;I&nbsp;D&nbsp;D&nbsp;L&nbsp;E &nbsp; E&nbsp;A&nbsp;S&nbsp;T
                        </h3>


                    <div class="link-box book_now_button" style="text-align: justify">
                        <a href="{{route('rooms.abudhabi')}}"
                            class="theme-btn btn-style-one"><span
                                class="btn-title btn_font_mobile"
                                style="background: #00ef4c; border-radius:30px !important; color:#000; font-weight:900; padding:19px 115px; font-size:35px">
                                Book Now</span></a>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <div class="slide-item">

        <div class="image-layer"  id="image-layer-3" style="background: url('{{ asset('assets/site/images/sliderhero/bg_3.webp') }}')"></div>

        <div class="link-box" style="position: absolute; top:84%; text-align:center; width:100%; border-top: 1px solid rgba(255, 255, 255, 0.10);">
            <a href="#rooms"
                class="theme-btn btn-style-one" style="font-size:50px;cursor:pointer"><span
                    class="" style="cursor:pointer"
                   >
                   &#x2193;</span></a>
        </div>


        <div class="auto-container">
            <div class="content-box">
                <div class="content">


                    <h2 class="hero_slide_title" style="text-shadow: 10px 10px 25px rgba(0, 0, 0, 0.5),
                    -10px 10px 25px rgba(0, 0, 0, 0.5),
                    -10px -10px 25px rgba(0, 0, 0, 0.5),
                    10px -10px 25px rgba(0, 0, 0, 0.5);
                   
       "> EXPERIENCE
                        THE
                        <span class="">
                            THRILL OF A LIFETIME
                        </span>
                       </h2>

                       <h3 class="mobil_width_hero">
                        IN THE MIDDLE EAST
                    </h3>

                        <h3 class="justify-full-width">
                            I&nbsp;N &nbsp; T&nbsp;H&nbsp;E &nbsp; M&nbsp;I&nbsp;D&nbsp;D&nbsp;L&nbsp;E &nbsp; E&nbsp;A&nbsp;S&nbsp;T
                        </h3>


                    <div class="link-box book_now_button" style="text-align: justify">
                        <a href="{{route('rooms.abudhabi')}}"
                            class="theme-btn btn-style-one"><span
                                class="btn-title btn_font_mobile"
                                style="background: #00ef4c; border-radius:30px !important; color:#000; font-weight:900; padding:19px 115px; font-size:35px">
                                Book Now</span></a>
                    </div>

                </div>
            </div>
        </div>


    </div>

</div>
</section>

<section id="rooms" class="featured-game-area position-relative pt-115 pb-90">

<div class="top-pattern-layer"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>
<div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-bottom.webp')}}); bottom: -70px;"></div>

<div class="featured-game-bg">

    <video autoplay loop muted playsinline
        style="height: 100%;">
        <source src="{{asset('assets/site/images/newVideo/escape/4.mp4')}}"
            type="video/mp4">
        Your browser does not support the video tag.
    </video>

</div>

<div class="container allcontainer">

    <div class="sec-title centered"><h1
            style="color: #910613; font-weight: 700; font-size: 3.5rem;"
            class="glitch">
            ESCAPE ROOMS IN ABUDHABI
        </h1>
        <p style="color: #ffff; font-size: 20px; font-weight: 0;">

            Choose your game to unravel
            the story. </p>

        <span class="bottom-curve"></span>
    </div>

    <div class="row featured-active">


        <div class="col-12">

            <div class="row">
                @foreach($rooms as $room)
                    {{-- Check if room title is "Chaos" or "Torture" and skip --}}
                    @if(strtolower($room->title) === 'chaos' || strtolower($room->title) === 'torture')
                        @continue
                    @endif

                    <div class="col-lg-3 col-sm-6 custom-five-col grid-item">
                        <div class="featured-game-item mb-30">
                            {{-- <div class="link-box" style="position: absolute; margin-top: 15px; border-radius: 5px; left: 20px;">
                                <a style="text-transform: none;" href="#" class="theme-btn btn-style-one">
                                    <span class="btn-title" style="padding: 0px 10px; font-size: 12px; border-radius: 5px;">With Live Actor</span>
                                </a>
                            </div> --}}
                            <div class="featured-game-thumb">
                                <img src="{{ asset($room->poster) }}" alt="{{ $room->title }}">
                            </div>
                            <div class="featured-game-content">
                                <h4><a href="#">{{ $room->title }}</a></h4>
                                <div class="featured-game-meta">
                                    <i class="fas fa-clock"></i><span style="font-weight: 300;">{{ $room->duration }} Mins</span>&nbsp;&nbsp;
                                    <i class="fas fa-hammer"></i><span style="font-weight: 300;">{{ $room->level }}</span>&nbsp;&nbsp;
                                    <i class="fas fa-running"></i><span style="font-weight: 300;">{{ $room->person }}</span>
                                </div>
                            </div>
                            <div class="featured-game-content featured-game-overlay-content">
                                <div class="featured-game-icon"><img src="{{ asset($room->text_picture) }}" alt="{{ $room->title }} Title"></div>
                                <div class="featured-game-meta">
                                    <i class="fas fa-clock"></i><span>{{ $room->duration }} Mins</span>&nbsp;&nbsp;
                                    <i class="fas fa-hammer"></i><span>{{ $room->level }}</span>&nbsp;&nbsp;
                                    <i class="fas fa-running"></i><span>{{ $room->person }}</span>
                                </div>
                                <br>
                                <div class="link-box">
                                    <a href="{{ route('rooms.detail', ['slug' => $room->slug]) }} " class="theme-btn btn-style-one">
                                        <span class="btn-title" style="padding: 5px 10px;">Book Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>

<section class="games-section games-section-bg pt-0 pb-0"  style="background: url({{asset('assets/site/images/newImages/blackIcon/white_bg_crack-04.webp')}})">


<div class="just-gamers-area just-gamers-bg pt-115 pb-120"
    style="padding: 0px;">

    <div class="container-full-padding">
        <div class="row">

            <div
                class="col-xl-6 col-lg-12 col-md-10 pt-100"
                style="display: block; align-items: center; padding-bottom: 50px;">

                <div
                    class="section-title title-style-three white-title first__push"
                    style="padding: 0px; width:100%;">
                    <h2 class="mb-3">
                        <span style="color: #07070f;"
                            class="mb-4">REALISTIC HORROR &
                            ESCAPE ROOM </span>
                    </h2>
                    <h2><span>GAMES WITH LIVE ACTORS</span></h2>
                    <p style="font-size: 20px;">Welcome to the
                        biggest escape room in
                        Dubai </p>
                </div>

                <div class="just-gamers-list second__push"
                    style="margin-top: 39px;">

                    <ul>
                        <li>
                            <div
                                class="just-gamers-list-icon">
                                <img
                                    src="{{asset('assets/site/images/newImages/blackIcon/book.webp')}}"
                                    alt="Black Out Escape Room in Abu Dhabi"
                                    style="max-width: 75px;">
                            </div>
                            <div
                                class="just-gamers-list-content fix">
                                <h5
                                    style="color: #07070f;">BOOK
                                    YOUR GAME</h5>
                                <p
                                    style="font-size: 18px; color: #7a7a7e;">
                                    Make your
                                    reservation and
                                    arrive on time </p>
                            </div>
                        </li>
                        <li>
                            <div
                                class="just-gamers-list-icon">
                                <img
                                    src="{{asset('assets/site/images/newImages/blackIcon/book.webp')}}"
                                    alt="Black Out Escape Room in Abu Dhabi"
                                    style="max-width: 75px;">
                            </div>
                            <div
                                class="just-gamers-list-content fix">
                                <h5
                                    style="color: #07070f;">GET
                                    LOCKED
                                    IN FOR 60
                                    MINUTES</h5>
                                <p
                                    style="font-size: 18px; color: #7a7a7e;">You
                                    will unravel the
                                    story behind each
                                    door </p>
                            </div>
                        </li>
                        <li>
                            <div
                                class="just-gamers-list-icon">
                                <img
                                    src="{{asset('assets/site/images/newImages/blackIcon/puzzle.webp')}}"
                                    alt="Black Out Escape Room in Abu Dhabi"
                                    style="max-width: 75px;">
                            </div>
                            <div
                                class="just-gamers-list-content fix">
                                <h5
                                    style="color: #07070f;">FIND
                                    CLUES &
                                    SOLVE OUR
                                    PUZZLES</h5>
                                <p
                                    style="font-size: 18px; color: #7a7a7e;">An
                                    authentic
                                    experience with
                                    realistic
                                    atmospheres </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="col-xl-6 col-lg-6 d-none d-lg-block mt-2"
                style="display: flex; align-items: center;">
                <div class="just-gamers-img">

                    <img
                        src="{{asset('assets/site/images/newImages/blackIcon/fearface2.webp')}}"
                        alt="Black Out Escape Room in Abu Dhabi"
                        class="just-gamers-character "
                        id="scalingImage">

                </div>
            </div>

        </div>
    </div>

</div>
</section>

<section class="about-section about_us_section"
style="background: #910613; padding-left: 20px; padding-right: 20px;">

<div class="top-pattern-layer-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern.png')}}); top: -72px;"></div>

<div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/beyaz_parca.webp')}});"></div>

<div class="about-content">
    <div class="auto-container">
        <div class="row clearfix" style="margin-top: -30px;">

            <div
                class="text-column col-lg-6 col-md-12 col-sm-12"
                style="display: flex; align-items: center;">
                <div class="inner wow fadeInRight"
                    data-wow-delay="0ms"
                    data-wow-duration="1500ms">

                    <div class="sec-title"><h2
                            style="font-weight: 900;"> Our
                            escape rooms
                            are one of the best corporate team
                            building activities! </h2><span
                            class="bottom-curve"></span></div>

                    <div class="text">
                        <p style="color: #ffff;">Black Out
                            escape rooms are a unique
                            and fun way to engage with your
                            colleagues and test how well your
                            team works together. Each escape
                            room provides an immersive puzzle
                            set in a thematic environment and
                            requires coordination, communication
                            and problem solving to complete the
                            challenge.</p>

                        <p style="color: #ffff;">With our escape
                            rooms, you can rest
                            assured that everyone from senior
                            management to entry-level employees
                            will find stimulating activities
                            that will foster strong and open
                            relationships between coworkers.</p>
                    </div>
                    <div class="link-box"><a
                            href="{{route('rooms.abudhabi')}}"
                            class="theme-btn btn-style-one"
                            style="padding-left: 0px;"><span
                                class="btn-title"> Book
                                Now</span></a></div>
                </div>
            </div>

            <div
                class="image-column col-lg-6 col-md-12 col-sm-12"
                style="display: flex; align-items: center;">
                <div class="inner wow fadeInLeft"
                    data-wow-delay="0ms"
                    data-wow-duration="1500ms"
                    style="width: 100%;">
                    <div class="image-box">

                        <img
                            src="{{asset('assets/site/images/newImages/aboutUs/test.gif')}}"
                            alt="Black-out Rooms in Abu Dhabi | Black-Out"
                            style="border-top-left-radius: 50%;
                        border-top-right-radius: 50%; margin-top: -450px; margin-left: 50px;">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</section>

<section class="reviews-section" style="background: url({{asset('assets/site/images/newImages/blackIcon/white_bg_crack-04.webp')}}); padding: 50px 0px 0px 0px !important">



<div class="auto-container">



    <div class="row">

        <div class="col-12">
            <div
                class="section-title title-style-three white-title">
                <h2>
                    <span>TESTIMONIALS</span></h2>
                <p style="font-size: 20px;"> Your Comments are
                    important to us</p>
            </div>

        </div>

    </div>


    <div class="testimonial-slider carousel-outer clearfix" style="margin-bottom: 75px;">
        <div class="thumb-carousel-box">
            <ul class="thumb-carousel owl-carousel owl-theme">
                @foreach($allComment as $comment)
                    @if(strtolower($comment->placefor) == 'abu dhabi')
                        <li class="thumb">
                            <img src="{{ Storage::url($comment->person_image) }}" alt="{{ $comment->person_name }}">
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="text-carousel owl-carousel owl-theme">
            @foreach($allComment as $comment)
                @if(strtolower($comment->placefor) == 'abu dhabi')
                    <div class="slide-item">
                        <div class="inner">
                            <div class="text">{{ $comment->person_comment }}</div>
                            <div class="info clearfix">
                                <span class="name">{{ $comment->person_name }}</span>&ensp;-&ensp;
                                <span class="date">{{ date('d M, Y', strtotime($comment->comment_date)) }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


</div>

</section>

<section class="video-section">

<div class="top-pattern-layer-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/beyaz_parca2.webp')}}); top:-3px"></div>



<div class="image-layer"
    style="background-image: url({{asset('assets/site/images/newImages/dubaImages/video-bg.webp')}});"></div>

<div class="auto-container">

    <div class="row clearfix">

        <div
            class="feature-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft"
            data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="inner-box">

                <div class="services-two__icon">
                    <img
                        src="{{asset('assets/site/images/newImages/black_out_icons/friends-families.svg')}}" alt="Black Out Escape Room in Abu Dhabi"
                        style="max-width: 115px;">
                </div>
                &nbsp;
                <h4>FRIENDS & FAMILIES</h4>
                <div class="feature-text">Experience the
                    exciting adventure with your family and
                    friends!</div>
            </div>
        </div>

        <div
            class="feature-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft"
            data-wow-delay="200ms" data-wow-duration="1500ms">
            <div class="inner-box">
                <div class="services-two__icon">
                    <img
                        src="{{asset('assets/site/images/newImages/black_out_icons/tourist.svg')}}" alt="Black Out Escape Room in Abu Dhabi"
                        style="max-width: 115px;">
                </div>
                &nbsp;
                <h4>TOURISTS</h4>
                <div class="feature-text">Let your trip turn
                    into an unforgettable experience.</div>
            </div>
        </div>

        <div
            class="feature-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft"
            data-wow-delay="400ms" data-wow-duration="1500ms">
            <div class="inner-box">
                <div class="services-two__icon">
                    <img
                        src="{{asset('assets/site/images/newImages/black_out_icons/gamers.svg')}}" alt="Black Out Escape Room in Abu Dhabi"
                        style="max-width: 115px; ">
                </div>
                &nbsp;
                <h4>GAMERS </h4>
                <div class="feature-text">Are you bored and
                    looking for new challenges?</div>
            </div>
        </div>

        <div
            class="feature-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft"
            data-wow-delay="600ms" data-wow-duration="1500ms">
            <div class="inner-box">
                <div class="services-two__icon">
                    <img src="{{asset('assets/site/images/newImages/black_out_icons/corporate.svg')}}"  alt="Black Out | Escape Rooms in Abu Dhabi" style="max-width: 115px;">
                </div>
                &nbsp;
                <h4>CORPORATE</h4>
                <div class="feature-text">Corporate event to
                    build the team spirit in your company.</div>
            </div>
        </div>
    </div>

</div>
</section>

<section class="faq-section"
style="background: #07070f; padding-bottom: 100px;">

<div class="top-pattern-layer"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>

<div class="auto-container" style="margin-bottom: 50px;">



    <div class="row">

        <div class="col-12">
            <div
                class="section-title title-style-three white-title"
                style="text-align: center; width:100%;">
                <h2 style="color: #910611;" class="glitch">FAQ
                    <span></span>
                </h2>
                <p style="color: #cccccc; font-size: 20px;">
                    Answers to Common Questions... </p>
            </div>

        </div>

    </div>


    @php
// Filter FAQs for "Abu Dhabi", shuffle, and take the first five
$filteredFaqs = $allfaq->filter(function ($faq) {
    return strtolower($faq->placefor) == 'abu dhabi';
})->shuffle()->take(5);
@endphp

<div class="faq-container">
    <div class="accordion-box">
        @foreach($filteredFaqs as $faq)
            <div class="accordion block wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
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
        @endforeach
    </div>
</div>




</div>

</section>

<section class="news-section no-top-curve"
style="background: #910613;">

<div class="top-pattern-layer-allred"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern.png')}}); top: -73px;"></div>

    <div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>

<div class="auto-container">



    <div class="row">

        <div class="col-12">
            <div
                class="section-title title-style-three white-title"
                style="text-align: center; width:100%;">
                <h2 style="color: #ffff;" class="glitch">LATEST
                    BLOG
                    <span></span></h2>
                <p style="color: #cccccc; font-size: 20px;">
                    Follow us </p>
            </div>

        </div>

    </div>



    <div class="row clearfix">
        @foreach($allblog as $blog)
    @if(strtolower($blog->placefor) === 'abudhabi') {{-- Ensure we only show blogs for "Abu Dhabi" --}}
        <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="inner-box">
                <figure class="image-box">
                    <a href="{{ route('abudhabi.blog.blogdetails', ['id' => $blog->id, 'title' => Str::slug($blog->title)]) }}">
                        <img src="{{ asset('assets/site/images/blog/blog_imaage_1.webp') }}" alt="{{ $blog->title }}">
                    </a>
                </figure>
                <div class="over-box">
                    <div class="date">
                        <span class="date-title">{{ date('d M, Y', strtotime($blog->created_at)) }}</span>
                    </div>
                    <h3 class="title_blog blog-title">
                        <a href="{{ route('abudhabi.blog.blogdetails', ['id' => $blog->id, 'title' => Str::slug($blog->title)]) }}">
                            {{ $blog->title }}
                        </a>
                    </h3>
                    <div>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 50, '...') }}</div>
                </div>
            </div>
        </div>
    @endif
@endforeach

    </div>


</div>
</section>







@endsection

@section('scripts')
    <script>

    </script>
@endsection
