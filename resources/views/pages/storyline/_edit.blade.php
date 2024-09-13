<x-default-layout>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 col">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!-- Toolbar content skipped for brevity -->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid col">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!-- Form error handling -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Session message handling -->
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    <!--begin::Form-->
                    <form method="POST" id="contentForm" action="{{ route('admin.storyline.update', $storyline->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div class="col-12 float-start px-3 py-5">
                            <!-- Header input -->
                            <div class="mb-7">
                                <label for="header" class="form-label">Header</label>
                                <input type="text" class="form-control" id="header" name="header" placeholder="Enter header" value="{{ $storyline->header }}" required>
                            </div>

                            <!-- Header Title input -->
                            <div class="mb-7">
                                <label for="header_title" class="form-label">Header Title</label>
                                <input type="text" class="form-control" id="header_title" name="header_title" placeholder="Enter header title" value="{{ $storyline->header_title }}" required>
                            </div>

                            <!-- Storyline Description textarea -->
                            <div class="mb-7">
                                <label for="storyline_description" class="form-label">Storyline Description</label>
                                <textarea class="form-control" id="floatingContentDescription" name="storyline_description" rows="4" placeholder="Enter storyline description" required>{{ $storyline->storyline_description }}</textarea>
                            </div>

                            <!-- Place select input -->
                            <div class="mb-7">
                                <label for="place_id" class="form-label">Place</label>
                                <select class="form-select" id="place_id" name="place_id" required>
                                    <option value="">Select Place</option>
                                    <option value="Dubai" @selected($storyline->place_id == 'Dubai')>Dubai</option>
                                    <option value="Abu Dhabi" @selected($storyline->place_id == 'Abu Dhabi')>Abu Dhabi</option>
                                    <option value="All" @selected($storyline->place_id == 'All')>All</option>
                                </select>
                            </div>

                            <!-- Room select input -->
                            <div class="mb-7">
                                <label for="room_id" class="form-label">Room</label>
                                <select class="form-select" id="room_id" name="room_id" required>
                                    <option value="">Select Room</option>
                                    @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" @selected($storyline->room_id == $room->id)>{{ $room->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Actions -->
                            <div class="text-center pt-15">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
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
    <!--end::Content-->
</x-default-layout>
