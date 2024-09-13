<x-default-layout>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 col">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3"></div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                <button type="submit" class="btn btn-warning w-100" form="contentForm">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                  transform="rotate(-90 11.364 20.364)" fill="currentColor"/>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Update Blog
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

                    <form method="post" id="contentForm" enctype="multipart/form-data"
                          action="{{ route('admin.blog.update', $record->id) }}">
                        @csrf @method('patch')

                        <div class="col-12 float-start px-3 py-5">
                            <!--begin::Input group-->
                            <div class="row g-9">
                                <!--begin::Title input-->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <input name="title" type="text" class="form-control form-control-solid"
                                               id="title" value="{{ $record->title }}" required/>
                                        <label class="required" for="title">Title</label>
                                    </div>
                                </div>
                                <!--end::Title input-->

                                <!--begin::Placefor select-->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <select name="placefor" id="placefor" class="form-select form-select-solid"
                                                data-control="select2" data-placeholder="Select Place"
                                                data-allow-clear="true" required>
                                            <option value="dubai" {{ $record->placefor == 'dubai' ? 'selected' : '' }}>
                                                Dubai
                                            </option>
                                            <option value="abudhabi" {{ $record->placefor == 'abudhabi' ? 'selected' : '' }}>
                                                Abu Dhabi
                                            </option>
                                        </select>
                                        <label class="required" for="placefor">Placefor</label>
                                    </div>
                                </div>
                                <!--end::Placefor select-->


                                <div class="mb-7">
                                    <label for="blog_img" class="form-label">Blog Image (optional):</label>
                                    @if($record->blog_img)
                                        <img src="{{ Storage::url($record->blog_img) }}" alt="Blog Image" class="img-thumbnail mb-2" style="max-width: 200px;">
                                    @endif
                                    <input type="file" class="form-control" id="blog_img" name="blog_img">
                                </div>

                                <!--begin::Content textarea-->
                                <div class="d-flex flex-column mb-8">
                                    <!--begin::Input group-->
                                    <div class="form-floating">
                                        <textarea name="description" data-kt-autosize="true" class="tox-target form-control form-control-solid" id="floatingContentDescription">{{ $record->content }}</textarea>
                                        <label for="floatingContentDescription">Content</label>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Content textarea-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </form>

                    <div class="overlay-layer card-rounded bg-dark bg-opacity-20 d-none">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

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
</x-default-layout>
