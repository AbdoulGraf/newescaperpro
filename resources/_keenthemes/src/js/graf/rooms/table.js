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
