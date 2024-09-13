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


.checkbox-container {
                display: flex;
                align-items: center;
                padding: 12px; /* Adjusted to give overall padding */
                background-color: #1a181e; /* Dark background for the container */
                border: 1px solid #3a3a3a;
                border-radius: 4px;
                color: #fff; /* Text color */
            }

            .checkbox-label {
                flex-grow: 1;
                display: flex;
                align-items: center;
            }

            .checkbox-label input[type="checkbox"] {
                margin-right: 10px; /* Space between checkbox and label text */
            }

            .redirect-icon {
                display: flex;
                align-items: center; /* Center the icon vertically */
                justify-content: center; /* Center the icon horizontally */
                background-color: #880611; /* Red background for the icon */
                padding: 8px; /* Padding around the icon */
                border-radius: 4px; /* Rounded corners for the icon background */
                margin-left: 10px; /* Space between checkbox and icon */
            }

            .redirect-icon i {
                color: #fff; /* Icon color */
            }




            .hero-form {
  margin-top: 10px;
}



.hero-form-input {
  display: grid;
  grid-template-columns: 1fr;
}

@media (min-width: 400px) {
  .hero-form-input {
    display: grid;
    grid-template-columns: 1fr auto;
  }
}

.hero-email-input {
  padding: 5px 1rem;
  box-sizing: border-box;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  /* background: #3a3a3a; */
}

.hero-form-submit {
    border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  background-color: #880611;
  color: #fff;
  border: none;
  padding: 5px 2rem;
  margin-top: 0.5rem;
}

@media (min-width: 400px) {
  .hero-form-submit {
    margin-top: 0;
  }
}



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
style="background: #07070f; padding-bottom: 100px !important; padding-top:230px;">

<div class="top-pattern-layer"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>

<!-- bottom for pattern -->
<div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-bottom.webp')}}); bottom: -73px;"></div>


