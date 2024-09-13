"use strict";

// Class definition
var KTAddModalRoom = function () {
    // Shared variables

    if(document.getElementById('kt_table_room') != null){

        var table = document.getElementById('kt_table_room');
        const element = document.getElementById('kt_modal_add_room');
        const form = element.querySelector('#kt_modal_add_form_room');

        var datatable;
        const modal = new bootstrap.Modal(element);

        // Init add schedule modal
        var initAddForm = () => {

            $(form.querySelector('select[name="place_id"]')).select2();

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'title': {
                            validators: {
                                notEmpty: {
                                    message: 'Title is required!'
                                }
                            }
                        },
                        'place_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Place is required!'
                                }
                            }
                        },
                        'poster': {
                            validators: {
                                notEmpty: {
                                    message: 'Poster is required!'
                                }
                            }
                        },
                        'description': {
                            validators: {
                                notEmpty: {
                                    message: 'description is required!'
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
            );


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


            // Submit button handler
            const submitButton = element.querySelector('[data-kt-modal-action="submit"]');
            submitButton.addEventListener('click', e => {
                e.preventDefault();

                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {

                        if (status == 'Valid') {


                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            submitButton.disabled = true;
                            $("div.card").addClass("overlay overlay-block");
                            $(".overlay-layer").toggleClass("d-none d-flex");
                            // Disable button to avoid multiple click

                            // Simulate ajax request
                            axios.post(form.getAttribute('action'), new FormData(form))
                                .then(function (response) {
                                    $("div.card").removeClass("overlay overlay-block");
                                    $(".overlay-layer").toggleClass("d-flex d-none");
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
                                    submitButton.removeAttribute('data-kt-indicator');
                                    // Enable button
                                    submitButton.disabled = false;

                                     //window.location.reload();
                                      form.reset();
                                      modal.hide();

                                });

                        } else {
                            // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Error: Please fill the all required fields and try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, understood!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                }
            });

            // Cancel button handler
            const cancelButton = element.querySelector('[data-kt-modal-action="cancel"]');
            cancelButton.addEventListener('click', e => {
                e.preventDefault();

                Swal.fire({
                    text: "Are you sure do you wanna cancel it?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, keep it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        form.reset(); // Reset form
                        modal.hide();
                    }
                });
            });

            // Close button handler
            const closeButton = element.querySelector('[data-kt-modal-action="close"]');
            closeButton.addEventListener('click', e => {
                e.preventDefault();

                Swal.fire({
                    text: "Are you sure, do you wanna close it?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, close it!",
                    cancelButtonText: "No, keep open!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        form.reset(); // Reset form
                        modal.hide();
                    }
                });
            });
        }

        return {
            // Public functions
            init: function () {
                initAddForm();
            }
        };
    }else{
        return {
            init: function () {
                return true;
            }
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAddModalRoom.init();
});
