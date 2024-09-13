<!--begin::Modal - Create Promo Code-->
<div class="modal fade" id="kt_modal_create_promocode" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create New Promo Code</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!-- SVG close icon -->
                </div>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <form class="form" id="create_promocode_form" action="{{ route('admin.promocode.store') }}" method="POST">
                    @csrf
                    <!-- Store select -->
                    <div class="mb-7">
                        <label for="store" class="form-label">Store</label>
                        <select class="form-select" id="store" name="store" required>
                            <option value="">Select Store</option>
                            <option value="Dubai">Dubai</option>
                            <option value="Abu Dhabi">Abu Dhabi</option>
                            <option value="All">All</option>
                        </select>
                    </div>
                    <!-- Promo code input -->
                    <div class="mb-7">
                        <label for="promocode" class="form-label">Promo Code</label>
                        <input type="text" class="form-control" id="promocode" name="promocode" placeholder="Enter promo code" required>
                    </div>
                    <!-- Discount input -->
                    <div class="mb-7">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input type="number" class="form-control" id="discount" name="discount" placeholder="Enter discount percentage" required>
                    </div>
                    <!-- Start date input -->
                    <div class="mb-7">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <!-- Validity period input -->
                    <div class="mb-7">
                        <label for="validity_period" class="form-label">Validity Period (days)</label>
                        <input type="number" class="form-control" id="validity_period" name="validity_period" placeholder="Enter validity period in days" required>
                    </div>
                    <!-- Actions -->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Create Promo Code-->
