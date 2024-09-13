"use strict";

// Class definition
var KTCreateReservation = function () {
    // Elements
    var modal;
    var modalEl;

    var stepper;
    var form;
    var formSubmitButton;
    var formContinueButton;

    // Variables
    var stepperObj;
    var validations = [];

    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-top-center",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    var initReservationDate = function () {
        var reservationDate = $(form.querySelector('[name="reservation_date"]'));
        reservationDate.flatpickr({
            dateFormat: "Y-m-d H:i:s",
            defaultDate: "today",
        });
    }

    var initReservationHour = function () {
        var reservationHour = $(form.querySelector('[name="reservation_hour"]'));
        reservationHour.flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
    }

    // Private Functions
    var initStepper = function () {
        // Initialize Stepper
        stepperObj = new KTStepper(stepper);

        // Stepper change event(handle hiding submit button for the last step)
        stepperObj.on('kt.stepper.changed', function (stepper) {
            if (stepperObj.getCurrentStepIndex() === 5) {
                formSubmitButton.classList.remove('d-none');
                formSubmitButton.classList.add('d-inline-block');
                formContinueButton.classList.add('d-none');
            } else if (stepperObj.getCurrentStepIndex() === 6) {
                formSubmitButton.classList.add('d-none');
                formContinueButton.classList.add('d-none');
            } else if (stepperObj.getCurrentStepIndex() === 1) {

            } else if (stepperObj.getCurrentStepIndex() === 2) {

            } else if (stepperObj.getCurrentStepIndex() === 3) {

            } else {
                formSubmitButton.classList.remove('d-inline-block');
                formSubmitButton.classList.remove('d-none');
                formContinueButton.classList.remove('d-none');
            }
        });


        // Validation before going to next page
        stepperObj.on('kt.stepper.next', function (stepper) {
            console.log('stepper.next');

            // Validate form before change stepper step
            var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for current step

            if (validator) {
                validator.validate().then(function (status) {

                    if (status == 'Valid') {
                        stepper.goNext();

                        //KTUtil.scrollTop();
                    } else {
                        // Show error message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then(function () {
                            //KTUtil.scrollTop();
                        });
                    }
                });
            } else {
                stepper.goNext();

                KTUtil.scrollTop();
            }
        });

        // Prev event
        stepperObj.on('kt.stepper.previous', function (stepper) {
            console.log('stepper.previous');

            stepper.goPrevious();
            KTUtil.scrollTop();
        });

        formSubmitButton.addEventListener('click', function (e) {
            // Validate form before change stepper step
            var validator = validations[4]; // get validator for last form

            validator.validate().then(function (status) {
                console.log('validated!');

                if (status == 'Valid') {
                    // Prevent default button action
                    e.preventDefault();

                    // Disable button to avoid multiple click
                    formSubmitButton.disabled = true;

                    // Show loading indication
                    formSubmitButton.setAttribute('data-kt-indicator', 'on');


                    // Show loading indication
                    formSubmitButton.setAttribute('data-kt-indicator', 'on');
                    formSubmitButton.disabled = true;
                    $("div.card").addClass("overlay overlay-block");
                    $(".overlay-layer").toggleClass("d-none d-flex");
                    // Disable button to avoid multiple click

                    // Simulate ajax request
                    axios.post(form.getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            console.log(response);
                            switch (response.data.class) {
                                case "info": toastr.info(response.data.message); break;
                                case "error": toastr.error(response.data.message); break;
                                case "success": toastr.success(response.data.message); break;
                                case "warning": toastr.warning(response.data.message); break;
                                default: toastr.success(response.data.message); break;
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
                                    confirmButtonText: "Ok!",
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

                            stepperObj.goNext();
                            //window.location.reload();
                            form.reset();
                            modal.hide();
                            stepperObj.goTo(1);

                        });

                } else {
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then(function () {
                        KTUtil.scrollTop();
                    });
                }
            });
        });
    }

    // Init form inputs
    var initForm = function () {

        $('input[name="place_id"]').change(function () {
            var placeId = $(this).val();
            $.ajax({
                url: '/getRooms', // Oda listesini dönecek endpoint
                type: 'GET',
                data: { place_id: placeId },
                success: function (data) {
                    // Oda seçeneklerini sayfada güncelle
                    var roomOptions = '';
                    data.rooms.forEach(function (room) {
                        roomOptions += '<label class="d-flex flex-stack cursor-pointer mb-5">' +
                            '<span class="d-flex align-items-center my-2">' +
                            '<span class="d-flex flex-column">' +
                            '<span class="fw-bold fs-6">' + room.title + '</span>' +
                            '</span></span>' +
                            '<span class="form-check form-check-custom form-check-solid">' +
                            '<input class="form-check-input" type="radio" name="room_id" value="' + room.id + '" />' +
                            '</span></label>';
                    });
                    $('#roomSelectionDiv').html(roomOptions); // Oda seçeneklerini içerecek div
                }
            });
        });



        // Expiry month. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="card_expiry_month"]')).on('change', function () {
            // Revalidate the field when an option is chosen
            validations[4].revalidateField('card_expiry_month');
        });

        // Expiry year. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="card_expiry_year"]')).on('change', function () {
            // Revalidate the field when an option is chosen
            validations[4].revalidateField('card_expiry_year');
        });
    }

    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/


        // Step 1
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    place_id: {
                        validators: {
                            notEmpty: {
                                message: 'Place is required'
                            }
                        }
                    },
                    payment_method: {
                        validators: {
                            notEmpty: {
                                message: 'Payment method must checked'
                            }
                        }
                    },

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));

        // Step 2
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    room_id: {
                        validators: {
                            notEmpty: {
                                message: 'Room is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));

        // Step 3
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    players: {
                        validators: {
                            notEmpty: {
                                message: 'Player is required'
                            }
                        }
                    },
                    reservation_date: {
                        validators: {
                            notEmpty: {
                                message: 'Reservation Date is required'
                            }
                        }
                    },
                    reservation_hour: {
                        validators: {
                            notEmpty: {
                                message: 'Reservation Hour is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));

        // Step 4
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: 'First name is required'
                            }
                        }
                    },

                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'Phone number is required'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));


        // Step 5
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    'card_name': {
                        validators: {
                            notEmpty: {
                                message: 'Name on card is required'
                            }
                        }
                    },
                    'card_number': {
                        validators: {
                            notEmpty: {
                                message: 'Card member is required'
                            },
                            creditCard: {
                                message: 'Card number is not valid'
                            }
                        }
                    },
                    'card_expiry_month': {
                        validators: {
                            notEmpty: {
                                message: 'Month is required'
                            }
                        }
                    },
                    'card_expiry_year': {
                        validators: {
                            notEmpty: {
                                message: 'Year is required'
                            }
                        }
                    },
                    'card_cvv': {
                        validators: {
                            notEmpty: {
                                message: 'CVV is required'
                            },
                            digits: {
                                message: 'CVV must contain only digits'
                            },
                            stringLength: {
                                min: 3,
                                max: 4,
                                message: 'CVV must contain 3 to 4 digits only'
                            }
                        }
                    }
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));
    }

    return {
        // Public Functions
        init: function () {
            // Elements
            modalEl = document.querySelector('#kt_modal_create_reservation');

            if (!modalEl) {
                return;
            }

            modal = new bootstrap.Modal(modalEl);

            stepper = document.querySelector('#kt_modal_create_reservation_stepper');
            form = document.querySelector('#kt_modal_create_reservation_form');
            formSubmitButton = stepper.querySelector('[data-kt-stepper-action="submit"]');
            formContinueButton = stepper.querySelector('[data-kt-stepper-action="next"]');

            initReservationDate();
            initReservationHour();
            initStepper();
            initForm();
            initValidation();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCreateReservation.init();
});
