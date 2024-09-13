@extends('site.uae.master')
@section('meta_tags')
    <!-- Primary Meta Tags -->
    <title> Escape House - Scariest Escape Rooms </title>
    <meta name="title" content="Escape House - Scariest Escape Rooms">
    <meta name="description" content="Escape House - Scariest Escape Rooms - Gather your team and try it out yourself!">
    <meta name="keywords" content=" Escape House - Scariest Escape Rooms ">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://escapehouseuae.com/">
    <meta property="og:title" content="Escape House - Scariest Escape Rooms">
    <meta property="og:description" content="Black Out - Gather your team and try it out yourself!">
    <meta property="og:image" content="{{ asset('assets/site/images/uae/logo-menu.webp') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://escapehouseuae.com/">
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
    <section class="featured-game-area price_list position-relative  pt-115 pb-90 bg-dark">
        <div class="container" style="max-width: 100%;">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title title-style-three text-center mb-70">
                        <h2 class="mb-3"> <span>
                                PRICE
                            </span>
                            LIST</h2>
                        <!-- <p> THE MOST SCARY ROOMS WITH LIVE ACTORS!</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--End Banner Section -->

    <!-- about us section -->
    <section class="about-section">
        <div class="bottom-pattern-layer-dark"></div>

        <div class="about-content price_list_content"
            style="background-image: url('{{ asset('assets/site/images/about/aboutbackground.webp') }}');">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Text Column-->
                    <div class="text-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sec-title">
                                <h2> About
                                    <span>Us</span>
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
                    <div class="price_list_image image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box"><img src="{{ asset('assets/site/images/about/bottomImage.webp') }}" alt
                                    title style="margin-top: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--end rooms over here -->

    <!-- top title section -->

    <section class="featured-game-area position-relative featurerooms  " style="padding-top: 110px; padding-bottom: 110px;">
        <div class="featured-game-bg "></div>
        <div class="container ">

            <div class="container pricing-table mt-5">
                <table class="table table-responsive_here">
                    <thead>
                        <tr>
                            <th>Ouija</th>
                            <th>Jason's Home</th>
                            <th>Cemetery 333</th>
                            <th>The School</th>
                            <th>Exorcist</th>
                            <th>Halloween</th>
                            <th>Umm Al Duwals</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                        </tr>
                        <!-- Repeat this row structure for each row in the table -->
                        <tr>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (each)</p>
                            </td>
                            <td>
                                <span>2 Person</span>
                                <p>220 AED (okkkkkkk)</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection


@section('scripts')
    <script></script>
@endsection
