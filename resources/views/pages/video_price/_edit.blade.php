<x-default-layout>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 col">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!-- You can add a breadcrumb or page title here -->
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                <!-- The form id="contentForm" is referenced here to link the button outside the form -->
                <button type="submit" class="btn btn-warning w-100" form="contentForm">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
                        <!-- SVG icon content -->
                    </span>
                    Update Price
                </button>
                <!--end::Primary button-->
            </div>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Form start -->
                    <form method="post" id="contentForm" enctype="multipart/form-data" action="{{ route('admin.video_price.update', $record->id) }}">
                        @csrf
                        @method('PATCH')

                        <!-- Video Price Title -->
                        <div class="mb-7">
                            <label for="title" class="form-label">Video Price Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $record->title) }}" required>
                        </div>

                        <!-- Video Price Description -->
                        <div class="mb-7">
                            <label for="description" class="form-label">Video Price Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{ old('description', $record->description) }}</textarea>
                        </div>

                        <!-- Price -->
                        <div class="mb-7">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price', $record->price) }}" required placeholder="0.00">
                        </div>

                        <!-- Place -->
                        <div class="mb-7">
                            <label for="place_id" class="form-label">Place</label>
                            <select name="place_id" id="place_id" class="form-select" required>
                                <option value="">Select Place</option>
                                <option value="1" @if(old('place_id', $record->place_id) == 1) selected @endif>Dubai</option>
                                <option value="2" @if(old('place_id', $record->place_id) == 2) selected @endif>Abu Dhabi</option>
                            </select>
                        </div>

                        <!-- Additional fields like 'Room' and 'Player' can be similarly updated -->

                        <!-- Actions -->
                        <div class="text-center">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
                <!--end::Card body-->
            </div

            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

</x-default-layout>
    