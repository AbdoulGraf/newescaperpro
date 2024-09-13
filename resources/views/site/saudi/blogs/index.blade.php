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
style="background: #07070f; padding-bottom: 0px !important;  padding-top:230px;">

<div class="top-pattern-layer"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-up.webp')}});"></div>

<!-- bottom for pattern -->

<div class="bottom-pattern-layer-dark-allblack"
    style="background: url({{asset('assets/site/images/newImages/layers/pattern-black-bottom.webp')}}); bottom: -122px;"></div>

<div class="auto-container" style="margin-bottom: 50px;">

    <!-- <div class="sec-title centered"><h2 style="color: #ffff;">FAQ</h2>
      <p> Your Comments are important to us</p>
      <span class="bottom-curve"></span></div> -->

    <div class="row">

        <div class="col-12">

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
                        style="color: #ffff; padding-bottom: 20px;"  class="glitch" >
                        BLOG </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Blog Detail-->
               <!-- Content Side / Blog Detail -->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                @foreach ($blogs as $blog)
                <div class="blog-default">
                    <div class="news-block-two wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <!-- Blog Image -->
                            <div class="image-box">
                                @if($blog->blog_img)
                                <figure class="image">
                                    <a href="{{ route('abudhabi.blog.blogdetails', ['id' => $blog->id, 'title' => Str::slug($blog->title)]) }}">
                                        <img src="{{ Storage::url($blog->blog_img) }}" alt="{{ $blog->title }}" />
                                    </a>
                                </figure>
                                @endif
                                <div class="post-date">{{ $blog->created_at->format('d M Y') }}</div>
                            </div>
                            <!-- Blog Content -->
                            <div class="lower-content">
                                <h3><a href="{{ route('abudhabi.blog.blogdetails', ['id' => $blog->id, 'title' => Str::slug($blog->title)]) }}">{{ $blog->title }}</a></h3>
                                <div class="text">
                                    {!! Str::limit(strip_tags($blog->content), 350, '...') !!}
                                    <a href="{{ route('abudhabi.blog.blogdetails', ['id' => $blog->id, 'title' => Str::slug($blog->title)]) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                {{-- {{ $blogs->links() }}  --}}
            </div>

                <!--Sidebar Side-->
                <div
                    class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <form method="post" action>
                                <div class="form-group">
                                    <input type="search"
                                        name="search-field"
                                        value
                                        placeholder="Search"
                                        required>
                                    <button type="submit"><span
                                            class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!-- Post Widget -->
                        <div class="sidebar-widget popular-posts">
                            <div class="widget-content">
                                <h4 class="sidebar-title">Recent Posts</h4>

                                @foreach($allblog as $blog)
                                <article class="post">
                                    <div class="post-inner">
                                        <figure class="post-thumb">
                                            <a href="{{ route('abudhabi.blog.blogdetails', ['id' => $blog->id, 'title' => Str::slug($blog->title)]) }}">
                                                {{-- Check if blog_img exists, otherwise use a placeholder --}}
                                                <img src="{{ Storage::url($blog->blog_img) }}" alt="{{ $blog->title }}">
                                            </a>
                                        </figure>
                                        <div class="text">
                                            <a href="{{ route('abudhabi.blog.blogdetails', ['id' => $blog->id, 'title' => Str::slug($blog->title)]) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                            </div>
                        </div>


                        <!-- Category Widget -->
                        <div class="sidebar-widget categories">
                            <div class="widget-content">
                                <h4
                                    class="sidebar-title">ROOMS</h4>
                                <!-- Blog Category -->
                                <ul class="blog-categories">
                                    <li><a href="{{ route('rooms.detail', ['slug' => 'hotel-666']) }}"> Hotel 666</a></li>
                                    <li><a href="{{ route('rooms.detail', ['slug' => 'exorcism']) }}">Exorcism</a></li>
                                    <li><a href="{{ route('rooms.detail', ['slug' => 'the-circus']) }}"> The Circus </a></li>
                                    <li><a href="{{ route('rooms.detail', ['slug' => 'psychiatric']) }}">Psychiatric</a></li>
                                    <li><a href="{{ route('rooms.detail', ['slug' => 'dungeon']) }}">Dungeon </a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

</div>

</section>

<section class="reviews-section"  style="background: url({{asset('assets/site/images/newImages/blackIcon/white_bg_crack-04.webp')}})">

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



