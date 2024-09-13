@extends('site.uae.master')
@section('meta_tags')
    <!-- Primary Meta Tags -->
    <title>Escape House - Scariest Escape Rooms Contact Us</title>
    <meta name="title" content="Escape House - Scariest Escape Rooms">
    <meta name="description"
        content="Escape House - Scariest Escape Rooms Contact Us - Gather your team and try it out yourself!">
    <meta name="keywords" content=" Escape House - Scariest Escape Rooms Contact Us ">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://escapehouseuae.com/">
    <meta property="og:title" content="Escape House - Scariest Escape Rooms Contact Us">
    <meta property="og:description" content="Black Out - Gather your team and try it out yourself!">
    <meta property="og:image" content="{{ asset('assets/site/images/uae/logo-menu.webp') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://escapehouseuae.com/">
    <meta property="twitter:title" content="Escape House - Scariest Escape Rooms Contact Us">
    <meta property="twitter:description" content="Escape House - Scariest Escape Rooms Contact Us">
    <meta property="twitter:image" content="{{ asset('assets/site/images/uae/logo-menu.webp') }}">
@endsection




@section('styles')
    <style>

    </style>
@endsection





@section('content')
    <section class="inner-about-area blog_home_banner fix blogg_banner"
        style="background-image: url('{{ asset('assets/site/images/uae/franchise.webp') }}'); background-size: cover; background-position: center; height: 100vh; width: 100%; z-index: -1;">
        <div class="container">
            <div class="row align-items-center">

            </div>
        </div>
        <div class="inner-about-shape  blog_about_inner_shape"><img
                src="{{ asset('assets/site/images/blog/wall_and_monster.webp') }}" alt></div>
    </section>

    <!-- vr house end -->

    <!-- blog section part -->

    <section class="news-section blog_home_section"
        style="background-image: url('{{ asset('assets/site/images/about/aboutbackground.webp') }}');">

        <div class="auto-container">
            <!--Title-->
            <div class="sec-title centered">
                <h2><span>latest</span> Blog</h2>
                <!-- <p> FOLLOW US </p> -->
            </div>

            <div class="row clearfix">

                <!--News Block-->
                <div class="news-block col-lg-6 col-md-12 col-sm-12 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box blog_home_show_section">
                        <figure class="image-box"><a href="./blog_details.html"><img
                                    src=" {{ asset('assets/site/images/blog/1.webp') }}" alt title></a></figure>
                        <div class="over-box">
                            <div class="date"><span class="date-title">26 May,
                                    2019</span></div>

                            <div class="content">

                                <h3><a href="./blog_details.html">Lorem
                                        ipsum</a></h3>
                                <p>
                                    VR House offers a unique virtual
                                    reality
                                    experience.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block-->
                <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box blog_home_last_two">
                        <figure class="image-box blog_home_last_two"><a href="./blog_details.html"><img
                                    class="blog_home_last_two" src=" {{ asset('assets/site/images/blog/02_1.webp') }}" alt
                                    title></a></figure>
                        <div class="over-box">

                            <div class="date"><span class="date-title">26 May,
                                    2019</span></div>

                            <div class="content">

                                <h3><a href="./blog_details.html">Lorem
                                        ipsum</a></h3>
                                <p>
                                    VR House offers a unique virtual
                                    reality
                                    experience.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <!--News Block-->
                <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box blog_home_last_two">
                        <figure class="image-box blog_home_last_two"><a href="./blog_details.html"><img
                                    class="blog_home_last_two" src="{{ asset('assets/site/images/blog/02_1.webp') }}" alt
                                    title></a></figure>
                        <div class="over-box">

                            <div class="date"><span class="date-title">26 May,
                                    2019</span></div>

                            <div class="content">

                                <h3><a href="./blog_details.html">Lorem
                                        ipsum</a></h3>
                                <p>
                                    VR House offers a unique virtual
                                    reality
                                    experience.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="auto-container all_blogs_section mt-5">
            <!--Title-->
            <div class="sec-title centered">
                <h2><span>All</span> Blogs</h2>
                <!-- <p> FOLLOW US </p> -->
            </div>

            <div class="row clearfix">

                <!--News Block-->
                <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="./blog_details.html"><img
                                    src=" {{ asset('assets/site/images/blog/1.webp') }} " alt title></a></figure>
                        <div class="over-box">
                            <div class="date"><span class="date-title">26 May,
                                    2019</span></div>
                            <div class="content">

                                <h3><a href="./blog_details.html">Lorem
                                        ipsum</a></h3>
                                <p>
                                    VR House offers a unique virtual
                                    reality
                                    experience.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block-->
                <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="./blog_details.html"><img
                                    src="{{ asset('assets/site/images/blog/1.webp') }} " alt title></a></figure>
                        <div class="over-box">

                            <div class="date"><span class="date-title">26 May,
                                    2019</span></div>

                            <div class="content">

                                <h3><a href="./blog_details.html">Lorem
                                        ipsum</a></h3>
                                <p>
                                    VR House offers a unique virtual
                                    reality
                                    experience.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block-->
                <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="./blog_details.html"><img
                                    src="{{ asset('assets/site/images/blog/1.webp') }} " alt title></a></figure>
                        <div class="over-box">

                            <div class="date"><span class="date-title">26 May,
                                    2019</span></div>

                            <div class="content">

                                <h3><a href="./blog_details.html">Lorem
                                        ipsum</a></h3>
                                <p>
                                    VR House offers a unique virtual
                                    reality
                                    experience.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block-->
                <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="./blog_details.html"><img
                                    src=" {{ asset('assets/site/images/blog/1.webp') }}" alt title></a></figure>
                        <div class="over-box">

                            <div class="date"><span class="date-title">26 May,
                                    2019</span></div>

                            <div class="content">

                                <h3><a href="./blog_details.html">Lorem
                                        ipsum</a></h3>
                                <p>
                                    VR House offers a unique virtual
                                    reality
                                    experience.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end part of blog -->
@endsection

@section('scripts')
    <script></script>
@endsection
