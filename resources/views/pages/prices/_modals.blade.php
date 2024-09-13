<!--begin::Modal - Create Price-->
<div class="modal fade" id="kt_modal_create_price" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Add New Price</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">

                <!--begin::Form-->
                <form class="form" id="create_reservation_form" action="{{ route('admin.prices.store') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <!-- Room input -->
                    <div class="mb-7">
                        <label for="room" class="form-label">Room</label>
                        <select class="form-select" id="room" name="room" required>
                            <option value="">Select Room</option>
                            @foreach ($roomData as $room)
                                <option value="{{ $room['id'] }}">{{ $room['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Place input -->
                    <div class="mb-7">
                        <label for="place" class="form-label">Place</label>
                        <select class="form-select" id="place" name="place" required>
                            <option value="">Select Place</option>
                            <option value="1">Dubai</option>
                            <option value="2">Abu Dhabi</option>
                        </select>
                    </div>
                    <!-- Player input -->
                    <div class="mb-7">
                        <label for="player" class="form-label">Player Number</label>
                        <input type="number" class="form-control" id="player" name="player" required>
                    </div>
                    <!-- Price input -->
                    <div class="mb-7">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" pattern="\d+(\.\d{2})?" class="form-control" id="price" name="price" required>
                        <small class="form-text text-muted">Enter the price in the format 0.00</small>
                    </div>
                    
                    <!-- Actions -->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
                <!--end::Form-->

            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create Price-->
