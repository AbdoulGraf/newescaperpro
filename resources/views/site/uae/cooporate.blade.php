@extends('site.uae.master')
@section('meta_tags')
    <!-- Primary Meta Tags -->
    <title>Escape House - Scariest Escape Rooms</title>
    <meta name="title" content="Escape House - Scariest Escape Rooms">
    <meta name="description" content="Escape House - Scariest Escape Rooms - Gather your team and try it out yourself!">
    <meta name="keywords" content=" Escape House - Scariest Escape Rooms ">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://black-out.ae/">
    <meta property="og:title" content="Escape House - Scariest Escape Rooms">
    <meta property="og:description"
        content="Escape House - Scariest Escape Rooms - Gather your team and try it out yourself!">
    <meta property="og:image" content="{{ asset('assets/site/images/uae/logo-menu.webp') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://black-out.ae/">
    <meta property="twitter:title" content="Escape House - Scariest Escape Rooms">
    <meta property="twitter:description"
        content="Escape House - Scariest Escape Rooms - Gather your team and try it out yourself!">
    <meta property="twitter:image" content="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
@endsection
@section('styles')
    <style>

        
.radio-btn {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .radio-btn input[type="radio"] {
            display: none;
        }

        .radio-btn svg {
            margin-right: 8px;
        }

        .radio-btn label {
            color: rgba(108, 108, 108, 1);
            font-weight: 100;
            cursor: pointer;
        }

        .calendar-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            /* transform: translateY(-50%); */
            pointer-events: none; /* Prevent clicking */
        }
        
        .custom-icon_time{

            position: absolute;
            right: 10px;
            top: 50%;
            /* transform: translateY(-50%); */
            pointer-events: none;
            width: 36px; /* Adjust icon size */
            height: 36px;
            z-index: 2;

        }
        

    </style>
@endsection

