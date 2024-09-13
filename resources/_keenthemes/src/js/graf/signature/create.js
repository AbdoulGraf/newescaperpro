"use strict";

// Class definition
var SignatureForm = function () {
    var form;

	var initForm = function(element) {

		var reservation_date = $(form.querySelector('[name="reservation_date"]'));
		reservation_date.flatpickr({
			enableTime: false,
			dateFormat: "d, M Y",
		});

	}

	// Public methods
	return {
		init: function(element) {
            form = document.querySelector('#kt_signature_form');
            initForm();
        }
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    SignatureForm.init();
});
