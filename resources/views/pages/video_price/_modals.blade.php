<!--begin::Modal - Create Price-->
<div class="modal fade" id="kt_modal_create_price" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Add New Video Price</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <!-- SVG for close icon -->
                    </span>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <!--begin::Form-->
                <form class="form" id="create_video_price_form" action="{{ route('admin.video_price.store') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <!-- Video Price Title input -->
                    <div class="mb-7">
                        <label for="title" class="form-label">Video Price Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <!-- Video Price Description input -->
                    <div class="mb-7">
                        <label for="description" class="form-label">Video Price Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <!-- Video Price input -->
                    <div class="mb-7">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required min="0" placeholder="0.00">
                        <small class="form-text text-muted">Enter the price in the format 0.00</small>
                    </div>
                    
                    <!-- Place For input -->
                    <div class="mb-7">
                        <label for="placefor" class="form-label">Place For</label>
                        <select class="form-select" id="placefor" name="placefor" required>
                            <option value="">Select Place</option>
                            <option value="1">Dubai</option>
                            <option value="2">Abu Dhabi</option>
                        </select>
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
