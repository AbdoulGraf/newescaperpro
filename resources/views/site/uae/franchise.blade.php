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
    <section class="featured-game-area position-relative  pt-115 pb-90 bg-dark franchise_banner"
        style="background-image: url('{{ asset('assets/site/images/uae/franchise.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 500px; width: 100%; z-index: -1; display: flex; align-items: center; margin-bottom: 90px;">
        <div class="container" style="max-width: 100%; margin-top: 70px;">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title title-style-three text-center mb-70">
                        <h2 class="mb-3"> <span>
                                FRANCHISE
                            </span>
                        </h2>
                        <h5 class="banner_h5_title"> <strong>Escape
                                House</strong> Escape House is the
                            perfect place for a team
                            worasdasdasdasdasdasasdk together and
                            achieve one goal: <strong>Success
                            </strong>.</h5>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="inner-about-area blog_home_banner fix ghost_on_top_form  franchise_page_ghost">

        <div class="inner-about-shape  blog_about_inner_shape">

            <img src="{{ asset('assets/site/images/blog/blog_to.webp') }}" alt>

        </div>
    </section>

    <!-- vr house end -->

    <!-- blog section part -->

    <section
        class="form-section_franchise onlyfranchise_section d-flex align-items-center justify-content-center ghost_form_onbottom  franchise_ghost_form_onbottom"
        style="background-image: url('{{ asset('assets/site/images/about/aboutbackground.webp') }}'); margin-bottom: 0px; padding-bottom: 70px; margin-top: 130px !important;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="franchise-form p-4">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First
                                    Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Phone
                                    Number</label>
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="requestFranchise">Request
                                    Franchise</label>
                                <input type="text" class="form-control" id="requestFranchise"
                                    placeholder="Request Franchise">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="writeMessage">Write
                                    Message</label>
                                <textarea class="form-control" id="writeMessage" placeholder="Write Message" rows="9"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 d-flex align-items-center ">

                                <div class="form-control terms_input">

                                    <input class="form-check-input" type="checkbox" id="terms">
                                    <label class="form-check-label ml-2" for="terms">I Have Read and
                                        approved all terms</label>
                                    <div class="terms_icons">
                                        <svg width="25" height="25" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect width="31.0995" height="31.0995" fill="url(#pattern0_78_4022)" />
                                            <defs>
                                                <pattern id="pattern0_78_4022" patternContentUnits="objectBoundingBox"
                                                    width="1" height="1">
                                                    <use xlink:href="#image0_78_4022" transform="scale(0.0111111)" />
                                                </pattern>
                                                <image id="image0_78_4022" width="90" height="90"
                                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAADKElEQVR4nO3bPYhdRRiH8esKMQsRjDZplCRiZ2chqJVEC8F8gFEQGxuxiyjBL2w1EIwJagoJFopNRFAM66qFINY2gsFCCDFZokTBBUVF85NDpkv27t3N2Zkzc96n2mrPf5/77rnzvjMzmQRBEARBEARBEARBEARVgU14A7/iF7yOG0rnag4ccSULIbtncPEqokN235jOIjb3/tAxYnVCdibRITuj6JCdUXTIzig6ZGcUHbIzig7ZGUWH7IyiQ3ZG0SE7o+jxysYtuBeP43m8iU/wFb7Fj2k02idtT/2wDfvTLPkLLPUscJyyMY+H8Q5+MDzqlY3NeCz9+/9h+NQlG3fiLfymPoYvG/fhU1xSN8NcjeBufK0thlPZuBUnG6jglXittOA5PIVlbXOhpOTb8I1xsFRK8p4N6MyGzKu5BV+HVxp+F5f/MkzHr943LhZKSP7YuFjMuobuPtH00DGxkLuS59L6eEwsZu8G8bZxsZC9C8TTxsViiUruZhZ/F/qD/8JpnMJRPIMnsQ/34y7sxM21V/J8xoH8Ej7Cc0li123OrSFrvUMjHLZxnMPxtBe4vYes1UruXhn/6pefcAy7cH3PeeubNaf18vc9yf0T7+Kerm3fwMz1zZhxoAfBF/Fyd1wgU+bqJG/Bz9cgeBkvdb8nc+56JKfAXRWuh0vpFbGtUO6qJN+0zl3qM3igWPDarlbghXVI7s5nbC0avKbLQmlo1J1jm5X/cHAjVxJroZodbDy4xtb40cmAUIPkjtT+zkI393hoMjDUcEW5e8finxkkd53i3skAcfkE6nAld+CJGav52clAcXmL7Uiq7AtpTjMcyR34cAbJH5TOWTVprrE8w6St+BKuatLsd7WOb1fpnNWTDsFM473SGZsAn6+ylNtZOmP1pG7w9ymij5XO2AS4fZUWe0fpjE2A3VNEnyqdrxnw4hTR+0vnawacmDI0urF0vmbAZyuI/rJ0tqbAd4O8ENMaOLuC6EdKZ2uKKXdP7iidrSmmzKDnS2drCpy/iuRzpXM1Bw7FF2G+XYlDqbLPp5835Xh2EARBEARBEARBEARBMBk0/wO8rcp9fE5uLgAAAABJRU5ErkJggg==" />
                                            </defs>
                                        </svg>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-danger"
                                    style="padding: 10px 40px; border-radius: 10px; text-transform: uppercase; font-weight: 700;">REQUEST
                                    FRANCHISE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script></script>
@endsection
