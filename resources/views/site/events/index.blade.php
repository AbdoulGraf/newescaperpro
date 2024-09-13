@extends('site.master')

@section('meta_tags')
    <!-- Primary Meta Tags -->
    <title>Black Out -Corporate Events and Birthday Party</title>
    <meta name="title" content="Black Out -Corporate Events and Birthday Party">
    <meta name="description" content="Black Out -Corporate Events and Birthday Party Booking now">
    <meta name="keywords" content="Black Out events, Black out corporate events, black Out birthday party, Dubai events">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://black-out.ae/">
    <meta property="og:title" content="Black Out -Corporate Events and Birthday Party">
    <meta property="og:description" content="Black Out -Corporate Events and Birthday Party Booking now">
    <meta property="og:image" content="{{ asset('img/logo/haunted-meta-logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://black-out.ae/">
    <meta property="twitter:title" content="Black Out -Corporate Events and Birthday Party">
    <meta property="twitter:description" content="Black Out -Corporate Events and Birthday Party Booking now">
    <meta property="twitter:image" content="{{ asset('img/logo/haunted-meta-logo.png') }}">

@endsection

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <style>
        .room-meta li {
            width: 33%;
            text-align: left;
            font-size: 18px;
        }
        .room-slide span{
            width: 100%;
            height: 100%;
            position: absolute;
            background: url({{ asset('img/icon/v_play.png') }}) no-repeat;
            background-position: 50% 50%;
            background-size: 20%;

        }
        .breadcrumb-img{
            width: 445px;
            height: 75px;
        }

        .text7::before{
            background: url({{ asset('img/texts/haunted_logo.png') }}) no-repeat;
            position: absolute;
            left: 393px;
            height: 280px;
            background-size: 443px;
            top: 15vh;
            /* background-position-y: -57px; */
            max-width: 450px;
        }
        input[type=radio], input[type=checkbox]{
            width: 100%;
            height: 60px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            cursor: pointer;
            border-radius: unset;
            text-align: left;
            line-height: 55px;
            transition: all 100ms linear;
            padding: 0 30px;
            white-space: nowrap;
        }
        input[type=radio]:before, input[type=checkbox]:before{
            content: "\f192";
            font-family: "Font Awesome 6 Free";
            color: #fff;
            display: inline-block;
            text-align: left;
            width: 10px;
            height: 10px;
            position: relative;
            left: 0;
            margin-right: 15px;
        }
        .form-control:focus {
            color: black;
            background-color: #c31e24;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        input[type=radio]:after, input[type=checkbox]:after{
            content: attr(label);
            display: inline-block;
            text-align: left;
            width: auto;
        }
        input[type=radio]:checked, input[type=checkbox]:checked {
            background: #c31e24;
            color: white;
            font-weight: bold;
            box-shadow: 0 1px 1px #0000002e;
            border-color: #c31e24;
        }

        .banner{
            background-image: url({{ asset("img/hand.webp") }});
            background-repeat: no-repeat;
            min-height: 340px;
            background-position-x: right;
            background-size: calc(50% - 30em);
            background-position-y: 10em;
        }
        @media only screen and (min-width: 320px) and (max-width: 430px) and (orientation: portrait) {
            .text7:before {
                visibility: hidden;
                display: none;
            }
            .breadcrumb-img {
                width: 300px;
                height: auto;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1800px) {
            .text7:before {
                top: 18.8vh;
            }
            input[type=radio], input[type=checkbox]{
                padding: 0 15px;
            }
        }

        @media screen and (min-width: 2048px) and (orientation: landscape){
            .text7:before {
                top: 13.5vh;
            }
        }
    </style>
@endsection

@section('content')
    <!-- breadcrumb-area -->
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center" style="padding: 140px 0;">
                       <h3>Events</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- game-single-area -->
    <section class="game-single-area pb-120">
        <div class="container-full-padding">
            <div class="row d-flex">
                <div class="col-md-12 col-xl-4 col-lg-4 col-md-4 py-3">
                    <div class="room-slide">
                        <picture>
                            <source media="(min-width: 1920px)" srcset="{{ asset("img/posters/events.webp") }}">
                            <source media="(min-width: 1366px)" srcset="{{ asset("img/posters/events.webp") }}">
                            <source media="(min-width: 768px)" srcset="{{ asset("img/posters/events.webp") }}">
                            <source media="(min-width: 480px)" srcset="{{ asset("img/posters/events.webp") }}">
                            <a href="{{ asset("img/posters/events.webp") }}" data-fancybox="gallery" id="photo">
                                <img src="{{ asset("img/posters/events.webp") }}" alt="Black Out | Best Escape Rooms" title="Birthday Party" width="100%">
                            </a>
                        </picture>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 col-lg-8 col-md-8 py-3">

                    <div class="description">
                        <h2>Corporate Events</h2>
                        <p>Happy and relaxed work place requires a strong core team. So how would you strenghten your team? Of course with a game that requires team effort. And If you add a little bit of spice like excitement, puzzles and some horror… It gives you the solution; Black Out!</p>
                        <p>At Black Out not only your team will be winning but also your company will be winning; because It forces your team to shine up their skills in a teamwork</p>
                        <br><br><br>
                        <h2>Birthday Party</h2>
                        <p>Have a unforgettable and unique experience for YOUR day, yes we are talking about THE BIRTH DAYS! Not only for you but your friend group also! Have memorable and HaUnTiNg memories with your friends!</p>
                        <p>At Black Out your birthday party won’t be like the any others, give us name and date and let us sort out what is left!</p>

                    </div>
                </div>
                <div class="col-md-12 col-xl-4 py-3">
                    @livewire('events.reservation-form')
                </div>
            </div>
        </div>
    </section>
    <!-- game-single-area-end -->

@endsection

@section('scripts')

    <script>
        $(function () {
            Fancybox.bind('[data-fancybox="gallery"]');
        });
    </script>
@endsection
