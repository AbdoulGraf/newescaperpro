 <!-- Main Header -->
 <header class="main-header header-style-one">
     <div class="header-container">
         <!--Header Background Shape-->
         <div class="bg-shape-box">
             <div class="bg-shape"></div>
         </div>

         <!-- Header Top -->
         <div class="header-top">
             <div class="inner clearfix">
                 <div class="top-left">
                     <div class="top-text">

                         <div class="top_header-social">

                             <div>
                                 Follow
                             </div>
                             <ul>

                                 <li><a href="#">
                                         <img src=" {{ asset('assets/site/images/socialmedia/YouTube.webp') }} " alt>

                                     </a></li>

                                 <li><a href="#">
                                         <img src=" {{ asset('assets/site/images/socialmedia/Facebook.webp') }}" alt>
                                     </a></li>
                                 <li><a href="#">
                                         <img src=" {{ asset('assets/site/images/socialmedia/Instagram.webp') }}" alt>
                                     </a></li>
                                 <li><a href="#">
                                         <img src=" {{ asset('assets/site/images/socialmedia/Group23.webp') }}" alt>
                                     </a></li>
                             </ul>

                         </div>

                     </div>
                 </div>

                 <div class="top-right">
                     <ul class="info clearfix">
                         <li><a href="https://wa.me/971564500541" target="_blank">
                                 <img src=" {{ asset('assets/site/images/icons/whatsapp.webp') }} " alt>
                                 whatsapp
                             </a></li>
                         <li><a href="tel:+9771564500541">
                                 <img src="{{ asset('assets/site/images/icons/call_phone.png') }}"
                                     style="max-width: 22px;" alt>
                                 &nbsp;
                                 CALL +971 56 450 0541
                             </a></li>
                     </ul>
                 </div>
             </div>
         </div>

         <!-- Header Upper -->
         <div class="header-upper">
             <div class="inner-container clearfix">
                 <!--Logo-->
                 <div class="logo-box">
                     <div class="logo"><a href="./homePage.html" title="Escape House - Scariest Escape Rooms"><img
                                 src=" {{ asset('assets/site/images/uae/logo-menu.webp') }}"
                                 alt="Escape House - Scariest Escape Rooms"
                                 title="Escape House - Scariest Escape Rooms"></a></div>
                 </div>

                 <!--Nav Box-->
                 <div class="nav-outer clearfix">
                     <!--Mobile Navigation Toggler-->
                     <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span></div>

                     <!-- Main Menu -->
                     <nav class="main-menu navbar-expand-md navbar-light">
                         <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                             <ul class="navigation clearfix">
                                 <li class="current "><a href="./homePage.html">Home</a>
                                 </li>
                                 <li class><a href="{{ route('uae.coopoarate') }}">Corporate</a>
                                 </li>

                                 <li class>
                                     <a href="./rooms/halloween.html">Escape
                                         Rooms</a>
                                 </li>

                                 <li><a href="{{ route('vrgames.index') }}">Vr
                                         Games</a></li>
                                 <li class><a href="{{ route('uae.pricelist') }}">Price
                                         LIST</a>
                                 </li>

                                 <li><a href="{{ route('uae.events') }}">Events</a></li>

                                 <li><a href="{{ route('uae.franchise') }}">FRANCHISE</a></li>

                                 <li><a href="{{ route('uae.blog') }}">BLOG</a></li>

                                 <li><a href="{{ route('uae.contact') }}">CONTACT</a></li>

                             </ul>
                         </div>
                     </nav>
                     <!-- Main Menu End-->

                 </div>
             </div>
         </div>
         <!--End Header Upper-->
     </div><!--End Header Container-->

     <!-- Sticky Header  -->
     <div class="sticky-header">
         <div class="auto-container clearfix"
             style="display: flex; align-items: center; justify-content: space-between;">
             <!--Logo-->
             <div class="logo pull-left">
                 <a href="index.html" title><img src="{{ asset('assets/site/images/uae/logo-menu.webp') }}" alt
                         title></a>

             </div>
             <!--Right Col-->
             <div class="pull-right">
                 <!-- Main Menu -->
                 <nav class="main-menu clearfix">
                     <!--Keep This Empty / Menu will come through Javascript-->
                 </nav><!-- Main Menu End-->
             </div>
         </div>
     </div><!-- End Sticky Menu -->

     <!-- Mobile Menu  -->
     <div class="mobile-menu">
         <div class="menu-backdrop"></div>
         <div class="close-btn"><span class="icon flaticon-cancel"></span></div>

         <nav class="menu-box">
             <div class="nav-logo"><a href="index.html"><img src="{{ asset('assets/site/images/uae/logo-menu.webp') }}"
                         alt title></a></div>
             <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
             </div>

         </nav>
     </div><!-- End Mobile Menu -->
 </header>
 <!-- End Main Header -->
