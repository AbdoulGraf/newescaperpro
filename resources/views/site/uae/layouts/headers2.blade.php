<header class="main-header header-style-two mobile__main__header__back">
    <div class="header-container">

        <div class="header-top mobile__top__header">
            <div class="auto-container" style="max-width:1600px">
                <div class="inner clearfix">
                    <div class="top-left"
                        style="visibility: hidden;">

                        <div class="top-text">Black-Out</div>

                    </div>


                    <div class="top-right">
                        <ul class="info clearfix">
                            <li>
                                <img
                                    src="{{asset('assets/site/images/logoPart/phone-icon.webp')}}"
                                    alt style="max-width: 29px;">
                                <a href="tel:+9710521111041">+971 052 111 1041</a></li>
                            <li>
                                <img
                                    src="{{asset('assets/site/images/logoPart/mail_icon.webp')}}"
                                    alt style="max-width: 29px;">
                                &nbsp;
                                <a
                                    href="mailto:info.dxb@black-out.ae">info.dxb@black-out.ae</a></li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>

        <div class="header-upper">
            <div class="auto-container" style="max-width:1600px">
                <div class="inner-container clearfix">

                    <div class="logo-box mobile__logo__move">
                        <div class="logo"><a href="{{route('homepage.index')}}"
                                title="Black-out Rooms in Dubai | Black-Out"><img
                                    src="{{asset('assets/site/images/newImages/newImage1.webp')}}"
                                    alt="Black-out Rooms in Dubai | Black-Out"
                                    title="Black-out Rooms in Dubai | Black-Out"
                                    style="max-width: 250px; margin-top: 10px;"></a></div>
                    </div>



                    <div class="nav-outer clearfix">

                        <div class="mobile-nav-toggler"
                            style="color: #ffff;"><span
                                class="icon flaticon-menu-2"></span></div>

                        <nav
                            class="main-menu navbar-expand-md navbar-light">

                            <div
                                class="collapse navbar-collapse show clearfix"
                                id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="current "><a
                                            href="{{route('homepage.index')}}">HOME</a>

                                    </li>



                                    <li class="dropdown"><a
                                            href="#">CORPORATE</a>
                                        <ul>
                                            <li><a
                                                    href="{{route('dubai.faq')}}">Faq</a></li>
                                            <li><a
                                                    href="{{route('dubai.terms')}}">Terms
                                                    &
                                                    Conditions</a></li>

                                            <li><a
                                                    href="{{route('dubai.disclaimer')}}">
                                                    Disclaimers &
                                                    Liability</a></li>

                                            <li><a
                                                    href="{{route('dubai.privacy')}}">
                                                    Privacy
                                                    Policy</a></li>

                                            <li><a
                                                    href="{{route('dubai.teambuilding')}}">
                                                    Team
                                                    Building</a></li>
                                        </ul>
                                    </li>

                                    <li><a
                                            href="{{route('requestvideo.dubai')}}">REQUEST
                                            VIDEO</a></li>

                                    <li><a
                                            href="{{route('dubai.franchise')}}">FRANCHISE</a></li>

                                    <li class><a
                                            href="{{route('dubai.blog')}}">BLOG</a>

                                    </li>
                                    <li><a
                                            href="{{route('dubai.contact')}}">CONTACT</a></li>


                                            <li class="redButtonNav glitch">

                                                <a
                                                    href="{{route('rooms.dubai')}}"
                                                    class="theme-btn btn-style-one"
                                                    style><span
                                                        class="btn-title"
                                                        style="background: #ffff; padding: 5px 20px; color:#910613; font-weight:700">
                                                        Book Now</span></a>

                                            </li>

                                            <li class="redButtonNav">

                                                <a
                                                    href="{{route('homeabudhabi.index')}}"
                                                    class="theme-btn btn-style-one"
                                                    style><span
                                                        class="btn-title"
                                                        style="background: #910613; padding: 5px 20px;">
                                                        Abudhabi</span></a>

                                            </li>

                                </ul>
                            </div>
                        </nav>

                        <ul class="social-links clearfix" style="display: flex; align-items: center;">
                            @foreach($socialMedia as $media)
                                <li>
                                    <a href="@if($media->platform == 'whatsap') https://wa.me/{{$media->username}}
                                        @elseif($media->platform == 'snapchat') https://www.{{$media->platform}}.com/add/{{$media->username}}
                                        @elseif($media->platform == 'youtube') https://www.{{$media->platform}}.com/channel/{{$media->username}}
                                        @else https://www.{{$media->platform}}.com/{{$media->username}} @endif" target="_blank">
                                        @switch($media->platform)
                                            @case('twitter')
                                                <span class="fab fa-twitter"></span>
                                                @break
                                            @case('facebook')
                                                <span class="fab fa-facebook-square"></span>
                                                @break
                                            @case('linkedin')
                                                <span class="fab fa-linkedin-in"></span>
                                                @break
                                            @case('pinterest')
                                                <span class="fab fa-pinterest-p"></span>
                                                @break
                                            @case('youtube')
                                                <span class="fab fa-youtube"></span>
                                                @break
                                            @case('tiktok')
                                                <span class="fab fa-tiktok"></span>
                                                @break
                                            @case('snapchat')
                                                <span class="fab fa-snapchat-ghost"></span>
                                                @break
                                            @case('whatsap')
                                                <span class="fab fa-whatsapp"></span>
                                                @break
                                            @case('instagram')
                                                <span class="fab fa-instagram"></span>
                                                @break
                                            @default
                                                {{-- Optionally handle unknown platform with a default or no icon --}}
                                        @endswitch
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="sticky-header">
        <div class="auto-container clearfix">

            <div
                style="display: flex; justify-content: space-between; align-items: center;">

                <div class="logo pull-left">
                    <a href="{{route('homepage.index')}}" title><img
                        src="{{asset('assets/site/images/newImages/newImage1.webp')}}"
                            alt="Black-out Rooms in Dubai | Black-Out"
                            style="max-width: 250px; margin-top: 10px;"
                            title></a>
                </div>

                <div class="pull-right">

                    <nav class="main-menu clearfix">

                    </nav>
                </div>

            </div>

        </div>
    </div>

    <div class="mobile-menu">

        <div class="menu-backdrop"></div>
        <div class="close-btn"><span
                class="icon flaticon-cancel"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="{{route('homepage.index')}}"><img
                src="{{asset('assets/site/images/newImages/newImage1.webp')}}" alt="Black-out Rooms in Dubai | Black-Out"
                        title></a></div>
            <div
                class="menu-outer"></div>


                <div class="link-box"
                style="padding: 30px 25px 0px 25px; display: flex; gap: 10px;">
                <a href="{{route('rooms.dubai')}}"
                    class="theme-btn btn-style-one glitch"
                    style="padding: 0px 0px !important;"><span
                        class="btn-title"
                        style="background: #ffff; color:#910613; padding: 9px 20px;">
                        Book Now </span></a>

            </div>

            <div class="link-box"
                style="padding: 30px 25px 0px 25px; display: flex; gap: 10px;">
                <a href="{{route('homeabudhabi.index')}}"
                class="theme-btn btn-style-one"
                style="padding: 0px 0px !important;"><span
                    class="btn-title"
                    style="background: #910613; padding: 9px 20px;">
                    Abudhabi</span></a>
            <p style="font-size: 14px;"> Explore Abudhabi
                Rooms.</p>

            </div>

            <div class="social-links" style>
                <ul class="social-links clearfix" style="display: flex; align-items: center;">
                    @foreach($socialMedia as $media)
                        <li>
                            <a href="@if($media->platform == 'whatsap') https://wa.me/{{$media->username}}
                                @elseif($media->platform == 'snapchat') https://www.{{$media->platform}}.com/add/{{$media->username}}
                                @elseif($media->platform == 'youtube') https://www.{{$media->platform}}.com/channel/{{$media->username}}
                                @else https://www.{{$media->platform}}.com/{{$media->username}} @endif" target="_blank">
                                @switch($media->platform)
                                    @case('twitter')
                                        <span class="fab fa-twitter"></span>
                                        @break
                                    @case('facebook')
                                        <span class="fab fa-facebook-square"></span>
                                        @break
                                    @case('linkedin')
                                        <span class="fab fa-linkedin-in"></span>
                                        @break
                                    @case('pinterest')
                                        <span class="fab fa-pinterest-p"></span>
                                        @break
                                    @case('youtube')
                                        <span class="fab fa-youtube"></span>
                                        @break
                                    @case('tiktok')
                                        <span class="fab fa-tiktok"></span>
                                        @break
                                    @case('snapchat')
                                        <span class="fab fa-snapchat-ghost"></span>
                                        @break
                                    @case('whatsap')
                                        <span class="fab fa-whatsapp"></span>
                                        @break
                                    @case('instagram')
                                        <span class="fab fa-instagram"></span>
                                        @break
                                    @default
                                        {{-- Optionally handle unknown platform with a default or no icon --}}
                                @endswitch
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </nav>
    </div>

</header>
