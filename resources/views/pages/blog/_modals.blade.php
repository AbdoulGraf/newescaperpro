<!--begin::Modal - Create Blog-->
<div class="modal fade" id="kt_modal_create_blog" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Create Blog</h2>
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
                <form class="form" id="create_blog_form" action="{{ route('admin.blog.store') }}" novalidate method="POST"  enctype="multipart/form-data">
                    @csrf
                    <!--begin::Title input-->
                    <div class="mb-7">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                    </div>
                    <!--end::Title input-->
                    <!--begin::Place input-->
                    <div class="mb-7">
                        <label for="placefor" class="form-label">Place For</label>
                        <select class="form-select" id="placefor" name="placefor" required>
                            <option value="">Select Place For</option>
                            <option value="dubai">Dubai</option>
                            <option value="abu_dhabi">Abu Dhabi</option>
                        </select>
                    </div>
                    <!--end::Place input-->
                    <!--begin::Content textarea-->
                    <div class="d-flex flex-column mb-8">
                        <!--begin::Input group-->
                        <div class="form-floating">
                            <textarea name="content" data-kt-autosize="true" class="form-control" id="floatingContentDescription"></textarea>
                        </div>
                        <!--end::Input group-->
                    </div>


                    <div class="mb-7">
                        <label for="blog_img" class="form-label">Blog Image</label>
                        <input type="file" class="form-control" id="blog_img" name="blog_img" accept="image/*">
                    </div>
                    <!--end::Content textarea-->
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
<!--end::Modal - Create Blog-->
