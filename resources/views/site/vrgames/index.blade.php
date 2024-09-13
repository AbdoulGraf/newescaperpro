@extends('site.vrgames.master')
@section('meta_tags')
    <!-- Primary Meta Tags -->
    <title> Escape House - Scariest Escape Rooms </title>
    <meta name="title" content="Escape House - Scariest Escape Rooms">
    <meta name="description" content="Escape House - Scariest Escape Rooms - Gather your team and try it out yourself!">
    <meta name="keywords" content=" Escape House - Scariest Escape Rooms ">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://black-out.ae/">
    <meta property="og:title" content="Escape House - Scariest Escape Rooms">
    <meta property="og:description" content="Black Out - Gather your team and try it out yourself!">
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

    </style>
@endsection

@section('content')
    <section class="inner-about-area fix vr_game_top_banner"
        style="background: url('{{ asset('assets/site/images/vrgames/vr_traceimg.svg') }}'); background-size: cover; background-repeat: no-repeat; background-position: inherit;">

        <div class="link-box" style="position: absolute; top: 84%; text-align: center; width: 100%;">
            <a href class="theme-btn btn-style-one" style="font-size: 50px; cursor: pointer; z-index:99999">
                <span style="display: inline-block; cursor: pointer;">
                    <!-- <img src="../Images/icons/down_arrow.webp"
                alt> -->

                    <svg width="26" height="48" viewBox="0 0 26 48" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.0987226 10.866C-0.0918393 7.67928 0.0570372 4.44046 0.0302394 1.24481C-0.00697968 0.316028 0.70465 -0.373113 1.56516 0.222258C2.3274 0.845909 3.00777 1.66901 3.74024 2.3522C5.8394 4.46427 7.96536 6.63142 10.0466 8.72564C10.9235 9.50558 11.6039 10.4954 12.5582 11.1384C12.9215 11.3378 13.2743 11.0059 13.5363 10.7573C14.0142 10.2944 14.4772 9.8107 14.9432 9.32548C16.4201 7.84598 17.8552 6.40965 19.2874 4.93462C20.535 3.70369 21.6962 2.5055 22.914 1.28648C23.5304 0.722368 24.2644 -0.429673 25.1904 0.176117C25.6534 0.576504 25.5328 1.07215 25.5506 1.72854C25.5387 4.38688 25.6578 8.87448 25.6028 10.4522C25.5149 12.1803 23.2222 13.697 22.131 14.9711C20.9995 16.0934 20.0765 17.0549 19.006 18.128C17.8627 19.2816 16.7312 20.4247 15.5908 21.5782C15.238 21.9324 14.8792 22.2971 14.5293 22.6514C14.0678 23.1411 13.575 23.6218 12.8396 23.6456C11.5831 23.6456 10.8149 22.2435 9.95286 21.5291C9.00749 20.5705 8.05766 19.6135 7.11081 18.6579C5.55505 17.0832 3.99631 15.5158 2.43906 13.9411C1.60238 12.9915 0.360745 12.2041 0.1017 10.8913L0.0972339 10.8675L0.0987226 10.866Z"
                            fill="white" />
                        <path
                            d="M13.2935 47.3816C12.3496 47.6897 11.6231 47.0512 11.0246 46.3933C10.2251 45.5776 9.43609 44.7709 8.6277 43.9776C6.28587 41.6512 4.03188 39.2965 1.71089 36.9805C0.969488 36.2571 0.141735 35.4787 0.0672967 34.3832C-0.0562707 31.4286 0.0568754 28.4503 0.021145 25.4898C0.0315664 25.0909 0.0256113 24.701 0.158111 24.3393C0.345696 23.7841 0.976932 23.6546 1.46078 23.9612C1.85233 24.1949 2.12775 24.5387 2.44634 24.8528C5.69483 28.1258 8.91354 31.3706 12.1531 34.6377C13.0076 35.5531 13.819 34.1733 14.4547 33.6256C15.3629 32.6849 16.2517 31.8186 17.1405 30.8943C18.9612 29.0799 20.7403 27.2744 22.5491 25.4571C23.0776 24.9629 23.5213 24.3661 24.1332 23.9612C25.4731 23.2765 25.5803 24.8334 25.5728 25.783C25.5356 29.2585 25.6666 30.9092 25.5073 34.3713C25.4388 35.3506 24.8731 36.0175 24.2151 36.6471C21.903 38.9586 19.6326 41.285 17.3385 43.6055C16.4675 44.4926 15.6606 45.2963 14.7942 46.1715C14.3237 46.6061 13.9292 47.1613 13.3158 47.3742L13.2935 47.3816Z"
                            fill="white" />
                    </svg>

                </span>
            </a>
        </div>

        <div class="container">
            <div class="row align-items-center" style="position: relative; z-index: 1;">
                <div class="col-xl-7 col-lg-6 order-0 order-lg-2">
                    <div class="inner-about-img">
                        <img src="{{ asset('assets/site/images/vr/vrImage.webp') }}" class="wow fadeInRight"
                            data-wow-delay=".3s" alt>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="section-title title-style-three mb-25">
                        <img src="{{ asset('assets/site/images/rooms/uae/vr_games.webp') }}" alt>
                    </div>
                    <div class="inner-about-content">
                        <!-- <h5>Monica Global Publishing for Marketing</h5> -->
                        <p>VR House offers a unique virtual reality
                            experience,
                            allowing customers to step into different
                            worlds without leaving their homes.
                            With state-of-the-art VR equipment and a
                            wide range of content, we provide adventures
                            that captivate everyone's interest.
                            Experience thrilling and immersive moments
                            from the comfort of your home with VR House.

                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="inner-about-shape"><img src="{{ asset('assets/site/images/vr/vrback.webp') }}" alt></div>
    </section>

    <!--End Banner vr Section -->

    <!-- about us section -->
    <section class="about-section about_vr_section">
        <div class="bottom-pattern-layer-dark"></div>

        <div class="about-content" style="background-image:url(../Images/vrgames/about_back.svg)">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Text Column-->
                    <div class="text-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sec-title vr_about_title">
                                <h2> About
                                    <span> VR Games</span>
                                </h2>
                            </div>
                            <div class="text">
                                <h3 class="mb-4">
                                    <strong>
                                        Escape House
                                    </strong>
                                    is the perfect place for a team work
                                    together and achieve one goal:
                                    <strong>
                                        Success.
                                    </strong>
                                </h3>
                                <p>Highest quality designing and
                                    interesting puzzles not only
                                    professional live actors but also
                                    professional staff. Our staff will
                                    be monitoring your process through
                                    entire game via video surveillance
                                    so we can observe and evaluate the
                                    group dynamics. With the information
                                    gathered you can enhance your team
                                    performance in the future.

                                </p>

                                <p>
                                    We do not like ordinary horror but
                                    we prefer realism. It almost feels
                                    like you are in a horror movie with
                                    the live actors. Each game requires
                                    you to solve puzzles more then 5
                                    rooms and less than in 60 minutes.
                                    It’s not easy to solve puzzles under
                                    this much stress and fear but that’s
                                    the fun part!
                                </p>

                                <p>
                                    Gather your team and try it out
                                    yourself!
                                </p>
                            </div>

                        </div>
                    </div>
                    <!--Image Column-->
                    <div class=" vrgame image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box">
                                <img src="{{ asset('assets/site/images/vrgames/vr_about.svg') }}" alt title>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--end rooms over here -->

    <!-- top title section -->
    <section class="featured-game-area position-relative  pt-115 pb-90 bg-dark">
        <div class="container" style="max-width: 100%;">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title vr_game_room_title title-style-three text-center mb-70">
                        <h2 class="mb-3"> <span>
                                JUMEIRAH-AL WASL VR
                            </span>
                            GAMES</h2>
                        <p> THE MOST ENJOYABLE ROOMS WITH LIVE
                            ACTORS!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-game-area vr_game_features position-relative featurerooms  pt-115 pb-90 "
        style="min-height: 900px !important;">
        <div class="featured-game-bg "></div>
        <div class="container " style="max-width: 1500px;">

            <div class="row featured-active ">

                <div class=" custom-col grid-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="featured-game-item mb-30">
                        <div class="featured-game-thumb">
                            <img src="{{ asset('assets/site/images/vrgames/vrgame_rooms/01.png') }}" alt>
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

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }}" alt>
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
                            <img src="{{ asset('assets/site/images/vrgames/vrgame_rooms/02.png') }}" alt>
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

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }}" alt>
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
                            <img src="{{ asset('assets/site/images/vrgames/vrgame_rooms/03.png') }}" alt>
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

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }}" alt>
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
                            <img src="{{ asset('assets/site/images/vrgames/vrgame_rooms/03.png') }}" alt>
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
                                    <img src=" {{ asset('assets/site/images/icons/rooms_icons/Vector.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span>60</span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;
                                    <span> Hard </span>
                                    &nbsp;
                                    &nbsp;
                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Vector2.webp') }}" alt>
                                    &nbsp;
                                    &nbsp;

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/People.webp') }}" alt>
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
                            <img src="{{ asset('assets/site/images/vrgames/vrgame_rooms/03.png') }}" alt>
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

                                    <img src="{{ asset('assets/site/images/icons/rooms_icons/Hammer.webp') }}" alt>
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

            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script></script>
@endsection
