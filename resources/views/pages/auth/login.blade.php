<x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/admin" action="login">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">

            <div>
                <img src="{{ image('logos/logo_escape.png') }}" alt="Blackout" style="">
            </div>
            
            <!--begin::Title-->

            {{-- <h1 class="text-dark fw-bolder mb-3">
                Black Out
            </h1> --}}

            <!--end::Title-->

            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6 mt-5">
                Sign In
            </div>
            <!--end::Subtitle--->
        </div>
        <!--begin::Heading-->


        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Email-->
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
            <!--end::Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
            <a href="/forgot-password" class="link-primary">
                Forgot Password ?
            </a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'Sign In'])
            </button>
        </div>
        <!--end::Submit button-->


    </form>
    <!--end::Form-->

</x-auth-layout>
