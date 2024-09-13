<!--begin::Modal - Create FAQ-->
<div class="modal fade" id="kt_modal_create_faq" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create FAQ</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <!-- SVG icon content -->
                    </span>
                </div>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <form class="form" id="create_faq_form" action="{{ route('admin.faq.store') }}" method="POST">
                    @csrf
                    <!--begin::Place input-->
                    <div class="mb-7">
                        <label for="place" class="form-label">Place</label>
                        <select class="form-select" id="place" name="place_id" required>
                            <option value="">Select Place</option>
                            <option value="Dubai">Dubai</option>
                            <option value="Abu Dhabi">Abu Dhabi</option>
                        </select>
                    </div>


                    <div class="mb-7">
                        <label for="room" class="form-label">Room</label>
                        <select class="form-select" id="room" name="room" required>
                            <option value="">Select Room</option>
                            @foreach ($roomData as $room)
                                <option value="{{ $room['id'] }}">{{ $room['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Place input-->
                    <!--begin::Question input-->
                    <div class="mb-7">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Enter question" required>
                    </div>
                    <!--end::Question input-->
                    <!--begin::Answer input-->
                    <div class="mb-7">
                        <label for="answer" class="form-label">Answer</label>
                        <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" required>
                    </div>
                    <!--end::Answer input-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Create FAQ-->
