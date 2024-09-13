<!--begin::Modal - Create Storyline-->
<div class="modal fade" id="kt_modal_create_storyline" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create Storyline</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <form class="form" id="create_storyline_form" action="{{ route('admin.storyline.store') }}" method="POST">
                    @csrf
                    <!-- Header input -->
                    <div class="mb-7">
                        <label for="header" class="form-label">Header</label>
                        <input type="text" class="form-control" id="header" name="header" placeholder="Enter header" required>
                    </div>

                    <!-- Header Title input -->
                    <div class="mb-7">
                        <label for="header_title" class="form-label">Header Title</label>
                        <input type="text" class="form-control" id="header_title" name="header_title" placeholder="Enter header title" required>
                    </div>

                    <!-- Place select input -->
                    <div class="mb-7">
                        <label for="place" class="form-label">Place</label>
                        <select class="form-select" id="place" name="place_id" required>
                            <option value="">Select Place</option>
                            <option value="Dubai">Dubai</option>
                            <option value="Abu Dhabi">Abu Dhabi</option>
                            <option value="All">All</option>
                        </select>
                    </div>

                    <!-- Room select input -->
                    <div class="mb-7">
                        <label for="room" class="form-label">Room</label>
                        <select class="form-select" id="room" name="room_id" required>
                            <option value="">Select Room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Storyline Description textarea -->
                    <div class="mb-7">
                        <label for="storyline_description" class="form-label">Storyline Description</label>
                        {{-- <textarea class="form-control" id="storyline_description" name="storyline_description"
                         rows="4" placeholder="Enter storyline description" required>

                        </textarea> --}}

                        <textarea name="storyline_description" data-kt-autosize="true" class="tox-target"
                        id="floatingContentDescription"></textarea>


                    </div>

                    <!-- Actions -->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @section('scripts')
    <!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-inline.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-balloon.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-balloon-block.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-document.bundle.js') }}"></script>

    <script>

        $(document).ready(function () {
            ClassicEditor.create(document.querySelector('#floatingContentDescription'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });

    </script>
@endsection




</div>
<!--end::Modal - Create Storyline-->




