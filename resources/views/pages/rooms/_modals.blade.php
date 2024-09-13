<!--begin::Modal - Add Room-->
<div class="modal fade" id="kt_modal_add_room" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add New Room</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
                        </svg>
                    </span>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_form_room" class="form" action="{{ route('admin.rooms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf



                    <div class="row">


                    <!-- Input fields for room details -->
                    <div class="col-md-6 mb-10">
                        <label for="title" class="required form-label">Room Title</label>
                        <input type="text" name="title" class="form-control form-control-solid" placeholder="Enter room title"/>
                    </div>
                    <div class=" col-md-6 mb-10">
                        <label for="slug" class="required form-label">Slug</label>
                        <input type="text" name="slug" class="form-control form-control-solid" placeholder="Enter unique slug"/>
                    </div>
                    <div class=" col-md-6 mb-10">
                        <label for="seo_title" class="form-label">SEO Title</label>
                        <input type="text" name="seo_title" class="form-control form-control-solid" placeholder="Enter SEO title"/>
                    </div>
                    <div class=" col-md-6 mb-10">
                        <label for="seo_keywords" class="form-label">SEO Keywords</label>
                        <input type="text" name="seo_keywords" class="form-control form-control-solid" placeholder="Enter SEO keywords"/>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label for="seo_description" class="form-label">SEO Description</label>
                        <textarea name="seo_description" class="form-control form-control-solid" rows="3" placeholder="Enter SEO description"></textarea>
                    </div>
                    <div class=" col-md-6 mb-10">
                        <label for="place_id" class="required form-label">Place</label>
                        <select name="place_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select a place">
                            <option></option>
                            @foreach ($places as $place)
                            <option value="{{ $place->id }}">{{ $place->title }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 mb-10">
                        <label for="order" class="required form-label">Order</label>
                        <input type="number" name="order" class="form-control form-control-solid" placeholder="Enter display order" min="1"/>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label for="status" class="form-label">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status" name="status">
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                    </div>

                    <!-- Input for Description -->
<div class="mb-10">
    <div class="d-flex flex-column mb-8">
        <!--begin::Input group-->
        <div class="form-floating">
            <textarea name="description" data-kt-autosize="true" class="tox-target"
                id="floatingContentDescription"></textarea>
        </div>
        <!--end::Input group-->
    </div>
</div>



<div class="col-12">

   <div class="row">

    <div class="col-md-12 fv-row">
        <!--begin::Input group-->
        <div class="form-floating mb-7">
            <div class="d-flex flex-column ps-5 flex-start">
                <span class="text-black">Banner Picture | JPG - 5:8 | (2000x1500px)</span>
            </div>
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true"
                 style="background-image: url({{ asset($room->banner ?? 'assets/media/logos/favicon.png') }}) !important; background-repeat: no-repeat; background-size: cover; background-position: center; background-color: whitesmoke;">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper h-150px w-375px bgi-position-center"
                     style="background-image: url({{ asset($room->banner ?? 'assets/media/logos/favicon.png') }});background-repeat: no-repeat;background-size: cover;background-position: center; background-color: whitesmoke;"></div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="banner" accept=".png, .jpg, .jpeg, .webp"/>
                    <input type="hidden" name="banner_remove"/>
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

                <!--begin::Cancel button-->
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel">
                <i class="bi bi-x fs-2"></i>
            </span>
                <!--end::Cancel button-->

                <!--begin::Remove button-->
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove">
                <i class="bi bi-x fs-2"></i>
            </span>
                <!--end::Remove button-->
            </div>
            <!--end::Image input-->
        </div>
        <!--end::Input group-->
    </div>

    <div class="col-md-12 fv-row">
        <!--begin::Input group-->
        <div class="form-floating mb-7">
            <div class="d-flex flex-column ps-5 flex-start">
                <span class="text-black">Title Picture | JPG - 5:8 | (1000x600px)</span>
            </div>
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true"
                 style="background-image: url({{ asset($room->text_picture ?? 'assets/media/logos/favicon.png') }}); background-repeat: no-repeat; background-size: cover; background-position: center; background-color: whitesmoke;">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper h-150px w-375px bgi-position-center"
                     style="background-image: url({{ asset($room->text_picture ?? 'assets/media/logos/favicon.png') }});background-repeat: no-repeat;background-size: cover;background-position: center; background-color: whitesmoke;"></div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                    data-bs-dismiss="click" title="Görseli Değiştir">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="text_picture" accept=".png, .jpg, .jpeg, .webp"/>
                    <input type="hidden" name="text_picture_remove"/>
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

                <!--begin::Cancel button-->
                <span
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                    data-bs-dismiss="click" title="İptal Et">
            <i class="bi bi-x fs-2"></i>
        </span>
                <!--end::Cancel button-->

                <!--begin::Remove button-->
                <span
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                    data-bs-dismiss="click" title="Görseli Kaldır">
            <i class="bi bi-x fs-2"></i>
        </span>
                <!--end::Remove button-->
            </div>
            <!--end::Image input-->
        </div>
        <!--end::Input group-->
    </div>
    <!--begin::Col-->
    <div class="col-md-4 fv-row">
        <!--begin::Input group-->
        <div class="form-floating mb-7">
            <div class="d-flex flex-column ps-5 flex-start">
                <span class="text-black">Poster Image</span>
                <span class="text-black">JPG - 10:16</span>
                <span class="text-black">(750x1000px)</span>
            </div>
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset($room->poster ?? 'assets/media/logos/favicon.png') }})">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper h-300px w-200px bgi-position-center" style="background-image: url({{ asset($room->poster ?? 'assets/media/logos/favicon.png') }})"> </div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change">
                    <i class="bi bi-pencil-fill fs-7"></i>

                    <!--begin::Inputs-->
                    <input type="file" name="poster" accept=".png, .jpg, .jpeg, .webp"/>
                    <input type="hidden" name="poster_remove"/>
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

                <!--begin::Cancel button-->
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel">
                <i class="bi bi-x fs-2"></i>
            </span>
                <!--end::Cancel button-->

                <!--begin::Remove button-->
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove">
                <i class="bi bi-x fs-2"></i>
            </span>
                <!--end::Remove button-->
            </div>
            <!--end::Image input-->
        </div>
        <!--end::Input group-->
    </div>



   </div>
    <!--begin::Col-->
</div>



                    </div>

                    <!-- Images upload inputs -->
                    <!-- Add image inputs similar to the update form structure, adjusting for file uploads -->
                    <!-- Submit and cancel buttons -->
                    <div class="text-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->

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
<!--end::Modal - Add Room-->


