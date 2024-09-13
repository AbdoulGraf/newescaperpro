{{-- @extends('site.abudhabi.master') --}}

@php
    $layout = request()->is('*dubai*') ? 'site.dubai.master' : 'site.abudhabi.master';
@endphp

@extends($layout)


@section('meta_tags')
    <!-- Primary Meta Tags -->
    <title>{{ $datas->seo_title }}</title>
    <meta name="title" content="{{ $datas->seo_title }}">
    <meta name="description" content="{{ $datas->seo_description }}">
    <meta name="keywords" content="{{ $datas->seo_keywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ `https://black-out.ae/rooms/$datas->id` }}">
    <meta property="og:title" content="{{ $datas->seo_title }}">
    <meta property="og:description" content="{{ $datas->seo_description }}">
    <meta property="og:image" content="{{ asset($datas->banner) }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://black-out.ae/">
    <meta property="twitter:title" content="{{ $datas->seo_title }}">
    <meta property="twitter:description" content="{{ $datas->seo_description }}">
    <meta property="twitter:image" content="{{ asset($datas->banner) }}">
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var changesPlayer = 2

        function openCalendar() {
            var datePicker = document.getElementById('datepicker');

            if (datePicker.style.display === "none") {
                datePicker.style.display = "block";
            } else {
                datePicker.style.display = "none";
            }
            // Trigger click on datePicker to immediately open the calendar
            datePicker.click();
        }





        // new scroll function to next and previous
        function initializeCalendarWithDate(selectedDate = new Date(), isMobile = false) {
            selectedDate = new Date(selectedDate);
            const offset = isMobile ? -1 : -1;
            const totalDays = isMobile ? 3 : 7;
            const startDate = new Date(selectedDate);
            startDate.setDate(selectedDate.getDate() + offset);


            const calendarContainerSelector = isMobile ? '.calendar__Mobile' : '.calendar__web';
            const calendarContainer = document.querySelector(calendarContainerSelector);
            calendarContainer.innerHTML = ''; // Clear existing content

            let selectedDayIndex = -1; // Index of the selected day
            let redImageDayIndex = -1; // Index of the day with the red image

            // Generate each day for the view
            for (let i = 0; i < totalDays; i++) {

                const dayDate = new Date(startDate);

                dayDate.setDate(startDate.getDate() + i);



                const dayDiv = createDayElement(dayDate, selectedDate, isMobile, i);

                calendarContainer.appendChild(dayDiv);

            }

            // Rearrange days after selected day is updated
            if (selectedDayIndex !== -1 && redImageDayIndex !== -1) {
                rearrangeDays(calendarContainer, selectedDayIndex, redImageDayIndex);
            }



        }


        // disable the div when date passed
        function createDayElement(dayDate, selectedDate, isMobile, index) {

            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const dayDateNoTime = new Date(dayDate);
            dayDateNoTime.setHours(0, 0, 0, 0);

            const isPastDate = dayDateNoTime < today;

            const dayDiv = document.createElement('div');
            dayDiv.style.cssText = "flex-grow: 1; text-align: center; cursor: pointer;";

            const isRedImageDay = (isMobile && index === 1) || (!isMobile && index === 1);

            if (dayDateNoTime.toDateString() === selectedDate.toDateString()) {
                dayDiv.dataset.selected = "true";
            }

            if (isRedImageDay) {
                dayDiv.dataset.redImage = "true";
                dayDiv.innerHTML =
                    `<span><img src="{{ asset('assets/site/images/logoPart/favicon.png') }}" alt="Black Out Best Escape Rooms" style="max-width: 40px;"></span>`;
                dayDiv.style.color = "#950004";
            } else {
                dayDiv.style.borderBottom = "2px solid #ffff";
            }

            const dayName = dayDate.toLocaleString('en-US', {
                weekday: 'long'
            });
            const monthName = dayDate.toLocaleString('en-US', {
                month: 'short'
            });
            const dayNumber = dayDate.getDate();

            let innerHTML = `<span style="margin-bottom: 6px; display: block;">${dayName}</span>`;
            innerHTML += `<span style="font-weight: 700; font-size: 45px;">${dayNumber}</span><br>`;
            innerHTML += `<span>${monthName}</span>`;

            dayDiv.innerHTML += innerHTML;

            if (isPastDate) {
                dayDiv.style.pointerEvents = "none";
                dayDiv.style.color = "#ccc"; // gray out the past date
            } else {
                dayDiv.addEventListener('click', function() {
                    const selectedDate = new Date(dayDate);

                    dateChanged(selectedDate, isMobile);

                    initializeCalendarWithDate(selectedDate, isMobile);

                });
            }

            return dayDiv;
        }







        function rearrangeDays(calendarContainer, selectedDayIndex, redImageDayIndex) {
            const days = Array.from(calendarContainer.children);
            const selectedDayElement = days.splice(selectedDayIndex, 1)[0];
            const redImageDayElement = days.splice(redImageDayIndex, 1)[0];

            const remainingDays = days.filter(day => day !== selectedDayElement && day !== redImageDayElement);
            remainingDays.sort((a, b) => new Date(a.dataset.date) - new Date(b.dataset.date));

            calendarContainer.innerHTML = '';
            calendarContainer.appendChild(redImageDayElement);
            calendarContainer.appendChild(selectedDayElement);
            remainingDays.forEach(day => calendarContainer.appendChild(day));
        }




        let selectedDateToNotChange = new Date().toISOString().split('T')[0];
        // Adapt dateChanged function for mobile
        function dateChanged(input, isMobile = false) {


            let dateValue;

            if (input.value) {

                dateValue = input.value;
                // checkAvailabilityForDate(input.value, 2);
                // initializeCalendarWithDate(input.value, false);
                // initializeCalendarWithDate(input.value, true);
            } else {

                const year = input.getFullYear();
                const month = String(input.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                const day = String(input.getDate()).padStart(2, '0');


                dateValue = `${year}-${month}-${day}`;

            }


            selectedDateToNotChange = dateValue;

            // Update the date picker's value if it's not a direct input change (for clarity, not strictly necessary)
            document.getElementById('datepicker').value = dateValue;

            const activeNumberElement = document.querySelector('.number.active__Number');
            const number = activeNumberElement ? activeNumberElement.getAttribute('data-number') : '2';

            console.log("activeNumber")


            checkAvailabilityForDate(dateValue, number);
            initializeCalendarWithDate(dateValue, false);
            initializeCalendarWithDate(dateValue, true);

        }





        // Initialize for both desktop and mobile on page load
        document.addEventListener('DOMContentLoaded', function() {

            // Use stored date for initialization
            const now = new Date();
            const today = new Date(now.getTime() - (now.getTimezoneOffset() * 60000)).toISOString().split('T')[0];
            selectedDateToNotChange = today;

            // checkAvailabilityForDate(today, 2);
            initializeCalendarWithDate(today, false);
            initializeCalendarWithDate(today, true);





            // const date = new Date();
            // const today = date.toISOString().split('T')[0];
            // checkAvailabilityForDate(today, 2);
            // initializeCalendarWithDate(new Date(), false); // For desktop
            // initializeCalendarWithDate(new Date(), true); // For mobile

            //selevct Numbers

            // Add event listeners to all elements with class 'number'
            document.querySelectorAll('.number').forEach(function(element) {
                element.addEventListener('click', function() {
                    // Remove 'active__Number' class from all elements
                    document.querySelectorAll('.number').forEach(el => {
                        el.classList.remove('active__Number');
                    });

                    // Then, add 'active__Number' class to the clicked element
                    element.classList.add('active__Number');
                    // Retrieve the number from the data attribute
                    const number = this.getAttribute('data-number');
                    // Example function call (ensure this function is defined or replace it with your actual function)
                    checkAvailabilityForDate(selectedDateToNotChange, number);
                });
            });
            // Function to set default active number if no number is active
            function setDefaultActiveNumber() {
                const activeNumbers = document.querySelectorAll('.number.active__Number');
                // Check if there's already an active number
                if (activeNumbers.length === 0) {
                    const defaultNumber = document.querySelector('.number[data-number="2"]');
                    if (defaultNumber) {
                        defaultNumber.classList.add('active__Number');
                        // Assuming you want to trigger the same availability check as click
                        checkAvailabilityForDate(selectedDateToNotChange, '2');
                    }
                }
            }

            // Call the function to set default active number on page load
            setDefaultActiveNumber();




            // document.querySelectorAll('.number').forEach(function(element) {

            //     element.addEventListener('click', function() {
            //         document.querySelectorAll('.number').forEach(el => {
            //             el.classList.remove('active__Number');
            //         });

            //         // Then, add 'active' class to the clicked element
            //         element.classList.add('active__Number');

            //         const number = this.getAttribute('data-number');

            //         checkAvailabilityForDate(selectedDateToNotChange, number);

            //     });
            // });

        });
    </script>
    <style>
        .active__Number {
            background-color: #191919 !important;
            /* Change to red when active */
            border: 3px solid #950004 !important;
        }

        .dayContainer {
            background-color: #191919;
        }

        #datePicker {
            background-color: #191919;
            color: #fff;
            border: 1px solid #3a3a3a;
            border-radius: 4px;
            padding: 5px;
        }


        /* Base styles */
        .boxes-container {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */
            gap: 20px;
            /* Reduced gap for smaller boxes */
            margin-top: 8px;
        }

        .box {
            flex-basis: 45%;
            /* Smaller width for mobile - adjusts for 2 in a row with a bit more space */
            height: 150px;
            /* Adjusted height */
            background-color: #191919;
            border-radius: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            /* Center content vertically */
            justify-content: center;
            /* Center content horizontally */
            padding: 10px;
            /* Adjusted padding for smaller box */
            border: 2px solid transparent;
            /* Prepare for border color change on hover */
            transition: border-color 0.3s;/
        }


        .box:hover {
            border-color: #880611;
            /* Change border color to red on hover */
        }

        .box-content {
            color: #fff;
            text-align: center;
            /* Center text inside the box-content */
        }

        .time {
            display: block;
            margin-bottom: 6px;
        }

        /* Large screens (lg) */
        @media (min-width: 992px) {
            .box {
                flex-basis: 18%;
                /* Even smaller width for large screens to fit 5 in a row neatly */
            }
        }

        @media (min-width: 992px) {

            /* Adjust for your project's 'lg' breakpoint */
            .select__number_part {
                display: contents !important;
            }

            .select__number_bottom {
                display: none !important;
            }




        }

        @media (min-width: 768px) {



            /* scrollable div */



            .calendar__web {
                display: flex !important;
                margin-top: 8px;
            }

            .calendar__Mobile {
                display: none !important;
            }

        }

        @media (max-width: 765px) {

            .calendar__web {
                display: none !important;
            }

            .calendar__Mobile {
                display: flex !important;
                margin-top: 50px;
            }



        }

        @media (max-width: 547px) {
            .span__select {
                margin-bottom: 10px !important;
                display: block;
            }

            .red__bull_number {}

            .select__number_bottom {
                display: block !important;

            }

            .select__number_position {
                display: block !important;
                width: 100%;
            }

            .select__number_part {
                display: none !important;
            }
        }

        @media (min-width: 548px) and (max-width: 992px) {

            /* Adjust for your project's 'lg' breakpoint */
            .select__number_bottom {
                display: flex !important;

            }

            .select__number_position {
                display: flex !important;
                justify-content: space-between !important;
                width: 100%;
            }

            .select__number_part {
                display: none !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="banner-section" style="padding-left: 0px !important; padding-right: 0px !important;">
        <div class="banner-carousel owl-theme owl-carousel">
            <!-- Slide Item -->
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{ asset($datas->banner) }})"> </div>
                <div class="auto-container" style="max-width: 1500px;">
                    <div class="content-box" style="height: 500px !important;">
                        <div class="content" style="vertical-align: bottom !important;">
                            <h2 class="glitch">{{ $datas->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section storyline_mobile" style="background: #910613 ; padding-bottom: 100px;">
        <div class="top-pattern-layer"
            style="background: url({{ asset('assets/site/images/newImages/layers/pattern.png') }}); top: -72px;"></div>

        <div class="auto-container" style="padding-top: 50px !important;">
            <?php foreach ($storylines as $storyline) : ?>
            <div class="row">

                <div class="col-12 d-flex justify-content-center">
                    <div class="section-title title-style-three white-title" style="text-align: center;">
                        <h2>
                            <span style="color: #0f0f0f ;">Storyline</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="slide-item">
                        <div class="inner">
                            <div class="text">
                                <div style="text-align: center; font-size: 20px;">
                                    <?php echo $storyline['storyline_description']; // Ensure this content is safe to render directly
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="about-section rooms__box"
        style="background: #070711; padding-left: 20px; padding-right: 20px; padding-bottom:0px !important">
        <div class="top-pattern-layer"
            style="background: url({{ asset('assets/site/images/newImages/layers/pattern-black-up.webp') }});"></div>
        <div class="bottom-pattern-layer-dark-allblack rooms__bottom_box"
            style="background: url({{ asset('assets/site/images/newImages/layers/pattern-black-bottom.webp') }}); bottom: -56px;">
        </div>
        <div class="about-content">
            <div class="auto-container">
                <div class="row clearfix" style="margin-top: -30px;">
                    <div class="col-12" style="display: flex; justify-content: space-between;">
                        {{-- <div>
                            <div>
                                <h3>{{ $datas->title }}</h3> <span>
                                    With live Actor
                                </span>
                            </div>
                        </div> --}}
                        <!-- //people to play with -->
                        <div class="select__number_part d-sm-none d-md-none d-lg-none"
                            style="align-self: center; display: contents;"> <span style="color: #ffff;">Select number of
                                players:</span>

                            <div style="display: flex; gap: 25px;">
                                @php $personCount = explode('-', $datas->person);
                                    $personCount = end($personCount);
                                @endphp
                                @for ($i = 2; $i <= $personCount; $i++)
                                    <div style="width: 40px; height: 40px; background-color: #950004; color: #fff; border-radius: 50%; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                        class="number" data-number="{{ $i }}">{{ $i }}</div>
                                @endfor
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; gap: 8px; cursor: pointer;  justify-content: end;">
                                <h5 style="font-size: 25px;">2024 </h5> <i class="fa-solid fa-calendar-days"
                                    style="color: #ffff; font-size: 25px; " onclick="openCalendar()"></i>
                            </div>
                            <input name="date" type="text" id="datepicker" style="display: none;"
                                onchange="dateChanged(this)" />
                        </div>
                    </div>

                    <div class="col-12 mobil_play_date " style="margin: 0px !important">

                        <div class="featured-game-content game__content_item" style="position: static; margin-top: 30px;">
                            <div class="featured-game-meta" style="width: 100%; font-size: 20px; font-weight: 900;"> <i
                                    class="fas fa-clock"></i> <span style="font-weight: 300;">{{ $datas->duration }}</span>
                                &nbsp;
                                &nbsp; <i class="fas fa-hammer"></i> <span style="font-weight: 300;"> {{ $datas->level }}
                                </span> &nbsp;
                                &nbsp;<i class="fas fa-running"></i> <span style="font-weight: 300;">
                                    {{ $datas->person }}</span> </div>


                        </div>
                    </div>

                    <div class="col-12 d-lg-none d-xl-none d-sm-none d-md-none  select__number_bottom w-full mt-5">
                        <div class="w-full select__number_position" style="align-self: center;"> <span
                                class="span__select" style="color: #ffff;">Select number of
                                players:</span>
                            <div class="red__bull_number" style="display: flex; gap: 2px; justify-content:space-around">

                                @php $personCount = explode('-', $datas->person);
                                    $personCount = end($personCount);
                                @endphp
                                @for ($i = 2; $i <= $personCount; $i++)
                                    <div style="width: 30px; height: 30px; background-color: #950004; color: #fff; border-radius: 50%; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                        class="number" data-number="{{ $i }}">{{ $i }}</div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-lg-3 col-md-12 col-sm-12 web_play_date">
                                <div class="row "
                                    style="display: flex; flex-direction: row; justify-content: space-between; gap: 25px; height: 100%;">
                                    <div class="col-12">
                                        <div class="featured-game-item image_Item">
                                            <div class="featured-game-thumb"> <img src="{{ asset($datas->poster) }}"
                                                    alt="{{ $datas->title }}" style="border-radius: 10px;"> </div>
                                            <div class="featured-game-content game__content_item"
                                                style="position: static; margin-top: 30px;">
                                                <div class="featured-game-meta"
                                                    style="width: 100%; font-size: 20px; font-weight: 900;"> <i
                                                        class="fas fa-clock"></i> <span style="font-weight: 300;">
                                                        {{ $datas->duration }}</span> &nbsp;
                                                    &nbsp; <i class="fas fa-hammer"></i> <span style="font-weight: 300;">
                                                        {{ $datas->level }} </span> &nbsp;
                                                    &nbsp;<i class="fas fa-running"></i> <span style="font-weight: 300;">
                                                        {{ $datas->person }}</span> </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-9 col-sm-12 col-md-12 mt-md-5" style=" flex-direction: column;">

                                <div class="">

                                    <div class="mb-4 calendar__web"
                                        style="display: flex; justify-content: space-around; text-align: center; width:100%">
                                    </div>

                                    <!-- on mobile -->
                                    <div class="mb-4 calendar__Mobile"
                                        style="display: flex; justify-content: space-around; text-align: center; width:100%">
                                    </div>


                                </div>


                                <!-- new small box -->
                                <div class="boxes-container"> </div>
                            </div>

                            <div class="col-lg-3 col-md-12 col-sm-12 mobil_play_date ">
                                <div class="row "
                                    style="display: flex; flex-direction: row; justify-content: space-between; gap: 25px; height: 100%;">

                                    <div class="col-12" style="align-items: center; display: flex;">
                                        <h2
                                            style="color: #910613; font-weight: 800; font-size: 30px; text-align:center; width:100%">
                                            <span id="showPhotos" style="cursor: pointer;" class="glitch">PHOTO</span> /
                                            <span id="showVideos" style="cursor: pointer;" class="glitch"
                                                style="color: #fff;">VIDEO</span>
                                        </h2>
                                    </div>

                                    <div class="col-12">

                                        <div class="row" id="gallery" style="height: 100%;">
                                            @foreach ($photovideo as $item)
                                                <!-- Image Gallery Items -->
                                                @if ($item->photos_img)
                                                    <div class="col-6 gallery-item"
                                                        style="display: flex; align-items: end;">
                                                        <a href="{{ asset($item->photos_img) }}"
                                                            data-fancybox="gallery-a" data-caption="{{ $item->name }}">
                                                            <img src="{{ asset($item->photos_img) }}"
                                                                alt="{{ $item->name }}" class="img-fluid"
                                                                style="border-radius: 15px; cursor: pointer; margin-bottom: 10px; max-height:100%; object-fit: cover;">
                                                        </a>
                                                    </div>
                                                @endif

                                                <!-- Initially hidden Video Gallery Items -->
                                                @if ($item->videos_mp4)
                                                    <div class="col-6 video-item"
                                                        style="display: none; align-items: end;">
                                                        <a href="{{ asset($item->videos_mp4) }}"
                                                            data-fancybox="video-gallery"
                                                            data-caption="{{ $item->name }}">
                                                            <img src="{{ asset('assets/site/images/logoPart/favicon.png') }}"
                                                                alt="Video poster for {{ $item->name }}"
                                                                class="img-fluid"
                                                                style="border-radius: 15px; cursor: pointer; max-height:100px; width: 158px; margin-bottom: 10px;">
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>


                                    </div>



                                </div>
                            </div>


                        </div>


                        <div class="row web_play_date" style="margin-top: 120px">


                            <div style="width: 100%">
                                <div class="col-12" style="align-items: center; display: flex;">
                                    <h2
                                        style="color: #910613; font-weight: 800; font-size: 30px; width:100%; text-align:center">
                                        <span id="showPhotos" class="gallery-switch glitch" data-target="photos"
                                            style="cursor: pointer;">PHOTO</span> /
                                        <span id="showVideos" class="gallery-switch glitch" data-target="videos"
                                            style="cursor: pointer;">VIDEO</span>
                                    </h2>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="row" id="gallery" style="height: 100%;">
                                        @foreach ($photovideo as $item)
                                            <!-- Image Gallery Items -->
                                            @if ($item->photos_img)
                                                <div class="col-3 gallery-item gallery-photos"
                                                    style="display: flex; align-items: end;">
                                                    <a href="{{ asset($item->photos_img) }}" data-fancybox="gallery-a"
                                                        data-caption="{{ $item->name }}">
                                                        <img src="{{ asset($item->photos_img) }}"
                                                            alt="{{ $item->name }}" class="img-fluid"
                                                            style="border-radius: 15px; cursor: pointer; margin-bottom: 10px; height:100%; object-fit: cover;">
                                                    </a>
                                                </div>
                                            @endif
                                            <!-- Initially hidden Video Gallery Items -->
                                            @if ($item->videos_mp4)
                                                <div class="col-3 gallery-item gallery-videos"
                                                    style="display: none; align-items: end;">
                                                    <a href="{{ asset($item->videos_mp4) }}"
                                                        data-fancybox="video-gallery" data-caption="{{ $item->name }}">
                                                        <!-- Assuming a static placeholder or dynamic thumbnail for the video -->
                                                        <img src="{{ asset($item->photos_img) }}"
                                                            alt="Video poster for {{ $item->name }}" class="img-fluid"
                                                            style="border-radius: 15px; cursor: pointer; margin-bottom: 10px; height:100%; object-fit: cover;">
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq-section" style=" padding-top:0px !important; padding-bottom: 100px !important;  ">
        <!-- bottom for pattern -->
        <div class="bottom-pattern-layer-dark-allblack"
            style="background: url({{ asset('assets/site/images/newImages/layers/pattern-black-bottom.webp') }}); bottom: -73px;">
        </div>
        <div class="featured-game-bg">
            <video autoplay loop muted playsinline style="height: 100%;">
                <source src="{{ asset('assets/site/images/newVideo/escape/4.mp4') }}" type="video/mp4"> Your browser does
                not support the video tag.
            </video>
        </div>


        <div class="container">
            <div class="sec-title centered">
                <div class="reviews-section reviews_box" style="background: none;">
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title title-style-three white-title" style="">
                                    <h2 style="text-align: center; width:100%">
                                        <span>TESTIMONIALS</span>
                                    </h2>
                                    <p style="font-size: 20px; text-align: center;"> Your Comments are important to us </p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-slider carousel-outer clearfix" style="margin-bottom: 75px;">


                            <div class="thumb-carousel-box">
                                <ul class="thumb-carousel owl-carousel owl-theme">

                                    @foreach ($comments as $comment)
                                        <li class="thumb">
                                            <img src="{{ asset($comment->person_image) }}"
                                                alt="Thumbnail for {{ $comment->person_name }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="text-carousel owl-carousel owl-theme">
                                @foreach ($comments as $comment)
                                    <div class="slide-item">
                                        <div class="inner">
                                            <div class="text" style="color: #fff;">{{ $comment->person_comment }}</div>
                                            <div class="info clearfix">
                                                <span class="name">{{ $comment->person_name }}</span> &ensp;-&ensp;
                                                <span
                                                    class="date">{{ \Carbon\Carbon::parse($comment->comment_date)->format('d M, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auto-container faq__container" style="margin-bottom: 50px; margin-top: 0px;">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="section-title title-style-three white-title" style="text-align: center;">
                                <h2 style="color: #910611;" class="glitch">FAQ
                                    <span></span>
                                </h2>
                                <p style="color: #cccccc; font-size: 20px;"> Answers to Common Questions... </p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-container">
                        <div class="accordion-box">
                            @foreach ($datas->faqs as $k => $v)
                                <div @class([
                                    'accordion',
                                    'fadeInUp',
                                    'block',
                                    'current' => $loop->first,
                                    'wow',
                                ]) data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div @class(['acc-btn', 'active' => $loop->first])> {{ $v->question }}
                                        <div class="icon flaticon-cross"></div>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text" style="color: #ffff;"> {{ $v->answer }} </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                <p style="text-align: center; font-size: 20px; color: #910613;"> <strong
                                        style="color: #cbcbcb;">Black
                                        Out escape rooms are a
                                        unique and fun way to
                                        engage</strong> with your colleagues and test how well your team works together.
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
        $(function() {


            var selectedDate;

            $(document).ready(function() {
                $('#showPhotos').click(function() {
                    $('.video-item').hide();
                    $('.gallery-item').show();
                });

                $('#showVideos').click(function() {
                    $('.gallery-item').hide();
                    $('.video-item').show();
                });
            });


            $(document).ready(function() {
                $('.gallery-switch').click(function() {
                    const target = $(this).data('target');

                    // Hide all gallery items
                    $('.gallery-item').hide();

                    // Show gallery items based on the selected target
                    $(`.gallery-${target}`).show();
                });
            });


            flatpickr("#datepicker", {
                enableTime: false,
                altFormat: "Y-m-d",
                dateFormat: "Y-m-d",
                minDate: "today",
                defaultDate: "today",
                // locale: "ar",
                onChange: function(selectedDates, dateStr, instance) {
                    $(".selectedDate").attr('data-date', dateStr);
                },
            });


            //Fancybox.bind('#gallery a', {groupAll: true,});


            /*
            $(document).on('click', '.selectedDate', function () {

                var datas = $(this).data();
                var formData = new FormData();
                formData.append('players', datas.player);
                formData.append('place_id', datas.place);
                formData.append('room_id', datas.room);
                formData.append('hour_id',datas.hour);
                formData.append('reservation_date', datas.date);
                formData.append('_token', "{{ @csrf_token() }}");
                for (var item of formData.entries()) console.log(item[0] + " => " + item[1]);

                $.ajax({
                    url: "{{ route('rooms.reservation') }}",
                    type: 'POST',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: (result) => {
                        location.href = "{{ route('rooms.form') }}";
                    },
                    error: function (request, status, error) {
                        console.log(JSON.stringify(request));
                    }
                });
            });
            */

        });


        function checkAvailabilityForDate(date, number) {

            var room_id = `{{ $datas->id }}`;


            $.ajax({
                url: '/check-availability/' + room_id,
                type: 'GET',
                data: {
                    date: date
                },
                success: function(response) {
                    updateAvailableTimes(date, response.availableHours, response.availablePrices, number);
                },
                error: function(error) {
                    console.error('Bir hata oluştu:', error);
                }
            });
        }


        function updateAvailableTimes(date, availableHours, availablePrices, number) {

            const boxesContainer = document.querySelector('.boxes-container');
            boxesContainer.innerHTML = '';

            const booking = {};

            availablePrices.forEach(price => {
                const player = parseInt(price.player); // Convert player to integer
                availableHours.forEach(hour => {
                    if (hour.room_id === price.room_id && hour.place_id === price.place_id) {
                        const time = `${hour.start} ${hour.start_period}-${hour.end} ${hour.end_period}`;
                        const hourId = hour.id;
                        const priceId = price.id;
                        const priceValue = price.price;
                        if (!booking[player]) {
                            booking[player] = [];
                        }
                        booking[player].push({
                            time: time,
                            priceId: priceId,
                            hourId: hourId,
                            price: priceValue,
                        });
                    }
                });
            });

            const dataArray = booking[number];




            const today = new Date();
            const chosenDateTime = new Date(date + "T00:00:00");



            function timeHasPassed(timeString) {

                let [startTime] = timeString.split('-').map(s => s.trim())[0].split(' ');
                if (!startTime.includes(':')) {
                    startTime = startTime.padStart(2, '0') + ":00";
                }

                const [startHours, startMinutes] = startTime.split(':').map(Number);

                const currentDate = new Date();

                const startTimeDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(),
                    startHours, startMinutes);


                return currentDate > startTimeDate;
            }


            // function sortTimes(a, b) {
            //     const get24HourTime = (time) => {

            //         let [timePart, period] = time.split(' ');
            //         let [hours, minutes] = timePart.split(':').map(num => parseInt(num, 10));
            //         if (period === 'PM' && hours < 12) hours += 12;
            //         if (period === 'AM' && hours === 12) hours = 0;
            //         return hours * 60 + minutes; //
            //     };


            //     const aStart = get24HourTime(a.time.split('-')[0]);
            //     const bStart = get24HourTime(b.time.split('-')[0]);

            //     return aStart - bStart;
            // }


            function sortTimes(a, b) {
                const get24HourTime = (time) => {
                    let [timePart, period] = time.split(' ');
                    let [hours, minutes] = timePart.split(':').map(num => parseInt(num, 10));

                    // Convert 12AM to 00 hours and 12PM to 12 hours, adjust PM times to 24-hour format
                    if (period === 'PM' && hours < 12) hours += 12;
                    if (period === 'AM' && hours === 12) hours = 0;

                    // Adjust hours for events marked as today's event but are actually for the next day
                    if (hours < 2) hours += 24;

                    return hours * 60 + minutes; // Convert time to minutes for comparison
                };

                // Extract and convert start times to 24-hour format in minutes
                const aStart = get24HourTime(a.time.split('-')[0]);
                const bStart = get24HourTime(b.time.split('-')[0]);

                return aStart - bStart; // Sort based on start time
            }





            var roomId = "{{ $id }}";

            const isToday = chosenDateTime.toDateString() === today.toDateString();


            // const filteredAndSortedData = dataArray
            //     .filter(data => !isToday || !timeHasPassed(data.time))
            //     .sort(sortTimes);
            // const filteredAndSortedData = dataArray.filter(data => !isToday || !timeHasPassed(data.time)).sort(sortTimes);



            const filteredAndSortedData = dataArray.filter(data => {

                const [startTime, ] = data.time.split('-');
                const [hours, ] = startTime.split(':').map(num => parseInt(num, 10));

                const isTodayEvent = chosenDateTime.toDateString() === today.toDateString();

                // For today's events, check if it's within the "00:", "01:", or "02:" hours.
                if (isTodayEvent) {
                    const isEarlyHoursEvent = hours < 3; // Checks for "00:", "01:", and "02:"
                    // Check if the time for the event has passed, considering it's an early hours event for today
                    return isEarlyHoursEvent || !timeHasPassed(data.time);
                } else {
                    // For future events, include them without checking the time
                    return chosenDateTime >= today;
                }
            }).sort(sortTimes);

            filteredAndSortedData.forEach(data => {

                const baseUrl = `{{ route('reservations.abudhabi.reservation', ['room_id' => $id]) }}`;

                const dynamicUrlPart =
                    `?date=${encodeURIComponent(date)}&time=${encodeURIComponent(data.time)}&player=${encodeURIComponent(number)}&price=${encodeURIComponent(data.price)}&price_id=${data.priceId}&hour_id=${data.hourId}`;

                // Combine the base URL with the dynamic parameters.
                const fullUrl = baseUrl + dynamicUrlPart;

                const boxHTML = `
    <div class="box">
        <a href="${fullUrl}">
            <div class="box-content">
                <span class="time" data-hour="${data.hour_id}">${data.time}</span>
                <div style="display: grid; color: #99999c;">
                    <span class="price">${data.price} AED</span>
                    <span>per person</span>
                </div>
            </div>
        </a>
    </div>`;

                boxesContainer.insertAdjacentHTML('beforeend', boxHTML);


            });


        }
    </script>
@endsection
