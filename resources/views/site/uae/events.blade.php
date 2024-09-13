@extends('site.uae.master')
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
            pointer-events: none;
            /* Prevent clicking */
        }

        .custom-icon_time {
            position: absolute;
            right: 10px;
            top: 50%;
            /* transform: translateY(-50%); */
            pointer-events: none;
            width: 36px;
            /* Adjust icon size */
            height: 36px;
            z-index: 2;
        }
    </style>
@endsection

@section('content')
    <section class="featured-game-area price_list position-relative  pt-115 pb-90 bg-dark">
        <div class="container" style="max-width: 100%;">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title title-style-three text-center mb-70">
                        <h2 class="mb-3"> <span>
                                EVENTS
                            </span>
                        </h2>
                        <!-- <p> THE MOST SCARY ROOMS WITH LIVE ACTORS!</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section" style="z-index: 1;">
        <div class="bottom-pattern-layer-dark"></div>

        <div class="about-content price_list_content"
            style="background-image: url('{{ asset('assets/site/images/about/aboutbackground.webp') }}');">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Text Column-->
                    <div class="text-column col-lg-6 col-md-12 col-sm-12" style="padding: 0px 60px 60px 60px;">
                        <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">

                            <div class="sec-title">
                                <h2> CORPORATE

                                    <span>EVENTS</span>
                                </h2>
                            </div>

                            <div class="text price_text">

                                <p>Happy and relaxed work place requires
                                    a strong core team. So how would you
                                    strenghten your team? Of course with
                                    a game that requires team effort.
                                    And If you add a little bit of spice
                                    like excitement, puzzles and some
                                    horror… It gives you the solution;
                                    Escape House!

                                </p>

                                <p>
                                    At Escape House not only your team
                                    will be winning but also your
                                    company will be winning; because It
                                    forces your team to shine up their
                                    skills in a teamwork
                                </p>

                            </div>

                            <div class="sec-title">
                                <h2> BIRTHDAY

                                    <span>PARTY</span>
                                </h2>
                            </div>
                            <div class="text price_text">

                                <p>
                                    Have a unforgettable and unique
                                    experience for your day, yes we are
                                    talking about THE BIRTH DAYS! Not
                                    only for you but your friend group
                                    also! Have memorable and haunting
                                    memories with your friends!

                                </p>

                                <p>
                                    At Escape House your birthday party
                                    won’t be like the any others, give
                                    us name and date and let us sort out
                                    what is left!
                                </p>

                            </div>

                        </div>
                    </div>
                    <!--Image Column-->
                    <div class="price_list_image image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box"><img src="{{ asset('assets/site/images/uae/event.webp') }}" alt title>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="inner-about-area blog_home_banner fix ghost_on_top_form">

        <div class="inner-about-shape  blog_about_inner_shape">

            <img src="{{ asset('assets/site/images/blog/blog_to.webp') }}" alt>

        </div>
    </section>

    <!-- vr house end -->

    <!-- blog section part -->

    <section class="form-section_franchise d-flex align-items-center justify-content-center ghost_form_onbottom"
        style="background-image: url('{{ asset('assets/site/images/about/aboutbackground.webp') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
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
                            <div class="form-group col-md-6">
                                <label>Choose Your Event</label>
                                <div class="radio-btns">
                                    <div class="radio-btn" id="birthday-btn" onclick="toggleSVG('birthdayEvent')">
                                        <input type="radio" id="birthdayEvent" name="event" value="birthday">

                                        <svg id="birthdaySVG" width="23" height="23" viewBox="0 0 23 23"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.5" cy="11.5" r="5.75" fill="#D9D9D9" />
                                            <circle cx="11.5" cy="11.5" r="10.7812" stroke="#D9D9D9"
                                                stroke-width="1.4375" />
                                        </svg>

                                        <label for="birthdayEvent"
                                            style="color: rgba(108, 108, 108, 1); font-weight: 100; margin-bottom: 0 !important;">Birthday
                                            Event</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="requestFranchise" style="visibility: hidden;">Request
                                    Franchise</label>
                                <div class="radio-btn active" id="corporate-btn" onclick="toggleSVG('corporateEvent')">
                                    <input type="radio" id="corporateEvent" name="event" value="corporate" checked>

                                    <svg id="corporateSVG" width="23" height="23" viewBox="0 0 23 23"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.5" cy="11.5" r="10.7812" fill="#D9D9D9"
                                            stroke="#D9D9D9" stroke-width="1.4375" />
                                        <circle cx="11.5" cy="11.5" r="4.5" fill="#C10B13" />
                                    </svg>

                                    <label for="corporateEvent"
                                        style="color: rgba(108, 108, 108, 1); font-weight: 100; margin-bottom: 0 !important;">Corporate
                                        Event</label>
                                </div>
                            </div>
                        </div>

                        <!-- choose date and time -->
                        <div class="form-row time-date">
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date">

                                <svg class="calendar-icon" width="36" height="36" viewBox="0 0 36 36"
                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="36" height="36" fill="url(#pattern0_78_5327)" />
                                    <defs>
                                        <pattern id="pattern0_78_5327" patternContentUnits="objectBoundingBox"
                                            width="1" height="1">
                                            <use xlink:href="#image0_78_5327" transform="scale(0.0111111)" />
                                        </pattern>
                                        <image id="image0_78_5327" width="90" height="90"
                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACBElEQVR4nO2cu07DQBBFtwI+gde/pYyUuQ6ugC5/x6MCPgWFJlWQhRsiClx4Z2Z9jjRNNHK0h2Gs3GJLAQAAAAAAAACAslqtLszszsxezexL0rHFsp+zvUjadl13XvVP33XdraQPbwmqL/19OHu1SV6iZP2WPf9kD+vC+7Dyl93VEP3qfVD5i36eXbSkvfdB5V/7GqL//PLSKPI6L6KF6DlgoiuB6EoguhKIrgSiK4HoSiC6EoiuBKKXKnppVRAtRCvAJDLR8pfH6pC/WHa0EO0+dWKi5S6K1SF/iU3taDM7SLo3s+uxHsbPUvRnEv1w+uzhsyz9JYvovu+vTp+92Wwus/SXRBN9ffrs9Xp9k6W/ZF4dkh6z9JdEog/jC+ffL6tI/WlEK3khWog+ek8hEy1/cawO+UtlR2uBoqNlEdZq1hEti7BWs45oWUTfatYRLYuwVrOOaFmEtZp1RMsijKxDTZTbRC+tCqKFaAWYRCZa/vJYHfIXG2ZHR8sibGJ/JtGhsgib2J9GdLQsop/Yn0Z0tCzCJvZnEh0qi7CJ/ZlEh8oibGJ/GtFLq4JoIVoBJjHTRC/+OjYz+5xdNBcMqtoFg1vvf1v5l2YXPVyAOlyEGuCwR6d62+12Z7OLHmXfLlT22/Drsorkk8nuhn3V+AtyL+lpWBfVJhkAAAAAAAAAoMTmGxexJteFIZ1qAAAAAElFTkSuQmCC" />
                                    </defs>
                                </svg>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" id="time">

                                <svg class="custom-icon_time" width="36" height="36" viewBox="0 0 36 36"
                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="36" height="36" fill="url(#pattern0_78_5332)" />
                                    <defs>
                                        <pattern id="pattern0_78_5332" patternContentUnits="objectBoundingBox"
                                            width="1" height="1">
                                            <use xlink:href="#image0_78_5332" transform="scale(0.0111111)" />
                                        </pattern>
                                        <image id="image0_78_5332" width="90" height="90"
                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEoklEQVR4nO2dS4tcRRTHC3xFIrr1BSLBLxB1pUERzVZdtIKvVqM9TP3/1TNtO7js7IyuwoBfI4m6iOgHECQa42zcRDc+0IzOuDKBSUoOXYPQdIdhph7n3ls/ODB0T3fV+VNdt+rcU+caU6lUKpVKpVKpVCqVvdHr9W5ZXl5+nOQJAB+TPEfyB5KXSf4N4JqY/B1ek/fOAfgofOYx+Y49NtctnHMPAlgl+TmAf0j6A9o2gM8ArCwtLT1gusxoNLrTWvs6gK8AXI8g7iLbIfklydf6/f4h0xWstXfJSCP5a0Jx5xqAPwGcHAwG95i2MhgMbiO5BuCv3ALPEVz6MJY+mTZB8hiAjdICzxH8R5LPmqYjcyKAT0jeiCDKVRmF1tp7xQC8H147qODSt3Xn3B2miQyHw0cAfBdxBI5n25CpKOLovuCcO2KahPwcIy3T/K7JKJ5tZ3V19b7I08k2yWdMEwDwIsl/Y8+nZgGx2wmboZeNZgAMUq2JzQJStBV8eNdohOQLYXPgmy40g9jW2peMJmRei7QC8FqEDmJfc84dN4pWF1EvfFQidLDt4qsRWXuS/DaDs35RH3K0HZZ+5dbZYTPi2y40p7aeV93/HTwWY8fH5gh9wzn3VFaRJ5PJrSQvZXTSKxBappCNrIGomFtfNkjoYKNs8WSSmx0WelM0SC40gA8KOOcVCT03wJUi7PlbFZq/y624ZEKTfKPQCPI36VOR/gB4JZnQciO1Cs1dsc8nEVlu26cMGrF5I/p6klSGkHdRxCkqFDoYowstyS1VaM4KfSaqyJJiBWCrCs3Z6WMravpZyIUr+RP1i/pWul/D4fDRaEIDeKe0Q0ap0ADeiim0ZHVWoTlX6A+jCU3y0yo0018Qc4dE2aCpg+TFaEID+Hm/6VsmMSw/R/8U05lNVdEtRUKTvGJiEbJ39tx4jpGsRWj59ZpSQktOnMkE2yT0PqaOtWiNd2zq2M/FcC3HyGbLLobFl3fUaxdbtWGhXjvTqi04lVrsLfiJ0g5Rr73ZqjAplRqAo60K/FOhRQ/8C3K2urRj1Gdxb2UFoVcUOOY1GQCkEPr+kukG1Gc7yWI6oUpAaQe9EkuTQCNI2QcFDnoNljQlTJIcS5R/oD5Lm+RYKgmdygzAeyY14/H4sIQGSzvLcpYnEV2QW1UdHs0rJudhIQDfd1DkjexVa6y1T+Y8/sbylv/42y5yyFGBAD6TnTalkGO7cnxXgQg+sX0zmUxuLyZ0EPtIqNzi22iYRi0fNhoA8HSKqjMsL7KU53zOaMJa+3ybgk6YVqHpGY1IeZzE5S99JtuRnHCjmVDyp7HTCICr6kr83Kz0TxMvkAC25HpjmoS19iEAXzdI5AvFS/ocsBTQuvIdpPTtdPF1csTt+iUFos6a9OkJ0yYm06o1IyUh1isShZM+mbYyHo8PhzvqvxQQ+A8p1O2cu9t0hX6/f8g59yrJLxJvdOS7z8s9vk6Vnp9HqJpLAGfD0ygOKq483eKs5F3kPObRKHrT9LOjzrm3SZ6SbCDJQZZHgUjJ+N3Hg4Ty8ZfDe/I/p+QUq3y2Ph6kUqlUKpVKpVKpVMze+Q9Zqs9NFP1MoAAAAABJRU5ErkJggg==" />
                                    </defs>
                                </svg>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="writeMessage"> Type Your
                                    Request</label>
                                <textarea class="form-control" id="writeMessage" placeholder="Type Your Request" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="form-row mt-3 mb-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-danger"
                                    style=" border-radius: 10px; text-transform: uppercase; font-weight: 700;">
                                    SUBMIT</button>
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
