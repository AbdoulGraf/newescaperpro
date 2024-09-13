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
style="background: #07070f; padding-bottom: 50px !important; padding-top:230px;">

<div class="top-pattern-layer"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>

<!-- bottom for pattern -->

<div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-bottom.webp')}}); bottom: -72px;"></div>

<div class="row" style="position: relative;
    display: block;
    margin-bottom: 20px;
    background-image: linear-gradient(to left, transparent, #880611 20%, #880611 80%, transparent);
    background-repeat: no-repeat;
    background-position: bottom;
    background-size: 100% 2px; padding-top: 48px;">

    <div class="col-12"
        style="text-align: center; margin-bottom: 10px; ">

        <h1
            style="color: #ffff; padding-bottom: 20px;" class="glitch">
            FRANCHISE </h1>

    </div>

</div>

<div class="sidebar-page-container mt-5"
    style="position: relative;

margin: 0 auto; padding: 0px 0px 0px;">

    <div class="container">
        <div class="row">
            <div
                class="col-lg-6 col-md-12 col-sm-12 mobile__franchie__padding">

                <div class="row">
                    <div class="col-12">
                        <h5> Corporate Cooperation </h5>
                    </div>

                </div>

                <h1
                    style="font-size: 30px ;  color: #910613  ;">
                    Reach out to us for business inquiries!
                </h1>
                <p>
                    Looking for team spirit building activities or event hostings? Investing in the entertainment business or looking for a very specific experience? As Cave Entertainment we are always open to business inquires; our professional team is always ready to sail to the new seas.
                </p>

              
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">

                <div class="contact-form__part">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                    <form action="{{ route('abudhabi.franchise.store') }}" method="POST">
                        @csrf
                    
                        <div class="form-container formbold-mb-5 formbold-pt-3" style="width: 100%;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="field-group formbold-mb-5 mb-2">
                                                <label for="firstName" class="formbold-form-label">First Name</label>
                                                <input type="text" name="first_name" id="firstName" placeholder="First Name" class="formbold-form-input" required>
                                            </div>
                                        </div>
                    
                                        <div class="col-6">
                                            <div class="field-group formbold-mb-5 mb-2">
                                                <label for="lastName" class="formbold-form-label">Last Name</label>
                                                <input type="text" name="last_name" id="lastName" placeholder="Last Name" class="formbold-form-input" required>
                                            </div>
                                        </div>
                    
                                        <div class="col-6">
                                            <div class="field-group formbold-mb-5 mb-2">
                                                <label for="phoneNumber" class="formbold-form-label">Phone Number</label>
                                                <input type="text" name="phone" id="phoneNumber" placeholder="Phone" class="formbold-form-input" required>
                                            </div>
                                        </div>
                    
                                        <div class="col-6">
                                            <div class="field-group formbold-mb-5 mb-2">
                                                <label for="franchiseRequest" class="formbold-form-label">Request Franchise</label>
                                                <input type="text" name="franchise_subject" id="franchiseRequest" placeholder="Request Franchise" class="formbold-form-input" required>
                                            </div>
                                        </div>
                    
                                        <div class="col-12">
                                            <div class="field-group formbold-mb-5 mb-2">
                                                <label for="message" class="formbold-form-label">Write Message</label>
                                                <textarea name="message" id="message" cols="30" rows="10" class="formbold-form-input" placeholder="Write Message" required></textarea>
                                            </div>
                                        </div>
                    
                                        <div class="col-12 mt-4">
                                            <h5>Terms</h5>
                                            <div class="checkbox-container mb-4">
                                                <label for="terms" class="checkbox-label">
                                                    <input type="checkbox" name="terms" id="terms" value="agree" required>
                                                    I Have Read and approved all terms
                                                </label>
                                                <a href="{{route('abudhabi.terms')}}" target="_blank" class="redirect-icon">
                                                    <i class="fa-solid fa-share-from-square"></i>
                                                </a>
                                            </div>
                                        </div>
                    
                                        <div class="col-12">
                                            <button type="submit" class="formbold-btn" style="padding-top: 10px; padding-bottom: 10px; background: #910613;">REQUEST FRANCHISE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    

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

    </script>
@endsection



