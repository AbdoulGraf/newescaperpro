"use strict";

// Class definition
var KTUpdateModalRoom = function () {

    if(document.getElementById('kt_table_room') != null) {
        // Shared variables
        var table = document.getElementById('kt_table_room');
        const element = document.getElementById('kt_modal_update_room');
        const form = element.querySelector('#kt_modal_update_form_room');

        var baseURL;

        $(form.querySelector('select[name="admin_id"]')).select2();

        var dataID;

        const modal = new bootstrap.Modal(element);
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


        $(document).on('click', '#updateButton', function () {
            dataID = $(this).data('id');
            baseURL = $(this).attr("data-redirect-url");

            if (dataID) {
                // Simulate ajax request
                axios.get(baseURL + "admin/authors/" + dataID).then(function (response) {
                    var result = response.data.result[0];
                    // console.table(result);

                    const name = element.querySelector('input[name=name]');
                    const surname = element.querySelector('input[name=surname]');
                    const title = element.querySelector('input[name=title]');
                    const position = element.querySelector('input[name=position]');
                    const label = element.querySelector('input[name=label]');
                    const info = element.querySelector('textarea[name=info]');
                    const admin_id = element.querySelector('select[name=admin_id]');
                    const profile = element.getElementsByClassName('profileImage');
                    const cover = element.getElementsByClassName('coverImage');

                    $(profile).css({"background-image": "url(" + baseURL + result.profilePicUrl + ")"});
                    $(cover).css({"background-image": "url(" + baseURL + result.headerImageUrl + ")"});

                    $(name).val(result.name);
                    $(surname).val(result.surname);
                    $(position).val(result.position);
                    $(label).val(result.label);
                    $(title).val(result.title);
                    $(info).val(result.info);
                    $(admin_id).val(result.admin_id).trigger('change').attr("data-placeholder", result.admin_id);


                    const isConsulting = element.querySelector('input[name=isConsulting]');
                    (result.isConsulting === 1) ? $("span.isConsulting").html('Evet') : $("span.isConsulting").html('Hayır');
                    (result.isConsulting === 1) ? $(isConsulting).val(1).attr('checked', true) : $(isConsulting).val(0).removeAttr('checked');

                    const isShowing = element.querySelector('input[name=status]');
                    (result.isShowing === 1) ? $("span.isShowing").html('Evet') : $("span.isShowing").html('Hayır');
                    (result.isShowing === 1) ? $(isShowing).val(1).attr('checked', true) : $(isShowing).val(0).removeAttr('checked');

                }).catch(function (error) {
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
                });
            }

        });


        // Init add schedule modal
        var initUpdateForm = () => {


            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'name': {
                            validators: {
                                notEmpty: {
                                    message: 'İsim alanı zorunludur!'
                                }
                            }
                        },
                        'surname': {
                            validators: {
                                notEmpty: {
                                    message: 'Soyisim alanı zorunludur!'
                                }
                            }
                        },
                        'label': {
                            validators: {
                                notEmpty: {
                                    message: 'İsim ve Soyisim yazınız!'
                                }
                            }
                        },
                        'info': {
                            validators: {
                                notEmpty: {
                                    message: 'Info alanı zorunludur!'
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
                            axios.post(baseURL + "admin/authors/" + dataID, new FormData(form))
                                .then(function (response) {
                                    $("div.card").removeClass("overlay overlay-block");
                                    $(".overlay-layer").toggleClass("d-flex d-none");
                                    // console.log(response);
                                    switch (response.data.class) {
                                        case "info" :
                                            toastr.info(response.data.message);
                                            break;
                                        case "error" :
                                            toastr.error(response.data.message);
                                            break;
                                        case "success" :
                                            toastr.success(response.data.message);
                                            break;
                                        case "warning" :
                                            toastr.warning(response.data.message);
                                            break;
                                        default:
                                            toastr.success(response.data.message);
                                            break;
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
                                    // always executed
                                    // Hide loading indication
                                    submitButton.removeAttribute('data-kt-indicator');
                                    // Enable button
                                    submitButton.disabled = false;
                                    form.reset();
                                    modal.hide();

                                    // window.location.reload();

                                });

                        } else {
                            // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Dikkat: Boş bıraktığınız alanlar var, lütfen alanları doldurup kaydetmeyi tekrar deneyin.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Tamam, anlaşıldı!",
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
                    text: "İptal etmek istediğinize emin misiniz?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Evet, iptal edilsin!",
                    cancelButtonText: "Hayır, vazgeç!",
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
                    text: "Kapatmak istediğinize emin misiniz?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Evet, kapatılsın!",
                    cancelButtonText: "Hayır, vazgeç!",
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
                initUpdateForm();
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
    KTUpdateModalRoom.init();
});