@section('content')
    <section class="featured-game-area position-relative coporate_backImage  pt-115 pb-90 bg-dark"
        style="background-image: url('{{ asset('assets/site/images/uae/franchise.webp') }}'); background-size: cover; background-position: center; height: 550px; width: 100%; z-index: -1; display: flex; align-items: center;">
        <div class="container" style="max-width: 100%;">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title title-style-three text-center mb-70">
                        <h2 class="mb-3"> <span>
                                JUMEIRAH-AL WASL BRANCH
                            </span>
                            GAMES
                        </h2>
                        <h5 class="banner_h5_title">THE MOST SCARY ROOMS
                            WITH LIVE ACTORS!
                        </h5>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-game-area position-relative featurerooms  pt-115 pb-90"
        style="background: transparent; top: -235px; width: 100vw; 
                min-height: calc(100vh + 120px);
                position: relative !important;">
        <div class="featured-game-bg "></div>
        <div class="container " style="max-width: 1500px;">

            <div class="row featured-active ">

                <div class=" custom-col grid-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="featured-game-item mb-30">
                        <div class="featured-game-thumb">
                            <img src=" {{ asset('assets/site/images/rooms/uae/1.png') }} " alt>
                        </div>
                        <div class="featured-game-content">

                            <div class="featured-game-meta">
                                <!-- <i class="fas fa-bell"></i> -->
                                <span> With Live Actor </span>
                            </div>
                        </div>
                        <div class="featured-game-content featured-game-overlay-content">

                            <div class="overlay_text">

                                <div>
                                    <h2>HALLOWEEN</h2>

                                    <p>
                                        A group of friends gathered to
                                        have fun on Halloween night and
                                        decided to go to the escape
                                        house together.
                                    </p>
                                    <p>
                                        Even though everything seems
                                        normal, there is something they
                                        don't know. The address they
                                        came to for fun is wrong!
                                    </p>
                                </div>

                            </div>

                            <div class="rooms_icons_button">

                                <div class="featured-game-meta">
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span>60</span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> 2- 10 </span>
                                </div>

                                <div class="link-box"><a href="rooms/psychiatric.html" class="theme-btn btn-style-one"><span
                                            class="btn-title" style="padding: 5px 10px;">
                                            SELECT GAME
                                        </span></a></div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class=" custom-col grid-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="featured-game-item mb-30">
                        <div class="featured-game-thumb">
                            <img src=" {{ asset('assets/site/images/rooms/uae/2.jpeg') }} " alt>
                        </div>
                        <div class="featured-game-content">

                            <div class="featured-game-meta">
                                <!-- <i class="fas fa-bell"></i> -->
                                <span> With Live Actor </span>
                            </div>
                        </div>
                        <div class="featured-game-content featured-game-overlay-content">

                            <div class="overlay_text">

                                <div>
                                    <h2>HALLOWEEN</h2>

                                    <p>
                                        A group of friends gathered to
                                        have fun on Halloween night and
                                        decided to go to the escape
                                        house together.
                                    </p>
                                    <p>
                                        Even though everything seems
                                        normal, there is something they
                                        don't know. The address they
                                        came to for fun is wrong!
                                    </p>
                                </div>

                            </div>

                            <div class="rooms_icons_button">

                                <div class="featured-game-meta">
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span>60</span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> 2- 10 </span>
                                </div>

                                <div class="link-box"><a href="rooms/psychiatric.html" class="theme-btn btn-style-one"><span
                                            class="btn-title" style="padding: 5px 10px;">
                                            SELECT GAME
                                        </span></a></div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class=" custom-col grid-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="featured-game-item mb-30">
                        <div class="featured-game-thumb">
                            <img src="{{ asset('assets/site/images/rooms/uae/1.png') }}" alt>
                        </div>
                        <div class="featured-game-content">

                            <div class="featured-game-meta">
                                <!-- <i class="fas fa-bell"></i> -->
                                <span> With Live Actor </span>
                            </div>
                        </div>
                        <div class="featured-game-content featured-game-overlay-content">

                            <div class="overlay_text">

                                <div>
                                    <h2>HALLOWEEN</h2>

                                    <p>
                                        A group of friends gathered to
                                        have fun on Halloween night and
                                        decided to go to the escape
                                        house together.
                                    </p>
                                    <p>
                                        Even though everything seems
                                        normal, there is something they
                                        don't know. The address they
                                        came to for fun is wrong!
                                    </p>
                                </div>

                            </div>

                            <div class="rooms_icons_button">

                                <div class="featured-game-meta">
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span>60</span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> 2- 10 </span>
                                </div>

                                <div class="link-box"><a href="rooms/psychiatric.html"
                                        class="theme-btn btn-style-one"><span class="btn-title"
                                            style="padding: 5px 10px;">
                                            SELECT GAME
                                        </span></a></div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class=" custom-col grid-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="featured-game-item mb-30">
                        <div class="featured-game-thumb">
                            <img src="{{ asset('assets/site/images/rooms/uae/3.jpeg') }} " alt>
                        </div>
                        <div class="featured-game-content">

                            <div class="featured-game-meta">
                                <!-- <i class="fas fa-bell"></i> -->
                                <span> With Live Actor </span>
                            </div>
                        </div>
                        <div class="featured-game-content featured-game-overlay-content">

                            <div class="overlay_text">

                                <div>
                                    <h2>HALLOWEEN</h2>

                                    <p>
                                        A group of friends gathered to
                                        have fun on Halloween night and
                                        decided to go to the escape
                                        house together.
                                    </p>
                                    <p>
                                        Even though everything seems
                                        normal, there is something they
                                        don't know. The address they
                                        came to for fun is wrong!
                                    </p>
                                </div>

                            </div>

                            <div class="rooms_icons_button">

                                <div class="featured-game-meta">
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span>60</span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> 2- 10 </span>
                                </div>

                                <div class="link-box"><a href="rooms/psychiatric.html"
                                        class="theme-btn btn-style-one"><span class="btn-title"
                                            style="padding: 5px 10px;">
                                            SELECT GAME
                                        </span></a></div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class=" custom-col grid-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="featured-game-item mb-30">
                        <div class="featured-game-thumb">
                            <img src="{{ asset('assets/site/images/rooms/uae/4.jpeg') }}" alt>
                        </div>
                        <div class="featured-game-content">

                            <div class="featured-game-meta">
                                <span> With Live Actor </span>
                            </div>
                        </div>
                        <div class="featured-game-content featured-game-overlay-content">
                            <div class="overlay_text">
                                <div>
                                    <h2>HALLOWEEN</h2>

                                    <p>
                                        A group of friends gathered to
                                        have fun on Halloween night and
                                        decided to go to the escape
                                        house together.
                                    </p>
                                    <p>
                                        Even though everything seems
                                        normal, there is something they
                                        don't know. The address they
                                        came to for fun is wrong!
                                    </p>
                                </div>

                            </div>

                            <div class="rooms_icons_button">

                                <div class="featured-game-meta">
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span>60</span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }} " alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> 2- 10 </span>
                                </div>

                                <div class="link-box"><a href="rooms/psychiatric.html"
                                        class="theme-btn btn-style-one"><span class="btn-title"
                                            style="padding: 5px 10px;">
                                            SELECT GAME
                                        </span></a></div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- end of rooms -->

    <!-- how to play follow the steps -->

    <section class="featured-game-area features_only_section position-relative  pt-115 pb-90 "
        style="background-image:url(../Images/about/aboutbackground.webp); padding-top: 0px;">

        <div class="container ">
            <div class="row justify-content-center ">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title title-style-three text-center mb-70">
                        <h2> <span>
                                How To
                            </span>
                            Play</h2>
                        <p> FOLLOW THE STEPS </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="steps-container">

            <div class="container" style="max-width: 1500px;">

                <div class="row custom-gutter">

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="step-wrapper">
                            <div class="icon">
                                <img src="{{ asset('assets/site/images/icons_home/1.webp') }} " alt="Gather a team icon">
                            </div>
                            <div class="step">
                                <h2>Gather a Team of 2-10 People</h2>
                                <p>You cannot survive on your own, so
                                    get your
                                    squad!</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">

                        <div class="step-wrapper">
                            <div class="icon">
                                <img src="{{ asset('assets/site/images/icons_home/2.webp') }} "
                                    alt="Book one of the games icon">
                            </div>
                            <div class="step">
                                <h2>Book One of the Games</h2>
                                <p>We take walk-ins, but you should book
                                    beforehand!</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="step-wrapper">
                            <div class="icon">
                                <img src="{{ asset('assets/site/images/icons_home/3.webp') }}"
                                    alt="Find clues and solve puzzles icon">
                            </div>
                            <div class="step">
                                <h2>Find Clues & Solve Puzzles</h2>
                                <p>Work together to find clues and solve
                                    puzzles to
                                    escape!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="step-wrapper">
                            <div class="icon">
                                <img src="{{ asset('assets/site/images/icons_home/4.webp') }} "
                                    alt="Escape in under 60 min icon">
                            </div>
                            <div class="step">
                                <h2>Escape in Under 60 Min</h2>
                                <p>Can you and your team escape in under
                                    60
                                    minutes?</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="container" style="margin-top: 150px;">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title title-style-three text-center mb-70">
                        <h2> <span>
                                WHO CAN
                            </span>
                            PLAY</h2>
                        <p> COME JOIN TO GAME </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="newRow_forsteps">
            <div class="steps-container">

                <div class="container" style="max-width: 1500px;">

                    <div class="row">

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="step_who_can_paly">
                                <div class="icon"><img src="{{ asset('assets/site/images/icons_home/5.webp') }}"
                                        alt="Gather a team icon">
                                </div>
                                <h2> FRIENDS AND FAMILY</h2>
                                <p>You can not survive on your own so
                                    get your
                                    squad! </p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="step_who_can_paly">
                                <div class="icon"><img src="{{ asset('assets/site/images/icons_home/6.webp') }} "
                                        alt="Book one of the games icon"></div>
                                <h2> TOURISTS </h2>
                                <p>You can not survive on your own so
                                    get your
                                    squad!</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="step_who_can_paly">
                                <div class="icon"><img src="{{ asset('assets/site/images/icons_home/7.webp') }}"
                                        alt="Find clues and solve puzzles icon"></div>
                                <h2> GAMERS </h2>
                                <p>You can not survive on your own so
                                    get your
                                    squad!</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="step_who_can_paly">
                                <div class="icon"><img src="{{ asset('assets/site/images/icons_home/8.webp') }}"
                                        alt="Escape in under 60 min icon"></div>
                                <h2> CORPORATE </h2>
                                <p>You can not survive on your own so
                                    get your
                                    squad!</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection


@section('scripts')
    <script></script>
@endsection
