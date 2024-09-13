<!--begin::Footer-->
<div id="kt_app_footer" class="app-footer d-print-none">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://grafstudios.com.tr/hakkimizda" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://grafstudios.com.tr/iletisim" target="_blank" class="menu-link px-2">Support</a>
            </li>
        </ul>
        <!--end::Menu-->
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">{{ date("Y") }}©</span>
            <a href="https://grafstudios.com.tr" target="_blank" class="text-gray-800 text-hover-primary">Graf Studios</a> v{{ phpversion() }}/{{ \Illuminate\Foundation\Application::VERSION }}
        </div>
        <!--end::Copyright-->
    </div>
    <!--end::Footer container-->
</div>
<!--end::Footer-->
