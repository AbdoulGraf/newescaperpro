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

    var initReservationDate = function() {
        var reservationDate = $(form.querySelector('[name="reservation_date"]'));
        reservationDate.flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            defaultDate: "today",
        });
    }

    var initReservationHour = function() {
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
	var initForm = function() {
		// Expiry month. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="card_expiry_month"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validations[4].revalidateField('card_expiry_month');
        });

		// Expiry year. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="card_expiry_year"]')).on('change', function() {
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
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: 'Last name is required'
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
KTUtil.onDOMContentLoaded(function() {
    KTCreateReservation.init();
});

"use strict";

var KTReservationList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_reservation');
    var table_archive = document.getElementById('kt_table_archive');

    var addForm = document.getElementById('kt_modal_add_reservation_form');

    var datatable;
    var datatable_archive;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;
    var deleteAction = document.getElementsByTagName('data-kt-table-filter');

    // Private functions
    var initReservationTable = function () {

        // $(addForm.querySelector('select[name="place_id"]')).select2();

        $('input[type=checkbox][name=status]').change(function () {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $('span.status').html('Active') : $("span.status").html('Passive');
        });

        $('#description').maxlength({
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": true,
            'order': [[5, 'asc']],
            "pageLength": 50,
            "paging": true,
            "lengthChange": false,
            'columnDefs': [
                { orderable: false, targets: 8 }, // Disable ordering on column 10 (actions)
            ],
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
        });

        datatable_archive = $(table_archive).DataTable({
            "info": true,
            'order': [[1, 'asc']],
            "pageLength": 10,
            "paging": true,
            "lengthChange": false,
            'columnDefs': [
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                { orderable: false, targets: 10 }, // Disable ordering on column 10 (actions)
            ],
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable_archive.on('draw', function () {
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
        });

    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-table-filter="form"]');
        const filterButton = filterForm.querySelector('[data-kt-table-filter="filter"]');
        const selectOptions = filterForm.querySelectorAll('select');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            var filterString = '';

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== '') {
                    if (index !== 0) {
                        filterString += ' ';
                    }

                    // Build filter value options
                    filterString += item.value;
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search(filterString).draw();
        });
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Select filter options
            const filterForm = document.querySelector('[data-kt-table-filter="form"]');
            const selectOptions = filterForm.querySelectorAll('select');

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            selectOptions.forEach(select => {
                $(select).val('').trigger('change');
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search('').draw();
        });
    }


    // Delete subscirption
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {

                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get category name
                const recordName = parent.querySelectorAll('td')[2].innerText;


                Swal.fire({
                    text: "Are you sure do you wanna delete it " + recordName + " record?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, keep it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {

                        // Simulate ajax request
                        axios.delete(d.getAttribute('href'), { author: recordName })
                            .then(function (response) {
                                $("div.card").removeClass("overlay overlay-block");
                                $(".overlay-layer").toggleClass("d-flex d-none");
                                // console.log(response);
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
                            .then(function () { });
                        Swal.fire({
                            text: "You have deleted " + recordName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, understood!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // Remove current row
                            datatable.row($(parent)).remove().draw();
                        }).then(function () {
                            // Detect checked checkboxes
                            toggleToolbars();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: recordName + " record isn't deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, understood!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        toolbarBase = document.querySelector('[data-kt-table-toolbar="base"]');
        toolbarSelected = document.querySelector('[data-kt-table-toolbar="selected"]');
        selectedCount = document.querySelector('[data-kt-table-select="selected_count"]');
        const deleteSelected = document.querySelector('[data-kt-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {

            Swal.fire({
                text: "Are you sure, do you wanna delete it all selected records?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel it!",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {

                    // Remove all selected customers
                    checkboxes.forEach(c => {
                        if (c.checked) {
                            var item = $(c).val();

                            axios.delete("authors/" + item, { author: item })
                                .then(function (response) {
                                    $("div.card").removeClass("overlay overlay-block");
                                    $(".overlay-layer").toggleClass("d-flex d-none");
                                    // console.log(response);
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
                                    Swal.fire({
                                        text: "All selected records are deleted!.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, understood!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function () {
                                        toggleToolbars(); // Detect checked checkboxes
                                        initToggleToolbar(); // Re-init toolbar to recalculate checkboxes

                                        window.location.reload();
                                    });
                                });

                            datatable.row($(c.closest('tbody tr'))).remove().draw();
                        }
                    });

                    // Remove header checked box
                    const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                    headerCheckbox.checked = false;

                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Selected customers was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Select refreshed checkbox DOM elements
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    return {
        // Public functions
        init: function () {
            if (!table) return;

            initReservationTable();
            initToggleToolbar();
            handleSearchDatatable();
            // handleResetForm();
            handleDeleteRows();
            // handleFilterDatatable();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTReservationList.init();
});

"use strict";

// Class definition
var KTUpdateModalReservation = function () {

    if(document.getElementById('kt_table_reservation') != null) {
        // Shared variables
        var table = document.getElementById('kt_table_reservation');
        const element = document.getElementById('kt_modal_update_reservation');
        const form = element.querySelector('#kt_modal_update_form_reservation');

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
    KTUpdateModalReservation.init();
});

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

"use strict";

var RoomList = function () {

    if(document.getElementById('kt_table_room') != null) {
        // Define shared variables
        var table = document.getElementById('kt_table_room');

        var addForm = document.getElementById('kt_modal_add_form_room');

        var datatable;
        var toolbarBase;
        var toolbarSelected;
        var selectedCount;
        var deleteAction = document.getElementsByTagName('data-kt-table-filter');

        // Private functions
        var initCategoryTable = function () {

            $(addForm.querySelector('select[name="place_id"]')).select2();

            $('input[type=checkbox][name=status]').change(function () {
                ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
                ($(this).is(':checked')) ? $('span.status').html('Active') : $("span.status").html('Passive');
            });

            $('#description').maxlength({
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success"
            });

            // Init datatable --- more info on datatables: https://datatables.net/manual/
            datatable = $(table).DataTable({
                "info": false,
                'order': [[0, 'asc']],
                "pageLength": 15,
                "paging": false,
                "lengthChange": false,
                'columnDefs': [
                    {orderable: false, targets: 0}, // Disable ordering on column 0 (checkbox)
                    {orderable: false, targets: 4}, // Disable ordering on column 7 (actions)
                ],
                // "language" : {
                //     url: "/vendor/datatables/lang/tr.json",
                // },
            });

            // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
            datatable.on('draw', function () {
                initToggleToolbar();
                handleDeleteRows();
                toggleToolbars();
            });

        }

        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        var handleSearchDatatable = () => {
            const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Filter Datatable
        var handleFilterDatatable = () => {
            // Select filter options
            const filterForm = document.querySelector('[data-kt-table-filter="form"]');
            const filterButton = filterForm.querySelector('[data-kt-table-filter="filter"]');
            const selectOptions = filterForm.querySelectorAll('select');

            // Filter datatable on submit
            filterButton.addEventListener('click', function () {
                var filterString = '';

                // Get filter values
                selectOptions.forEach((item, index) => {
                    if (item.value && item.value !== '') {
                        if (index !== 0) {
                            filterString += ' ';
                        }

                        // Build filter value options
                        filterString += item.value;
                    }
                });

                // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
                datatable.search(filterString).draw();
            });
        }

        // Reset Filter
        var handleResetForm = () => {
            // Select reset button
            const resetButton = document.querySelector('[data-kt-table-filter="reset"]');

            // Reset datatable
            resetButton.addEventListener('click', function () {
                // Select filter options
                const filterForm = document.querySelector('[data-kt-table-filter="form"]');
                const selectOptions = filterForm.querySelectorAll('select');

                // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
                selectOptions.forEach(select => {
                    $(select).val('').trigger('change');
                });

                // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                datatable.search('').draw();
            });
        }


        // Delete subscirption
        var handleDeleteRows = () => {
            // Select all delete buttons
            const deleteButtons = table.querySelectorAll('[data-kt-table-filter="delete_row"]');

            deleteButtons.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {

                    e.preventDefault();

                    // Select parent row
                    const parent = e.target.closest('tr');

                    // Get category name
                    const recordName = parent.querySelectorAll('td')[2].innerText;


                    Swal.fire({
                        text: "Are you sure do you wanna delete it " + recordName + " record?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, keep it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function (result) {
                        if (result.value) {

                            // Simulate ajax request
                            axios.delete(d.getAttribute('href'), {author: recordName})
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
                                            confirmButtonText: "Ok!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                        //toastr.error(dataMessage);
                                    }
                                })
                                .then(function () {
                                });
                            Swal.fire({
                                text: "You have deleted " + recordName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, understood!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
                                // Remove current row
                                datatable.row($(parent)).remove().draw();
                            }).then(function () {
                                // Detect checked checkboxes
                                toggleToolbars();
                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: recordName + " record isn't deleted.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, understood!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                })
            });
        }

        // Init toggle toolbar
        var initToggleToolbar = () => {
            // Toggle selected action toolbar
            // Select all checkboxes
            const checkboxes = table.querySelectorAll('[type="checkbox"]');

            // Select elements
            toolbarBase = document.querySelector('[data-kt-table-toolbar="base"]');
            toolbarSelected = document.querySelector('[data-kt-table-toolbar="selected"]');
            selectedCount = document.querySelector('[data-kt-table-select="selected_count"]');
            const deleteSelected = document.querySelector('[data-kt-table-select="delete_selected"]');

            // Toggle delete selected toolbar
            checkboxes.forEach(c => {
                // Checkbox on click event
                c.addEventListener('click', function () {
                    setTimeout(function () {
                        toggleToolbars();
                    }, 50);
                });
            });

            // Deleted selected rows
            deleteSelected.addEventListener('click', function () {

                Swal.fire({
                    text: "Are you sure, do you wanna delete it all selected records?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {

                        // Remove all selected customers
                        checkboxes.forEach(c => {
                            if (c.checked) {
                                var item = $(c).val();

                                axios.delete("authors/" + item, {author: item})
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
                                                confirmButtonText: "Ok!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                }
                                            });
                                            //toastr.error(dataMessage);
                                        }
                                    })
                                    .then(function () {
                                        Swal.fire({
                                            text: "All selected records are deleted!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, understood!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function () {
                                            toggleToolbars(); // Detect checked checkboxes
                                            initToggleToolbar(); // Re-init toolbar to recalculate checkboxes

                                            window.location.reload();
                                        });
                                    });

                                datatable.row($(c.closest('tbody tr'))).remove().draw();
                            }
                        });

                        // Remove header checked box
                        const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                        headerCheckbox.checked = false;

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "Selected customers was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            });
        }

        // Toggle toolbars
        const toggleToolbars = () => {
            // Select refreshed checkbox DOM elements
            const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

            // Detect checkboxes state & count
            let checkedState = false;
            let count = 0;

            // Count checked boxes
            allCheckboxes.forEach(c => {
                if (c.checked) {
                    checkedState = true;
                    count++;
                }
            });

            // Toggle toolbars
            if (checkedState) {
                selectedCount.innerHTML = count;
                toolbarBase.classList.add('d-none');
                toolbarSelected.classList.remove('d-none');
            } else {
                toolbarBase.classList.remove('d-none');
                toolbarSelected.classList.add('d-none');
            }
        }


        return {
            // Public functions
            init: function () {

                if (!table) return;

                initCategoryTable();
                initToggleToolbar();
                handleSearchDatatable();
                //handleResetForm();
                handleDeleteRows();
                //handleFilterDatatable();

            }
        }
    }else{
        return {
            init: function () {
                if (!table) return;
            }
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    RoomList.init();
});

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
