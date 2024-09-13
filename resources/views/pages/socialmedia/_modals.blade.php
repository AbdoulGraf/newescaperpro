<!--begin::Modal - Create Reservation-->
<div class="modal fade" id="kt_modal_create_reservation" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Create Reservation</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <!--begin::Form-->
                <form class="form" id="create_reservation_form" action="{{ route('admin.social.create') }}">
                    @csrf
                    <!--begin::Platform input-->
                    <div class="mb-7">
                        <label for="platform" class="form-label">Platform</label>
                        <select class="form-select" id="platform" name="platform" required>
                            <option value="">Select Platform</option>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">Youtube</option>
                            <option value="snapchat">SnapChat</option>
                            <option value="whatsap">Whatsap</option>
                            <option value="tiktok">TikTok</option>
                        </select>
                    </div>
                    <!--end::Platform input-->
                    <!--begin::Place input-->
                    <div class="mb-7">
                        <label for="place" class="form-label">Place</label>
                        <select class="form-select" id="place" name="place" required>
                            <option value="">Select Place</option>
                            <option value="dubai">Dubai</option>
                            <option value="abu_dhabi">Abu Dhabi</option>
                        </select>
                    </div>
                    <!--end::Place input-->
                    <!--begin::Username input-->
                    <div class="mb-7">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                    </div>
                    <!--end::Username input-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create Reservation-->

<script>
    // Add event listener for form submission
    document.getElementById('create_reservation_form').addEventListener('submit', function(event) {
        // Check if form is valid
        if (!this.checkValidity()) {
            // If form is not valid, prevent default form submission
            event.preventDefault();
            event.stopPropagation();
            // Show error message
            this.classList.add('was-validated');
        }
    });
</script>
