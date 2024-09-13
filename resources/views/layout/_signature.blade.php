@extends('layout.master')

@section('styles')
    <style>
        canvas#signature{
            display: block;
            width: 100%;
            padding: 0.775rem 1rem;
            font-size: 1.1rem;
            font-weight: 500;
            line-height: 1.5;
            color: var(--bs-gray-700);
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: 1px solid var(--bs-gray-300);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.475rem;
            box-shadow: #00d084;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        #removeSign{
            display: block;
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
        span>a{
            text-decoration: underline wavy skyblue;
        }
    </style>
@endsection

@section('content')

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-lg-row-fluid w-lg-100 justify-content-center order-1 order-lg-2">
                        <!--begin::Page-->
                        {{ $slot }}
                        <!--end::Page-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::App-->

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/sketchpad.js') }}"></script>
    <script>
        $(document).ready(function () {
            var form  = document.querySelector('#signatureForm');
            var d = new Date();
            var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();

            var reservationDate = $(form.querySelector('[name="reservation_date"]'));
            reservationDate.flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                defaultDate: "today",
                minDate: "today"
            });


            var sketchpad = new Sketchpad({
                element: '#signature',
                width: 400,
                height: 300,
                penSize:3,
                color:'#607d8b',
            });
            $("#removeSign").click(function () {
                sketchpad.undo();
            });

        });


        $(document).on('click', '#kt_signature_submit_button', function (e) {
            e.preventDefault();

            const canvas = document.getElementById('signature');
            const imageData = canvas.toDataURL();
            //window.livewire.emit('getSignatureData', imageData);
            //alert(imageData);


            var form = document.querySelector("#signatureForm");
            var formSubmitButton = document.querySelector("#kt_signature_submit_button");
            formSubmitButton.setAttribute('data-kt-indicator', 'on');

            var formData = new FormData(form);
            formData.append('signature', imageData);

            for (var item of formData.entries()) console.log(item[0] + " => " + item[1]);

            axios.post(form.getAttribute('action'), formData)
                .then(function (response) {
                    console.log(response);
                    switch (response.data.class) {
                        case "info" : toastr.info(response.data.message); break;
                        case "error" : toastr.error(response.data.message); break;
                        case "success" : toastr.success(response.data.message); break;
                        case "warning" : toastr.warning(response.data.message); break;
                        default:toastr.success(response.data.message); break;
                    }
                })
                .catch(function (error) {
                    let dataMessage = error.message;
                    let dataErrors = error.errors;
                    let resErrors = error.response.data.message;

                    for (const errorsKey in dataErrors) {
                        if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                        dataMessage += "\r\n" + dataErrors[errorsKey];
                    }

                    if (error) {
                        Swal.fire({
                            text: resErrors,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Tamamdır!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                        //toastr.error(dataMessage);
                    }
                })
                .then(function () {
                    $("div.card").removeClass("overlay overlay-block");
                    $(".overlay-layer").toggleClass("d-flex d-none");
                    // always executed
                    // Hide loading indication
                    formSubmitButton.removeAttribute('data-kt-indicator');
                    // Enable button
                    formSubmitButton.disabled = false;
                    //window.location.reload();
                    form.reset();
                });
        });


    </script>
@endsection
