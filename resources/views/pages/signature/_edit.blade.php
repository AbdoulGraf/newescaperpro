<x-default-layout>
    @section('styles')
        <style>
            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
            .page {
                width: 21cm;
                min-height: 29cm;
                padding: 0.5cm;
                margin: 0.5cm auto;
                background: white;
                /*box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);*/
            }
            .subpage {
                padding: 1cm;
                border: 5px red solid;
                height: 220mm;
                outline: 2cm #FFEAEA solid;
            }
            @page {
                size: A4;
                margin: 0;
            }
            @media print {
                .no-print, .no-print *
                {
                    display: none !important;
                    visibility: hidden!important;
                }
                .kt_app_content {
                    margin: 0;
                    border: initial;
                    border-radius: initial;
                    width: initial;
                    min-height: initial;
                    box-shadow: none;
                    background: initial;
                    page-break-after: always;
                }
            }
        </style>
    @endsection
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid page">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3  d-print-none">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Signature</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Signatures</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ $record->first_name }} {{ $record->last_name }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="mw-lg-650px mx-auto w-100">
                <!-- begin::Invoice 3-->
                <div class="card">
                    <!-- begin::Body-->
                    <div class="">
                        <!-- begin::Wrapper-->
                        <div class="mw-lg-650px mx-auto w-100">
                            <!-- begin::Header-->
                            <div class="d-flex justify-content-between flex-column flex-sm-row ">
                                <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7"></h4>
                                <!--end::Logo-->
                                <div class="text-sm-end">
                                    <!--begin::Logo-->
                                    <a href="#" class="d-block mw-150px ms-sm-auto">
                                        <img alt="Logo" src="{{ asset('img/logo/logo-menu.webp') }}" class="w-100" />
                                    </a>
                                    <!--end::Logo-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column gap-7 ">
                                    <!--begin::Message-->
                                    <div class="fw-bold fs-2">{{ $record->first_name }} {{ $record->last_name }}
                                        <span class="fs-6">({{ $record->email }})</span>,
                                        <br />
                                        <span class="text-muted fs-5">Here are your signature details. We thank you for your signature.</span></div>
                                    <!--begin::Message-->
                                    <!--begin::Separator-->
                                    <div class="separator"></div>
                                    <!--begin::Separator-->
                                    <!--begin::Order details-->
                                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Place</span>
                                            <span class="fs-5">Dubai</span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Room</span>
                                            <span class="fs-5">Ouija</span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Date</span>
                                            <span class="fs-5">{{ $record->created_at->format("d/M/Y") }}</span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Hour</span>
                                            <span class="fs-5">{{ $record->created_at->format("H:i") }}</span>
                                        </div>
                                    </div>
                                    <!--end::Order details-->
                                    <!--begin::Billing & shipping-->
                                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Location</span>
                                            <span class="fs-6">Showroom 2, Reem Residency,
																<br />Al Karama Dubai,
																<br />United Arab Emirates.</span>
                                        </div>
                                    </div>
                                    <!--end::Billing & shipping-->
                                    <!--begin:Order summary-->
                                    <div class="d-flex justify-content-between flex-column">
                                        <!--begin::Table-->
                                        <div class="table-responsive border-bottom mb-9">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                <thead>
                                                <tr class="border-bottom fs-6 fw-bold text-muted">
                                                    <th class="min-w-175px pb-2">Contracts</th>
                                                    <th class="min-w-70px text-end pb-2"></th>
                                                </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <div class="fw-bold">Terms &amp; Conditions</div>
                                                                <div class="fs-7 text-muted">
                                                                    <a href="https://black-out.ae/terms" target="_blank">https://black-out.ae/terms</a>
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">I read and Approve</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <div class="fw-bold">Privacy Policy</div>
                                                                <div class="fs-7 text-muted">
                                                                    <a href="https://black-out.ae/privacy" target="_blank">https://black-out.ae/privacy</a>
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">I read and Approve</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <div class="fw-bold">Refund Policy</div>
                                                                <div class="fs-7 text-muted">
                                                                    <a href="https://black-out.ae/refund" target="_blank">https://black-out.ae/refund</a>
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">I read and Approve</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <div class="fw-bold">Disclaimer And Liability</div>
                                                                <div class="fs-7 text-muted">
                                                                    <a href="https://black-out.ae/liability" target="_blank">https://black-out.ae/liability</a>
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">I read and Approve</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end:Order summary-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Body-->
                            <!-- begin::Footer-->
                            <div class="d-flex flex-stack flex-wrap ">
                                <!-- begin::Actions-->
                                <div class="my-1 me-5">
                                    <!-- begin::Pint-->
                                    <button type="button" id="print" class="btn btn-success my-1 me-12  d-print-none" onclick="window.print();">Print</button>
                                    <!-- end::Pint-->
                                </div>
                                <!-- end::Actions-->
                                <!-- begin::Action-->
                                <img src="" alt="" srcset="{{ $record->signature }}" width="200">
                                <!-- end::Action-->
                            </div>
                            <!-- end::Footer-->
                        </div>
                        <!-- end::Wrapper-->
                    </div>
                    <!-- end::Body-->
                </div>
                <!-- end::Invoice 1-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    @section('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                let printLink = document.getElementById("print");
                let container = document.getElementById("container");

                printLink.addEventListener("click", event => {
                    event.preventDefault();
                    printLink.style.display = "none";
                    window.print();
                }, false);

                container.addEventListener("click", event => {
                    printLink.style.display = "flex";
                }, false);

            }, false);
        </script>
    @endsection
</x-default-layout>
