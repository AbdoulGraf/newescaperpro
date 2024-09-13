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
    <source src="{{asset('assets/site/images/thumbnail/5.mp4')}}"
        type="video/mp4">
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

<div class="top-pattern-layer"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>

<!-- bottom for pattern -->

<div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-bottom.webp')}}); bottom: -73px;"></div>

<div class="featured-game-bg">

    <video autoplay loop muted playsinline
        style="height: 100%;">
        <source src="{{asset('assets/site/images/newVideo/escape/4.mp4')}}"
            type="video/mp4">
        Your browser does not support the video tag.
    </video>

</div>

<div class="container allcontainer">
    <div class="col-lg-12 float-right mx-0 px-0 mt-3">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="sec-title centered"><h1
            style="color: #910613; font-weight: 700; font-size: 3.5rem;"
            class="glitch">
            ESCAPE ROOMS IN ABUDHABI
        </h1>
        <p
            style="color: #ffff; font-size: 20px; font-weight: 0;">

            Choose your game to unravel
            the story. </p>

        <span class="bottom-curve"></span>
    </div>

    <div class="row featured-active">

        <div class="col-12">
            <div class="row">
                <div
                    class="col-lg-3 col-sm-6 custom-five-col grid-item">
                    <div class="featured-game-item mb-30">

                        {{-- <div class="link-box"
                            style="position: absolute; margin-top: 15px; border-radius: 5px; left: 20px;"><a
                                style="text-transform: none;"
                                href="#"
                                class="theme-btn btn-style-one"><span
                                    class="btn-title"
                                    style="padding: 0px 10px; font-size: 12px; border-radius: 5px;">
                                    With Live Actor
                                </span></a></div> --}}
                        <div class="featured-game-thumb">
                            <img
                                src="{{asset('assets/site/images/newPosters/Psychiatric.webp')}}"
                                alt>
                        </div>
                        <div class="featured-game-content">
                            <h4><a href="#">PSYCHIATRIC
                                </a></h4>

                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span
                                    style="font-weight: 300;">60
                                    Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span style="font-weight: 300;">
                                    Hard
                                </span>
                                &nbsp;
                                &nbsp;
                                <i class="fas fa-running"></i>
                                <span style="font-weight: 300;">
                                    2- 10
                                </span>
                            </div>
                        </div>

                        <div
                            class="featured-game-content featured-game-overlay-content">


                            <div class="featured-game-icon"><img
                                    src="{{asset('assets/site/images/newImages/postersIcon/PsychiatricTitle3.png')}}"
                                    alt></div>

                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span>60 Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span> Hard </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span> 2- 10 </span>
                            </div>
                            <br>

                            <div class="link-box"><a
                                    href="{{ route('rooms.detail', ['slug' => 'psychiatric']) }}"
                                    class="theme-btn btn-style-one"><span
                                        class="btn-title"
                                        style="padding: 5px 10px;">
                                        Book
                                        Now</span></a></div>

                        </div>
                    </div>
                </div>

                <div
                    class="col-lg-3 col-sm-6 custom-five-col grid-item">
                    <div class="featured-game-item mb-30">

                        {{-- <div class="link-box"
                            style="position: absolute; margin-top: 15px; border-radius: 5px; left: 20px;"><a
                                style="text-transform: none;"
                                href="#"
                                class="theme-btn btn-style-one"><span
                                    class="btn-title"
                                    style="padding: 0px 10px; font-size: 12px; border-radius: 5px;">

                                    With Live Actor
                                </span></a></div> --}}

                        <div class="featured-game-thumb">
                            <img
                                src="{{asset('assets/site/images/newPosters/Exorcism.webp')}}"
                                alt>
                        </div>
                        <div class="featured-game-content">
                            <h4><a href="#"> EXORCISM
                                </a></h4>
                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span
                                    style="font-weight: 300;">60
                                    Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span style="font-weight: 300;">
                                    Hard
                                </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span style="font-weight: 300;">
                                    2- 10
                                </span>
                            </div>
                        </div>
                        <div
                            class="featured-game-content featured-game-overlay-content">
                            <div class="featured-game-icon"><img
                                    src="{{asset('assets/site/images/newImages/postersIcon/ExorcismTitle.png')}}"
                                    alt></div>

                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span>60 Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span> Hard </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span> 2- 10 </span>
                            </div>
                            <br>

                            <div class="link-box"><a
                                    href="{{ route('rooms.detail', ['slug' => 'exorcism']) }}"
                                    class="theme-btn btn-style-one"><span
                                        class="btn-title"
                                        style="padding: 5px 10px;">
                                        Book
                                        Now</span></a></div>

                        </div>
                    </div>
                </div>

                <div
                    class="col-lg-3 col-sm-6 custom-five-col grid-item">
                    <div class="featured-game-item mb-30">

                        {{-- <div class="link-box"
                            style="position: absolute; margin-top: 15px; border-radius: 5px; left: 20px;"><a
                                style="text-transform: none;"
                                href="#"
                                class="theme-btn btn-style-one"><span
                                    class="btn-title"
                                    style="padding: 0px 10px; font-size: 12px; border-radius: 5px;">

                                    With Live Actor
                                </span></a></div> --}}

                        <div class="featured-game-thumb">
                            <img
                                src="{{asset('assets/site/images/newPosters/Hotel 666.webp')}}"
                                alt>
                        </div>
                        <div class="featured-game-content">
                            <h4><a href="#"> HOTEL 666
                                </a></h4>
                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span
                                    style="font-weight: 300;">60
                                    Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span style="font-weight: 300;">
                                    Hard
                                </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span style="font-weight: 300;">
                                    2- 10
                                </span>
                            </div>
                        </div>
                        <div
                            class="featured-game-content featured-game-overlay-content">
                            <div class="featured-game-icon"><img
                                    src="{{asset('assets/site/images/newImages/postersIcon/Hotel666Title.png')}}"
                                    alt></div>



                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span>60 Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span> Hard </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span> 2- 10 </span>
                            </div>
                            <br>

                            <div class="link-box"><a
                                    href="{{ route('rooms.detail', ['slug' => 'hotel-666']) }}"
                                    class="theme-btn btn-style-one"><span
                                        class="btn-title"
                                        style="padding: 5px 10px;">
                                        Book
                                        Now</span></a></div>

                        </div>
                    </div>
                </div>

                <div
                    class="col-lg-3 col-sm-6 custom-five-col grid-item">
                    <div class="featured-game-item mb-30">

                        {{-- <div class="link-box"
                            style="position: absolute; margin-top: 15px; border-radius: 5px; left: 20px;"><a
                                style="text-transform: none;"
                                href="#"
                                class="theme-btn btn-style-one"><span
                                    class="btn-title"
                                    style="padding: 0px 10px; font-size: 12px; border-radius: 5px;">

                                    With Live Actor
                                </span></a></div> --}}
                        <div class="featured-game-thumb">
                            <img
                                src="{{asset('assets/site/images/newPosters/The Circus 1-1.webp')}}"
                                alt>
                        </div>
                        <div class="featured-game-content">
                            <h4><a href="#"> THE CIRCUS
                                </a></h4>
                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span
                                    style="font-weight: 300;">60
                                    Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span style="font-weight: 300;">
                                    Hard
                                </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span style="font-weight: 300;">
                                    2- 10
                                </span>
                            </div>

                        </div>
                        <div
                            class="featured-game-content featured-game-overlay-content">
                            <div class="featured-game-icon"><img
                                    src="{{asset('assets/site/images/newImages/postersIcon/TheCircusTitle.png')}}"
                                    alt></div>




                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span>60 Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span> Hard </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span> 2- 10 </span>
                            </div>
                            <br>

                            <div class="link-box"><a
                                    href="{{ route('rooms.detail', ['slug' => 'the-circus']) }}"
                                    class="theme-btn btn-style-one"><span
                                        class="btn-title"
                                        style="padding: 5px 10px;">
                                        Book
                                        Now</span></a></div>

                        </div>
                    </div>
                </div>

                <div
                    class="col-lg-3 col-sm-6  custom-five-col grid-item">
                    <div class="featured-game-item mb-30">

                        {{-- <div class="link-box"
                            style="position: absolute; margin-top: 15px; border-radius: 5px; left: 20px;"><a
                                style="text-transform: none;"
                                href="#"
                                class="theme-btn btn-style-one"><span
                                    class="btn-title"
                                    style="padding: 0px 10px; font-size: 12px; border-radius: 5px;">

                                    With Live Actor
                                </span></a></div> --}}
                        <div class="featured-game-thumb">
                            <img
                                src="{{asset('assets/site/images/newPosters/Dungeon.webp')}}"
                                alt>
                        </div>
                        <div class="featured-game-content">
                            <h4><a href="#"> DUNGEON
                                </a></h4>
                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span
                                    style="font-weight: 300;">60
                                    Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span style="font-weight: 300;">
                                    Hard
                                </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span style="font-weight: 300;">
                                    2- 10
                                </span>
                            </div>

                        </div>
                        <div
                            class="featured-game-content featured-game-overlay-content">
                            <div class="featured-game-icon">
                                <img
                                    src="{{asset('assets/site/images/newImages/postersIcon/DungeonTitle.png')}}"
                                    alt></div>
                            <!-- <h4><a href="#"> CHAOS
                        </a></h4> -->
                            <div class="featured-game-meta">
                                <i class="fas fa-clock"></i>
                                <span>60 Mins</span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-hammer"></i>
                                <span> Hard </span>
                                &nbsp;
                                &nbsp;

                                <i class="fas fa-running"></i>
                                <span> 2- 10 </span>
                            </div>
                            <br>

                            <div class="link-box"><a
                                    href="{{ route('rooms.detail', ['slug' => 'dungeon']) }}"
                                    class="theme-btn btn-style-one"><span
                                        class="btn-title"
                                        style="padding: 5px 10px;">
                                        Book
                                        Now</span></a></div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="auto-container"
    style="margin-bottom: 50px; margin-top: 100px;">

    <!-- <div class="sec-title centered"><h2 style="color: #ffff;">FAQ</h2>
      <p> Your Comments are important to us</p>
      <span class="bottom-curve"></span></div> -->

    <div class="row">

        <div class="col-12">
            <div
                class="section-title title-style-three white-title"
                style="text-align: center; width:100%;">
                <h2 style="color: #910611;" class="glitch">FAQ
                    <span></span></h2>
                <p style="color: #cccccc; font-size: 20px;">
                    Your Comments are
                    important to us </p>
            </div>

        </div>

    </div>

    <div class="faq-container">
        <div class="accordion-box">

            <div class="accordion block current wow fadeInUp"
                data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="acc-btn active">Who Can Play This
                    Game? <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"
                            style="color: #ffff;">You can play
                            this game
                            together with your family members or
                            colleagues from work or play it as a
                            corporate game and have fun with
                            them for one hour.</div>
                    </div>
                </div>
            </div>

            <div class="accordion block wow fadeInUp"
                data-wow-delay="100ms"
                data-wow-duration="1500ms">
                <div class="acc-btn">How to beat team based
                    shooters? <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"
                            style="color: #ffff;">Lorem Ipsum is
                            simply
                            dummy text of the printing and
                            typesetting industry. Lorem Ipsum
                            has been the industry's standard
                            dummy text ever since the 1500s,
                            when an unknown printer took a
                            galley of type and scrambled it to
                            make a type specimen book. It has
                            survived not only five centuries.
                            There are many variations of
                            passages of Lorem Ipsum available,
                            but the majority have suffered
                            alteration in some form by injected
                            humour.</div>
                    </div>
                </div>
            </div>

            <div class="accordion block wow fadeInUp"
                data-wow-delay="200ms"
                data-wow-duration="1500ms">
                <div class="acc-btn"> Is It Scary? <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"
                            style="color: #ffff;">The products
                            of the
                            Black-Out are the most scariest
                            Escape Games in the Middle East but
                            in case of request level can be set.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion block wow fadeInUp"
                data-wow-delay="300ms"
                data-wow-duration="1500ms">
                <div class="acc-btn"> How Long Does The Whole
                    Experience Take? <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content" style="color: #ffff;">
                        <div class="text">You must puzzle your
                            way to the intriguing conclusion and
                            escape the room in 60 minutes.</div>
                    </div>
                </div>
            </div>

            <div class="accordion block wow fadeInUp"
                data-wow-delay="400ms"
                data-wow-duration="1500ms">
                <div class="acc-btn"> How Difficult Is The Game?
                    <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"
                            style="color: #ffff;">The games
                            designed to
                            be completed in 60 minutes by
                            concentration and solving puzzles.
                            You do not need any special talent
                            other than using your brain and
                            acting fast. Remember that you can
                            request a hint! This, however, does
                            not necessarily mean that everybody
                            can finish the game! .</div>
                    </div>
                </div>
            </div>

            <div class="accordion block wow fadeInUp"
                data-wow-delay="400ms"
                data-wow-duration="1500ms">
                <div class="acc-btn"> Do We Have To Wear Special
                    Costumes To Play The Game? <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"
                            style="color: #ffff;">No. However,
                            we
                            recommend that you bring the least
                            amount of belongings and accessories
                            possible with you in order to move
                            comfortably and fast during the
                            game.</div>
                    </div>
                </div>
            </div>

            <div class="accordion block wow fadeInUp"
                data-wow-delay="400ms"
                data-wow-duration="1500ms">
                <div class="acc-btn"> Will It Be Safe During The
                    Game? <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"
                            style="color: #ffff;">Yes. Although
                            all of
                            our games is based on the concept of
                            Fear, you will not come across with
                            creatures such as those you would
                            see in a fear tunnel. In addition,
                            there will be real time monitoring
                            in all of the rooms in the house.
                            You can end the game whenever you
                            want and leave the house.</div>
                    </div>
                </div>
            </div>

            <div class="accordion block wow fadeInUp"
                data-wow-delay="400ms"
                data-wow-duration="1500ms">
                <div class="acc-btn"> How Much Is An Escape Room
                    In Dubai Al Quoz? <div
                        class="icon flaticon-cross"></div></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"
                            style="color: #ffff;">The cost of an
                            escape
                            room in Dubai varies depending on
                            the type, duration and size of the
                            game. Generally speaking, expect to
                            pay between AED 160-200 per person
                            for a one hour game. More complex
                            games may require a longer time
                            limit or additional players
                            which could increase the total
                            cost.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
                        <p style="text-align: center; font-size: 20px; color: #910613;">

                            <strong style="color: #cbcbcb;">

                                Black
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



