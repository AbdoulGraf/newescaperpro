<x-default-layout>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 col">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3"></div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                <button type="submit" class="btn btn-warning w-100" form="contentForm">
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                  transform="rotate(-90 11.364 20.364)" fill="currentColor"/>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"/>
                        </svg>
                    </span>
                    UPDATE Socail Media
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
                          action="{{ route('admin.social.update', $record->id) }}">
                        @csrf @method('patch')

                        <div class="col-12 float-start px-3 py-5">
                            <!--begin::Input group-->
                            <div class="row g-9">
                                <!--begin::Col Platform-->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <select name="platform" id="platform" class="form-select form-select-solid" required>
                                            <option value="">Select Platform</option>

                                            <option value="instagram" {{ $record->platform == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                            <option value="youtube" {{ $record->platform == 'youtube' ? 'selected' : '' }}>Youtube</option>
                                            <option value="snapchat" {{ $record->platform == 'snapchat' ? 'selected' : '' }}>SnapChat</option>
                                            <option value="whatsap" {{ $record->platform == 'whatsap' ? 'selected' : '' }}>Whatsap</option>
                                            <option value="tiktok" {{ $record->platform == 'tiktok' ? 'selected' : '' }}>TikTok</option>
                                        </select>
                                        <label class="required" for="platform">Platform</label>
                                    </div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col Place-->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <select name="place" id="place" class="form-select form-select-solid" required>
                                            <option value="">Select Place</option>
                                            <option value="dubai" {{ $record->place == 'dubai' ? 'selected' : '' }}>Dubai</option>
                                            <option value="abu_dhabi" {{ $record->place == 'abu_dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                        </select>
                                        <label class="required" for="place">Place</label>
                                    </div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col Username-->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <input name="username" type="text" class="form-control form-control-solid" id="username" value="{{ $record->username }}" required/>
                                        <label class="required" for="username">Username</label>
                                    </div>
                                </div>
                                <!--end::Col-->
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
</x-default-layout>
