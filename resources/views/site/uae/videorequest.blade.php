@extends('site.dubai.master')
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
            padding: 12px;
            background-color: #1a181e;
            border: 1px solid #3a3a3a;
            border-radius: 4px;
            color: #fff;
            /* Text color */
        }

        .checkbox-label {
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .checkbox-label input[type="checkbox"] {
            margin-right: 10px;
        }

        .redirect-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Center the icon horizontally */
            background-color: #880611;
            /* Red background for the icon */
            padding: 8px;
            /* Padding around the icon */
            border-radius: 4px;
            /* Rounded corners for the icon background */
            margin-left: 10px;
            /* Space between checkbox and icon */
        }

        .redirect-icon i {
            color: #fff;
            /* Icon color */
        }

        .flatpickr-day {
            color: black !important;
            /* Ensure this overrides the default styles */
        }
    </style>
@endsection
@section('content')



    <section class="page-banner" style="position: static; overflow: hidden;">
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"
            style="position: absolute;  left: 50%; transform: translate(-50%, -50%); width: 100vw; height: 100vh; object-fit: cover; z-index: -1;">
            <source src="{{ asset('assets/site/images/thumbnail/5.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Image on top of the video -->
        <img src="{{ asset('assets/site/images/ImagesThumb/Horror_Background.webp') }}" class="top___image__slide"
            alt="Descriptive Text" />
        <div class="banner-inner">
            <div class="auto-container">
                <!-- Content here -->
            </div>
        </div>
    </section>



    <section class="faq-section" style="background: #07070f; padding-bottom: 50px !important; padding-top:230px;">

        <div class="top-pattern-layer"
            style="background: url({{ asset('assets/site/images/newImages/layers/pattern-black-up.webp') }});"></div>

        <!-- bottom for pattern -->
        <div class="bottom-pattern-layer-dark-allblack"
            style="background: url({{ asset('assets/site/images/newImages/layers/pattern-black-bottom.webp') }}); bottom: -72px;">
        </div>



        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <div class="col-2 m-auto">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>



        <form action="{{ route('requestvideo.store') }}" method="POST">
            @csrf @method('POST')

            <div class="formbold-main-wrapper" style="padding-bottom: 0px;">

                <div class="formbold-form-wrapper" style="width: auto !important;  width: 100% !important;">

                    <div class="row"
                        style="position: relative;
        display: block;
        margin-bottom: 20px;
        background-image: linear-gradient(to left, transparent, #880611 20%, #880611 80%, transparent);
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: 100% 2px;">

                        <div class="col-12" style="text-align: center; margin-bottom: 10px;">

                            <h1 style="color: #ffff; padding-bottom: 20px;" class="glitch">
                                VIDEO ORDER
                            </h1>

                        </div>

                    </div>

                    <div class="row ">

                        <div class="col-12">



                            <div class="form-container formbold-mb-5 formbold-pt-3">
                                <div class="section-title">
                                    <label class="formbold-form-label formbold-form-label-2">
                                        Personal Information
                                    </label>
                                </div>

                                <div class="inputform_part" style="width: 450px">

                                    <div class="row g-1 w-100">

                                        <div class="col-12 mb-2">
                                            <label for="name" class="formbold-form-label">First
                                                Name</label>

                                            <input type="text" name="firstname" id="first_name" placeholder="First Name"
                                                value="{{ old('firstname') }}" class="formbold-form-input" />
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="lastname" class="formbold-form-label">Last
                                                Name</label>
                                            <input type="text" name="lastname" id="lastname" placeholder="Last Name"
                                                class="formbold-form-input" />

                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="phone" class="formbold-form-label">
                                                Phone Number </label>
                                            <input type="text" name="phoneNumber" id="phone"
                                                placeholder="Enter your Phone number" class="formbold-form-input" />
                                        </div>


                                        <div class="col-12 mb-2">
                                            <label for="email" class="formbold-form-label">
                                                Email Address </label>
                                            <input type="email" name="email" id="email"
                                                placeholder="Enter your email address" class="formbold-form-input" />
                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>


            <div class="formbold-main-wrapper" style="padding-top: 0px; padding-bottom: 0px;">

                <div class="formbold-form-wrapper" style="width: auto !important; width: 100% !important;">

                    <div class="row"
                        style="position: relative;
        display: block;
        margin-bottom: 20px;
        background-image: linear-gradient(to left, transparent, #880611 20%, #880611 80%, transparent);
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: 100% 2px;">

                        <div class="col-12" style="text-align: center; margin-bottom: 10px; visibility: hidden;">

                            <h1 style="color: #ffff; padding-bottom: 20px;">
                                VIDEO ORDER </h1>

                        </div>

                    </div>

                    <div class="row " style>

                        <div class="col-12">



                            <div class="form-container formbold-mb-5 formbold-pt-3">

                                <div class="section-title">

                                    <label class="formbold-form-label formbold-form-label-2">
                                        Reservation Information
                                    </label>

                                </div>

                                <div class="inputform_part" style=" width: 450px;">

                                    <div class="row g-1 w-100">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="field-group mb-2" style="width: 100%;">
                                                <label for="city" class="formbold-form-label">Select Store</label>
                                                <select name="store" id="city" class="formbold-form-input">
                                                    <option value="1">Dubai</option>
                                                    <option value="2">Abudhabi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12">
                                            <div class="field-group mb-2" style="width: 100%;">
                                                <label for="store_room" class="formbold-form-label">Select Room</label>
                                                <select name="room" id="store_room" class="formbold-form-input">
                                                    @foreach ($roomData as $room)
                                                        <option value="{{ $room['id'] }}">{{ $room['title'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12">
                                            <div class="field-group mb-2" style="width: 100%;">
                                                <label for="datepickerrr" class="formbold-form-label">Select Date</label>
                                                <input type="text" id="datepickerrr" class="formbold-form-input"
                                                    name="date" onclick="" onchange="dateChanged(this)" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12">
                                            <div class="field-group mb-2" style="width: 100%;">
                                                <label for="time_selection" class="formbold-form-label">Select
                                                    Time</label>
                                                <select name="time" id="time_selection" class="formbold-form-input">
                                                    <!-- Time options here -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <div class="formbold-form-wrapper" style="width: auto !important; width: 100% !important;">

                <div class="row"
                    style="position: relative;
        display: block;
        margin-bottom: 20px;
        background-image: linear-gradient(to left, transparent, #880611 20%, #880611 80%, transparent);
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: 100% 2px;">
                    <div class="col-12" style="text-align: center; margin-bottom: 10px; visibility: hidden;">

                        <h1 style="color: #ffff; padding-bottom: 20px;">
                            VIDEO ORDER </h1>

                    </div>

                </div>


                <div class="row ">

                    <div class="col-12">


                        <div class="form-container formbold-mb-5 formbold-pt-3">


                            <div class="section-title">
                                <label class="formbold-form-label formbold-form-label-2">
                                    Video Type
                                </label>
                            </div>

                            <div class="inputform_part" style=" width: 450px;">


                                <div class="row g-1 w-100">



                                    @foreach ($video_prices as $video_price)
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="field-group formbold-mb-5 mb-2" style="width: 100%;">
                                                <label for="name"
                                                    class="formbold-form-label">{{ $video_price->title }}</label>
                                                <div class="formbold-form-input flex items-center justify-between"
                                                    style="padding: 12px 14px; background-color: #1a181e; border: 1px solid #3a3a3a; border-radius: 4px; align-items: center;">
                                                    <label for="video-type-{{ $video_price->id }}"
                                                        class="flex items-center" style="margin: 0;">
                                                        <input type="radio" name="video_type"
                                                            id="video-type-{{ $video_price->id }}"
                                                            value="{{ $video_price->id }}"> &nbsp;
                                                        {{ $video_price->title }} {{ $video_price->price }} AED
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach








                                    {{-- <div class="col-lg-6 col-sm-12">
                                        <div class=" field-group formbold-mb-5 mb-2" style="width: 100%;">
                                            <label for="name" class="formbold-form-label">Short
                                                Video</label>
                                            <div class="formbold-form-input flex items-center justify-between"
                                                style=" padding: 12px 14px; background-color: #1a181e; border: 1px solid #3a3a3a; border-radius: 4px; align-items: center;">
                                                <label for="short-video" class="flex items-center" style="margin: 0;">
                                                    <input type="radio" name="video_type" id="short-video"
                                                        value={$video_prices}> &nbsp;
                                                    Short Video {video_prices} AED
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class=" field-group formbold-mb-5 mb-2" style="width: 100%;">

                                            <label for="name" class="formbold-form-label">Long
                                                Video</label>
                                            <div class="formbold-form-input flex items-center justify-between"
                                                style=" padding: 12px 14px; background-color: #1a181e; border: 1px solid #3a3a3a; border-radius: 4px; align-items: center;">
                                                <label for="long-video" class="flex items-center" style="margin: 0;">
                                                    <input type="radio" name="video_type" id="long-video"
                                                        value={$video_prices}> &nbsp;
                                                    Long Video {$video_prices} AED
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="formbold-main-wrapper" style="padding-top: 0px; padding-bottom: 0px;">

                <div class="formbold-form-wrapper" style="width: auto !important; width: 100% !important;">

                    <div class="row"
                        style="position: relative;
    display: block;
    margin-bottom: 20px;
    background-image: linear-gradient(to left, transparent, #880611 20%, #880611 80%, transparent);
    background-repeat: no-repeat;
    background-position: bottom;
    background-size: 100% 2px;">

                        <div class="col-12" style="text-align: center; margin-bottom: 10px; visibility: hidden;">

                            <h1 style="color: #ffff; padding-bottom: 20px;">
                                VIDEO ORDER </h1>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12">

                            <div class="form-container formbold-mb-5 formbold-pt-3">

                                <div class="section-title">
                                    <label class="formbold-form-label formbold-form-label-2">
                                        Payment Method
                                    </label>
                                </div>

                                <div class="inputform_part" style=" width: 450px;">
                                    <div class="row g-1 w-100">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class=" field-group formbold-mb-5 mb-2" style="width: 100%;">
                                                <label for="name" class="formbold-form-label"> Online </label>
                                                <div class="formbold-form-input flex items-center justify-between"
                                                    style=" padding: 12px 14px; background-color: #1a181e; border: 1px solid #3a3a3a; border-radius: 4px; align-items: center;">
                                                    <label for="online_payment" class="flex items-center"
                                                        style="margin: 0;">
                                                        <input type="radio" name="payment_method" id="online_payment"
                                                            value="2"> &nbsp;
                                                        Credit Card
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- <div class="col-lg-6 col-sm-12">
                                            <div class=" field-group formbold-mb-5 mb-2" style="width: 100%;">

                                                <label for="name" class="formbold-form-label"> Upon Arrival </label>
                                                <div class="formbold-form-input flex items-center justify-between"
                                                    style=" padding: 12px 14px; background-color: #1a181e; border: 1px solid #3a3a3a; border-radius: 4px; align-items: center;">
                                                    <label for="cash_payment" class="flex items-center"
                                                        style="margin: 0;">
                                                        <input type="radio" name="payment_method" id="cash_payment"
                                                            value="1"> &nbsp;
                                                        Cash
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->


                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>
            </div>


            <div class="formbold-main-wrapper" style="padding-top: 0px; padding-bottom: 0px;">



                <div class="formbold-form-wrapper" style="width: auto !important; width: 100% !important;">

                    <div class="row"
                        style="position: relative;
display: block;
margin-bottom: 20px;
background-image: linear-gradient(to left, transparent, #880611 20%, #880611 80%, transparent);
background-repeat: no-repeat;
background-position: bottom;
background-size: 100% 2px;">


                        <div class="col-12" style="text-align: center; margin-bottom: 10px; visibility: hidden;">

                            <h1 style="color: #ffff; padding-bottom: 20px;">
                                VIDEO ORDER </h1>

                        </div>
                    </div>



                    <div class="row ">

                        <div class="col-12">

                            <div class="form-container formbold-mb-5 formbold-pt-3">

                                <div class="section-title">
                                    <label class="formbold-form-label formbold-form-label-2">
                                        Billing Adress
                                    </label>
                                </div>


                                <div class="inputform_part" style=" width: 450px;">

                                    <div class="row g-1 w-100">

                                        <div class="col-12">
                                            <div class="formbold-mb-5" style="margin-bottom: 10px;">
                                                <label for="name" class="formbold-form-label">
                                                    Address </label>
                                                <input type="text" name="video_description" id="area"
                                                    placeholder="Address" class="formbold-form-input" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12 w-100">
                                            <div class="formbold-mb-5">
                                                <label for="country" class="formbold-form-label">Country</label>

                                                <input type="text" name="address_country" id="country"
                                                    placeholder="Country" class="formbold-form-input" />
                                            </div>
                                        </div>



                                        <div class="col-lg-6 col-sm-12 w-100">


                                            <div class="formbold-mb-5">
                                                <label for="city_for" class="formbold-form-label">City</label>

                                                <input type="text" name="address_city" id="city_for"
                                                    placeholder="City" class="formbold-form-input" />
                                            </div>

                                        </div>


                                        <div class="col-12">

                                            <div class="checkbox-container mb-4"
                                                style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px; margin-top: 50px;">
                                                <label for="terms" class="checkbox-label">
                                                    <input type="checkbox" name="terms" id="terms" value="true">
                                                    Have
                                                    read
                                                    and approved all terms
                                                </label>
                                                <a href="{{ route('dubai.terms') }}" target="_blank"
                                                    class="redirect-icon">
                                                    <i class="fa-solid fa-share-from-square"></i>
                                                </a>
                                            </div>

                                        </div>


                                        <div class="col-12">
                                            <div class="checkbox-container mb-4"
                                                style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px;">
                                                <label for="policy" class="checkbox-label">
                                                    <input type="checkbox" name="privacy" id="policy" value="true">
                                                    I Have
                                                    read and agree to the
                                                    Privacy Policy.
                                                </label>
                                                <a href="{{ route('dubai.privacy') }}" target="_blank"
                                                    class="redirect-icon">
                                                    <i class="fa-solid fa-share-from-square"></i>
                                                </a>
                                            </div>
                                        </div>



                                        <div class="col-12">

                                            <div class="checkbox-container mb-4"
                                                style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px;">
                                                <label for="long-first" class="checkbox-label">
                                                    <input type="checkbox" name="liability" id="long-first"
                                                        value="true"> I Have
                                                    read
                                                    and agree to the
                                                    liability policy
                                                </label>
                                                <a href="{{ route('dubai.disclaimer') }}" target="_blank"
                                                    class="redirect-icon">
                                                    <i class="fa-solid fa-share-from-square"></i>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div style="text-align: center">
                                                <button id="buyNowBtn" type="submit" class="formbold-btn"
                                                    style="padding-top: 10px; padding-bottom: 10px; background: #910613; max-width:700px">
                                                    BUY NOW
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>

    <section class="reviews-section"
        style="background: url({{ asset('assets/site/images/newImages/blackIcon/white_bg_crack-04.webp') }})">

        <div class="bottom-pattern-layer-dark-allblack"
            style="background: url({{ asset('assets/site/images/newImages/layers/pattern-black-up.webp') }});"></div>

        <div class="auto-container">

            <div class="row">

                <div class="col-12">

                    <div class="slide-item">
                        <div class="inner">
                            <div class="text">
                                <p style="text-align: center; font-size: 20px; color: #910613;">
                                    <strong style="color: #cbcbcb;">Black
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
        document.addEventListener('DOMContentLoaded', function() {

            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="videoLength"]');
            const button = document.getElementById('buyNowBtn');

            // Function to check the status of checkboxes
            function updateButtonStatus() {
                let allChecked = true;
                checkboxes.forEach(function(checkbox) {
                    if (!checkbox.checked) {
                        allChecked = false;
                    }
                });

                button.disabled = !allChecked;
            }

            // Attach the event listener to each checkbox
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', updateButtonStatus);
            });

            // Initial check in case of any default checks
            updateButtonStatus();
        });







        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datepickerrr", {
                dateFormat: "Y-m-d",
                defaultDate: "today", // Set default date to today
                onChange: function(selectedDates, dateStr, instance) {
                    console.log('Date selected:', dateStr);
                }
            });
        });



        // change data
        const hoursData = @json($hours->toArray());



        document.addEventListener('DOMContentLoaded', function() {
            const roomSelection = document.getElementById('store_room');
            const timeSelection = document.getElementById('time_selection');

            roomSelection.addEventListener('change', function() {
                const selectedRoomId = this.value;
                // Filter hours for the selected room
                const filteredHours = hoursData.filter(hour => hour.room_id == selectedRoomId);

                // Clear existing options
                timeSelection.innerHTML = '<option>Select Time</option>';
                // Populate time selection with filtered hours
                filteredHours.forEach(hour => {
                    const optionText = `${hour.start} to ${hour.end}`; // Adjust format as needed
                    const option = new Option(optionText, hour
                        .id); // Use hour ID or another identifier as the value
                    timeSelection.add(option);
                });
            });

            // Automatically select the first room and trigger the change event
            if (roomSelection.length > 0) {
                roomSelection.selectedIndex = 0; // Select the first room
                roomSelection.dispatchEvent(new Event('change')); // Trigger the change event programmatically
            }
        });




        // document.addEventListener('DOMContentLoaded', function() {
        //     const roomSelection = document.getElementById('store_room');
        //     const timeSelection = document.getElementById('time_selection');

        //     roomSelection.addEventListener('change', function() {
        //         const selectedRoomId = this.value;
        //         // Filter hours for the selected room
        //         const filteredHours = hoursData.filter(hour => hour.room_id == selectedRoomId);

        //         // Clear existing options
        //         timeSelection.innerHTML = '<option>Select Time</option>';
        //         // Populate time selection with filtered hours
        //         filteredHours.forEach(hour => {
        //             const optionText = `${hour.start} to ${hour.end}`; // Adjust format as needed
        //             const option = new Option(optionText, hour
        //                 .id); // Use hour ID or another identifier as the value
        //             timeSelection.add(option);
        //         });
        //     });
        // });
    </script>
@endsection