<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper"
        style="width: auto !important; max-width: 1200px !important">
        <div class="row" style="position: relative;
        display: block;
        margin-bottom: 20px;
        background-image: linear-gradient(to left, transparent, #880611 20%, #880611 80%, transparent);
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: 100% 2px;">

            <div class="col-12"
                style="text-align: center; margin-bottom: 10px;">

                <h1
                    style="color: #ffff; padding-bottom: 20px;"
                    class="glitch">RESERVATION</h1>
            </div>

        </div>

        <div class="row">

            @if($errors->any())
            <div class="alert alert-danger" style="width: 100%; text-align: center;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success" style="width: 100%; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        </div>

        <div class="row ">

            <div class="col-lg-8 col-md-12 col-sm-12">


                <form action="{{ route('reservations.store')}}" method="POST">
                    @csrf @method('POST')
                    <input name="room_id" type="hidden" value="{{ $room_id }}">
                    <input name="place_id" type="hidden" value="{{ $place_id }}">
                    <input name="hour_id" type="hidden" value="{{ $hour_id }}">
                    <input name="reservation_date" type="hidden" value="{{ $reservation_date }}">
                    <input name="players" type="hidden" value="{{ $players }}">
                    <input name="promocode" type="hidden">

                    


                    <div class="form-container formbold-mb-5 formbold-pt-3" style="gap: 10px;">
                        <div class="section-title">
                            <label
                                class="formbold-form-label formbold-form-label-2">
                                Personal Information
                            </label>
                        </div>

                        <div class="inputform_part">

                            <div class="field-group formbold-mb-5 mb-2">
                                <label for="name"
                                    class="formbold-form-label">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}"  id="name" placeholder="Full Name" class="formbold-form-input" required />
                                @if($errors->has('first_name')) <span class="text-danger">{{ $errors->first('first_name') }}</span> @endif
                            </div>

                            <div
                                class="field-group formbold-mb-5 mb-2">
                                <label for="lastname"
                                    class="formbold-form-label">Last
                                    Name</label>

                                <input type="text"
                                    name="last_name"
                                    id="lastname"
                                    placeholder="Last Name"
                                   value="{{ old('last_name') }}"
                                    class="formbold-form-input" required/>
                                @if($errors->has('last_name')) <span class="text-danger">{{ $errors->first('last_name') }}</span> @endif
                            </div>

                            <div
                                class="  field-group formbold-mb-5 mb-2">
                                <label for="phone"
                                    class="formbold-form-label">
                                    Phone Number </label>
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="Enter your phone number"
                                    class="formbold-form-input" required/>
                                @if($errors->has('phone')) <span class="text-danger">{{ $errors->first('phone') }}</span> @endif
                            </div>

                            <div class="formbold-mb-5 mb-4">
                                <label for="email"
                                    class="formbold-form-label">
                                    Email Address </label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Enter your email"
                                    value="{{ old('email') }}"
                                    class="formbold-form-input" required/>
                                @if($errors->has('email')) <span class="text-danger">{{ $errors->first('email') }}</span> @endif
                            </div>

                        </div>

                    </div>

                    <div
                        class="form-container formbold-mb-5 formbold-pt-3"
                        style="gap: 10px;">
                        <div class="section-title">
                            <label
                                class="formbold-form-label formbold-form-label-2">
                                Payment Method
                            </label>
                        </div>


                        <div class="inputform_part"
                        style=" width: 450px;">
                        <div class="row w-full">
                            <div class="col-lg-6 col-sm-12">

                                <div
                                    class=" field-group formbold-mb-5 mb-2"
                                    style="width: 100%;">
                                    <label for="name"
                                        class="formbold-form-label"> Online </label>
                                    <div
                                        class="formbold-form-input flex items-center justify-between"
                                        style=" padding: 12px 14px; background-color: #1a181e; border: 1px solid #3a3a3a; border-radius: 4px; align-items: center;">
                                        <label
                                            for="online_payment"
                                            class="flex items-center"
                                            style="margin: 0;">
                                            <input
                                                type="radio"
                                                name="payment_method"
                                                id="online_payment"
                                                value="2"> &nbsp;
                                            Credit Card
                                        </label>
                                        @if($errors->has('payment_method')) <span class="text-danger">{{ $errors->first('payment_method') }}</span> @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div
                                    class=" field-group formbold-mb-5 mb-2"
                                    style="width: 100%;">

                                    <label for="name"
                                        class="formbold-form-label"> Upon Arrival </label>
                                    <div
                                        class="formbold-form-input flex items-center justify-between"
                                        style=" padding: 12px 14px; background-color: #1a181e; border: 1px solid #3a3a3a; border-radius: 4px; align-items: center;">
                                        <label
                                            for="cash_payment"
                                            class="flex items-center"
                                            style="margin: 0;">
                                            <input
                                                type="radio"
                                                name="payment_method"
                                                id="cash_payment"
                                                value="1"> &nbsp;
                                            Cash
                                        </label>
                                        @if($errors->has('payment_method')) <span class="text-danger">{{ $errors->first('payment_method') }}</span> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div
                        class="form-container formbold-mb-5 formbold-pt-3"
                        style="gap: 10px;">
                        <div class="section-title">
                            <label
                                class="formbold-form-label formbold-form-label-2">
                                Billing Address
                            </label>
                        </div>

                        <div class="inputform_part">

                            <div
                                class="formbold-mb-5 formbold-pt-3">

                                <div class="formbold-mb-5"
                                    style="margin-bottom: 10px;">
                                    <label for="name"
                                        class="formbold-form-label">
                                        Address </label>
                                    <input
                                        type="text"
                                        name="address"
                                        id="area"
                                        value="{{ old('address') }}"
                                        placeholder="Address"
                                        class="formbold-form-input" />
                                    @if($errors->has('address')) <span class="text-danger">{{ $errors->first('address') }}</span> @endif
                                </div>

                                <div
                                    class="flex flex-wrap formbold--mx-3">

                                    <div
                                        class="w-full sm:w-half formbold-px-3">
                                        <div
                                            class="formbold-mb-5">

                                            <label for="name"
                                                class="formbold-form-label">
                                                Country </label>
                                            <input name="country"
                                                   value="{{ old('country') }}" type="text" class="formbold-form-input">
                                            @if($errors->has('country')) <span class="text-danger">{{ $errors->first('country') }}</span> @endif
                                        </div>
                                    </div>
                                    <div
                                        class="w-full sm:w-half formbold-px-3">
                                        <div
                                            class="formbold-mb-5">

                                            <label for="name"
                                                class="formbold-form-label">
                                                City </label>
                                            <input name="city"
                                                   value="{{ old('city') }}" type="text" class="formbold-form-input">
                                            @if($errors->has('city')) <span class="text-danger">{{ $errors->first('city') }}</span> @endif
                                        </div>
                                    </div>

                                </div>

                                <div
                                    class="checkbox-container mb-4"
                                    style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px; margin-top: 50px;">
                                    <label for="long-video"
                                        class="checkbox-label">
                                        <input type="checkbox"
                                            name="terms"
                                            id="long-video"
                                               checked
                                            value="1"> Have
                                        read
                                        and approved all terms
                                    </label>
                                    <a href="{{route('abudhabi.terms')}}"
                                        target="_blank"
                                        class="redirect-icon">
                                        <i
                                            class="fa-solid fa-share-from-square"></i>
                                    </a>
                                    @if($errors->has('terms')) <span class="text-danger">{{ $errors->first('terms') }}</span> @endif
                                </div>

                                <div
                                    class="checkbox-container mb-4"
                                    style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px;">
                                    <label for="policy"
                                        class="checkbox-label">
                                        <input type="checkbox"
                                            name="privacy"
                                            id="policy"
                                               checked
                                            value="1"> I Have
                                        read and agree to the
                                        Privacy Policy.
                                    </label>
                                    <a href="{{route('abudhabi.privacy')}}"
                                        target="_blank"
                                        class="redirect-icon">
                                        <i
                                            class="fa-solid fa-share-from-square"></i>
                                    </a>
                                    @if($errors->has('privacy')) <span class="text-danger">{{ $errors->first('privacy') }}</span> @endif
                                </div>

                                <div
                                    class="checkbox-container mb-4"
                                    style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px;">
                                    <label for="long-first"
                                        class="checkbox-label">
                                        <input type="checkbox"
                                            name="liability"
                                            id="long-first"
                                               checked
                                            value="1"> I Have
                                        read
                                        and agree to the
                                        liability policy
                                    </label>
                                    <a href="{{route('abudhabi.disclaimer')}}"
                                        target="_blank"
                                        class="redirect-icon">
                                        <i
                                            class="fa-solid fa-share-from-square"></i>
                                    </a>
                                    @if($errors->has('liability')) <span class="text-danger">{{ $errors->first('liability') }}</span> @endif
                                </div>

                                <div
                                    class="checkbox-container mb-4"
                                    style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px; ">
                                    <label for="long-second"
                                        class="checkbox-label">
                                        <input type="checkbox"
                                            name="promotional"
                                            id="long-second"
                                            value="1"> I
                                        hereby grant consent to
                                        be contacted by BlackOut
                                        via SMS, email, and
                                        phone for the purpose of
                                        receiving information,
                                        updates, and promotional
                                        messages related to the
                                        services offered by
                                        BlackOut, as well as
                                        events organized by
                                        BlackOut and the
                                        BlackOut brands. I also
                                        consent to the
                                        processing of my
                                        personal identity data
                                        and contact data,
                                        including my name,
                                        surname, email address,
                                        and phone number, for
                                        these e-commerce.
                                    </label>

                                </div>

                                <div
                                    class="checkbox-container mb-4"
                                    style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px; ">
                                    <label for="long-third"
                                        class="checkbox-label">
                                        <input type="checkbox"
                                            name="commercial"
                                            id="long-third"
                                            value="1"> I
                                        hereby grant consent to
                                        BlackOut for taking
                                        pictures or videos of me
                                        while I am at the Escape
                                        Room and processing my
                                        audio-visual data. I
                                        also consent to the use
                                        of photographs and
                                        videos taken during the
                                        events I attend for
                                        commercial purposes,
                                        including their
                                        inclusion in advertising
                                        films created by
                                        BlackOut and their
                                        transfer to relevant
                                        companies for marketing
                                        purposes.
                                    </label>

                                </div>

                                <div>
                                    <button
                                        class="formbold-btn"
                                        style="padding-top: 10px; padding-bottom: 10px; background:#910613;">
                                        MAKE A RESERVATION
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>

            </div>

            <div class="col-lg-4 col-sm-12 col-md-12" style="padding: 0px 40px !important;">

                <div class="row">
                    <div class="col-lg-12 float-right mx-0 px-0 mt-3">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12"
                        style="background: #1a181e; border: 1px solid #3a3a3a; padding: 50px;">
                        <div class="row">
                            <div class="col-12"
                                style="text-align: center; margin-bottom: 10px;">
                                <h1>ORDER DETAILS</h1>

                            </div>

                            <div class="col-12">

                                <div>

                                    <div
                                        style="display: flex; justify-content: space-between; border-bottom: 1px solid; margin-bottom: 5px;">
                                        <span>Room :</span>
                                        <span><strong> {{$roomtitle}} </strong></span>
                                    </div>

                                    <div
                                        style="display: flex; justify-content: space-between; border-bottom: 1px solid; margin-bottom: 5px;">
                                        <span>Date :</span>
                                        <span><strong>{{$date}}</strong></span>
                                    </div>

                                    <div
                                        style="display: flex; justify-content: space-between; border-bottom: 1px solid; margin-bottom: 5px;">
                                        <span>Time :</span>
                                        <span><strong> {{$time}}
                                            </strong></span>
                                    </div>

                                    <div
                                        style="display: flex; justify-content: space-between; margin-bottom: 30px;">
                                        <span>Number of Players:
                                            :</span>
                                        <span><strong>{{$player_number}}</strong></span>
                                    </div>

                                    <div
                                        style="display: flex; justify-content: space-between;">
                                        <span
                                            style="color: #fff;">
                                            Total to Pay
                                            :</span>
                                        <span
                                            style="display: block;">
                                            <strong
                                                style="font-size: 35px; font-weight: 700; color: #fff;">AED
                                                {{$totalPrice}}
                                            </strong> <br>
                                            <span>AED {{$price}} per
                                                person </span>
                                        </span>
                                    </div>

                                    <div class="hero-text">
                                        <span>If you've Promotion Code</span>
                                        <form class="hero-form" id="promotion-form" action="{{ route('check-promotion') }}" method="post">
                                            @csrf @method('POST')
                                            <input type="hidden" name="pr" value="{{$price}}">
                                            <input type="hidden" name="ps" value="{{$player_number}}">
                                            <input type="hidden" name="store" value="{{$place_id}}">
                                            <div class="hero-form-input">
                                                <input
                                                    class="hero-email-input"
                                                    name="promotionCode"
                                                    type="text"
                                                    placeholder="Promote Code"
                                                    required
                                                    style="overflow: hidden;">
                                                <input
                                                    class="hero-form-submit"
                                                    type="button"
                                                id="apply-promotion"
                                                value="Apply"
                                                style="overflow: hidden;">
                                            </div>
                                        </form>
                                        <div id="promotion-result"></div> <!-- Sonuçları göstermek için bir konteynır -->
                                    </div>

                                </div>

                            </div>

                        </div>

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
        $(document).ready(function() {
            $('#apply-promotion').on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $('#promotion-form').attr('action'), // Form'un action'ından URL'yi alıyoruz
                    type: 'POST',
                    data: $('#promotion-form').serialize(), // Form verilerini serialize ediyoruz
                    dataType: 'json', // JSON formatında cevap bekliyoruz

                    success: function(response) {
                        if(response.promocode) {
                            console.dir(response);
                            // Total to Pay ve per person kısmını güncelle
                            $('strong:contains("AED")').first().text('AED ' + response.discounted_price); // Toplam ödenecek tutar
                            $('span:contains("per person")').text('AED ' + (response.discounted_price / {{$player_number}}).toFixed(2) + ' per person'); // Kişi başı fiyat
                            // set the hidden input value
                            $('input[name="promocode"]').val(response.promocode);
                            // Eğer indirim oranını ve indirim miktarını göstermek istiyorsanız:
                            // Bu kısmı indirimi ve oranı gösterecek yeni bir HTML elementine yerleştirebilirsiniz.
                            var discountInfo = 'Discount: AED ' + response.discount_amount + ' (' + response.rate + '%)';
                            // 'discountInfo' değişkenini uygun bir HTML elementine ekleyin.

                            // Başarı mesajını da göster
                            $('#promotion-result').text('Promotion applied: ' + discountInfo).css('color', 'green');
                        }else{
                            $('strong:contains("AED")').first().text('AED ' + {{ $price * $player_number }}).toFixed(2); // Toplam ödenecek tutar
                            $('span:contains("per person")').text('AED ' + ({{$player_number}}).toFixed(2) + ' per person'); // Kişi başı fiyat
                            $('#promotion-result').text('Error: ' + response.original.error).css('color', 'red');
                            return;

                        }

                    },
                    error: function(xhr) {
                        // Hata olduğunda ekrana yazdır
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Unknown error';
                        $('#promotion-result').text('Error: ' + errorMessage).css('color', 'red'); // Hata mesajını kırmızı olarak yazdır
                        $('strong:contains("AED")').first().text('AED ' + {{ $price * $player_number }}).toFixed(2); // Toplam ödenecek tutar
                        $('span:contains("per person")').text('AED ' + ({{$player_number}}).toFixed(2) + ' per person'); // Kişi başı fiyat
                    }
                });
            });
        });

    </script>
@endsection



