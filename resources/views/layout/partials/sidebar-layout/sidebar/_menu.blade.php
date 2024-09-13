<style>
    .menu-submenu {
        display: block;
        /* Hide submenu by default */
    }

    .menu-submenu.open {
        display: block;
        /* Show submenu when 'open' class is added */
    }
</style>


<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">
            <!--begin:Dashboard-->
            <div data-kt-menu-trigger="click" class="menu-item here show">
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.dashboard') }}">
                        <span class="menu-icon">{!! getSvgIcon('duotune/general/gen025.svg', 'svg-icon svg-icon-2') !!}</span>
                        <span class="menu-title">Dashboards</span>
                    </a>
                    <!--end:Menu link-->
                </div>
            </div>
            <!--end:Dashboard-->

            <!--begin:Pages-->
            <div class="menu-item pt-5">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-semibold text-uppercase fs-7">Pages</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Pages-->
            @hasanyrole('dubai|abudhabi|Super-Admin|admin')
                <!--begin:Reservations-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item">
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.reservations.index') }}">
                        <span
                            class="menu-icon">{!! getSvgIcon('duotune/communication/com005.svg', 'svg-icon svg-icon-2') !!}</span>
                        <span class="menu-title">All Reservations</span>
                    </a>
                    <!--end:Menu link-->
                </div>
            </div> --}}

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <a href="javascript:;" class="menu-link">
                        <span class="menu-icon">{!! getSvgIcon('duotune/communication/com005.svg', 'svg-icon svg-icon-2') !!}</span>
                        <span class="menu-title">Reservations</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-submenu" style="padding-left: 30px">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.reservations.today-list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Today</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.reservations.dubai') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dubai</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.reservations.abudhabi') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Abu Dhabi</span>
                            </a>
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div>
            @endhasanyrole



            @hasanyrole('dubai|Super-Admin')
                <!--begin:Reservations-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.reservations.dubai') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/communication/com005.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title"> Dubai</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div> --}}
                <!--end:Reservations-->
            @endhasanyrole



            @hasanyrole('abudhabi|Super-Admin')
                <!--begin:Reservations-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.reservations.abudhabi') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/communication/com005.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title">Abu Dhabi</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div> --}}
                <!--end:Reservations-->
            @endhasanyrole



            @hasanyrole('Super-Admin|admin')
                <!--begin:Rooms-->
                <div data-kt-menu-trigger="click" class="menu-item">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.rooms.index') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/general/gen022.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title">Rooms</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:Rooms-->
                <!--begin:Rooms-->

                <div data-kt-menu-trigger="click" class="menu-item">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.hours.index') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/general/gen026.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title">Hours</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:Rooms-->
                <!--begin:Rooms-->
                <div data-kt-menu-trigger="click" class="menu-item">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.prices.index') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/art/art002.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title">Price List</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:Rooms-->


                <!--begin:FAQ-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.faq.list') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/text/txt002.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title">FAQ</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:FAQ-->

                <!--begin:Comments-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.comment.list') }}">
                            <span class="menu-icon">
                                <!-- Comment Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-message-square">
                                    <path d="M21 10l-4-4m4 4v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10l4 4z">
                                    </path>
                                </svg>
                                <!-- End of Comment Icon -->
                            </span>
                            <span class="menu-title">Comments</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>



                <!--end:Comments-->

                <!--begin:Social Media-->


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.social.list') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/abstract/abs048.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title">Social Media</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>



                <!--end:Social Media-->

                <!--begin:Subscribers-->


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.subscribers.list') }}">
                            <span class="menu-icon">{!! getSvgIcon('duotune/communication/com004.svg', 'svg-icon svg-icon-2') !!}</span>
                            <span class="menu-title">Subscribers</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:Subscribers-->


                <!--begin:Blog -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.blog.list') }}">
                            <span class="menu-icon">
                                <!-- Blog Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                    <path
                                        d="M4 19.5c0 .8.7 1.5 1.5 1.5h13c.8 0 1.5-.7 1.5-1.5V4.5c0-.8-.7-1.5-1.5-1.5H5.5c-.8 0-1.5.7-1.5 1.5v15zm0 0c0 .8.7 1.5 1.5 1.5h5.184a.75.75 0 01.531.22l3.285 3.284c.293.293.768.293 1.06 0l3.285-3.284a.75.75 0 01.53-.22H19.5c.8 0 1.5-.7 1.5-1.5V4.5a.75.75 0 00-.75-.75H5.5a.75.75 0 00-.75.75z" />
                                </svg>
                                <!-- End of Blog Icon -->
                            </span>
                            <span class="menu-title">Blog</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>


                <!--end:Blog-->


                <!--begin:Request Video-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.requestvideo.list') }}">
                            <span class="menu-icon">
                                <!-- Request Video Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2">
                                    </rect>
                                </svg>
                                <!-- End of Request Video Icon -->
                            </span>
                            <span class="menu-title">Request Video</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:Request Video-->







                <!--begin:Request Franchise-->

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.requestfranchise.list') }}">
                            <span class="menu-icon">
                                <!-- Request Franchise Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2">
                                    </rect>
                                    <path d="M16 3.01v6a2 2 0 0 0 2 1.99V3.01h-2z"></path>
                                </svg>
                                <!-- End of Request Franchise Icon -->
                            </span>
                            <span class="menu-title">Request Franchise</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>




                <!--end:Request Franchise-->


                <!--begin:Contact Messages-->


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.contact.list') }}">
                            <span class="menu-icon">
                                <!-- Contacts Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-message-square">
                                    <path d="M21 10l-4-4m4 4v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10l4 4z">
                                    </path>
                                </svg>
                                <!-- End of Contacts Icon -->
                            </span>
                            <span class="menu-title">Contacts Messages</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>



                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.photos_videos.list') }}">
                            <span class="menu-icon">
                                <!-- Contacts Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-camera" viewBox="0 0 24 24">
                                    <path
                                        d="M23 7l-7 0 2-2h-3l-2-2h-4l-2 2h-3l2 2-7 0c-1.1 0-1.99 0.9-1.99 2l0 10c0 1.1 0.89 2 1.99 2l20 0c1.1 0 2-0.9 2-2l0-10c0-1.1-0.9-2-2-2z" />
                                    <circle cx="12" cy="13" r="4" />
                                </svg>

                                <!-- End of Contacts Icon -->
                            </span>
                            <span class="menu-title"> Photo / Videos </span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>



                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.storyline.list') }}">
                            <span class="menu-icon">
                                <!-- Contacts Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-book" viewBox="0 0 24 24">
                                    <path d="M4 19.5A2.5 2.5 0 016.5 17H20"></path>
                                    <path d="M20 3H6.5A2.5 2.5 0 004 5.5v14A2.5 2.5 0 006.5 22H20V3z"></path>
                                </svg>

                                <!-- End of Contacts Icon -->
                            </span>
                            <span class="menu-title"> StoryLine </span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>

                {{-- video request video --}}

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.video_price.list') }}">
                            <span class="menu-icon">
                                <!-- Contacts Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-book" viewBox="0 0 24 24">
                                    <path d="M4 19.5A2.5 2.5 0 016.5 17H20"></path>
                                    <path d="M20 3H6.5A2.5 2.5 0 004 5.5v14A2.5 2.5 0 006.5 22H20V3z"></path>
                                </svg>
                                <!-- End of Contacts Icon -->
                            </span>
                            <span class="menu-title"> Video Price Setting </span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>





                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.promocode.list') }}">
                            <span class="menu-icon">
                                <!-- Contacts Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-tag" viewBox="0 0 24 24">
                                    <path
                                        d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0l-8.5-8.5a2 2 0 010-2.83l7.17-7.17a2 2 0 012.83 0l8.5 8.5a2 2 0 010 2.83z">
                                    </path>
                                    <path d="M7 7H7.01"></path>
                                </svg>
                                <!-- End of Contacts Icon -->
                            </span>
                            <span class="menu-title"> Promo Code </span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>

                <!--end:Contact messages-->
            @endhasanyrole

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select the menu link that toggles the submenu
        var menuLink = document.querySelector('.menu-accordion .menu-link');

        // Add click event listener to the link
        menuLink.addEventListener('click', function() {
            // Find the submenu within the parent menu item
            var submenu = this.nextElementSibling;

            // Toggle the 'open' class on the submenu to show or hide it
            submenu.classList.toggle('open');
        });
    });
</script>
