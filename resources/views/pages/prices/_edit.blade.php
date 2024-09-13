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
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"/>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
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


                    <form method="post" id="contentForm" enctype="multipart/form-data"
                          action="{{ route('admin.prices.update', $record->id) }}">
                        @csrf @method('patch')

                        <div class="col-12 float-start px-3 py-5">
                            <!--begin::Input group-->
                            <div class="row g-9">

                                <!--begin::Col Place-->

                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <select name="place_id" id="place_id" class="form-select form-select-solid" required>
                                            <option value="">Select Place</option>
                                            <option value="1" @if($record->place_id == 1) selected @endif>Dubai</option>
                                            <option value="2" @if($record->place_id == 2) selected @endif>Abu Dhabi</option>
                                        </select>
                                        <label class="required" for="place_id">Place</label>
                                    </div>
                                </div>


                                {{-- <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <select name="place_id" id="place_id"
                                                class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="Place Select" data-allow-clear="true">
                                            <option></option>
                                            @foreach($places as $place)
                                                <option value="{{ $place->id }}" @if($record->place_id == $place->id) selected @endif>{{ $place->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="required " for="place_id">Place</label>
                                    </div>
                                </div> --}}
                                <!--end::Col-->

                                <!--begin::Col Room-->

                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <select name="room_id" id="room_id" class="form-select form-select-solid" required>
                                            <option value="">Select Room</option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}" @if($record->room_id == $room->id) selected @endif>{{ $room->title }}</option>
                                            @endforeach
                                        </select>
                                        <label class="required" for="room_id">Room</label>
                                    </div>
                                </div>

                                {{-- <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <select name="room_id" id="room_id"
                                                class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="Room Select" data-allow-clear="true">
                                            <option></option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}" @if($record->room_id == $room->id) selected @endif>{{ $room->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="required " for="room_id">Room</label>
                                    </div>
                                </div> --}}
                                <!--end::Col-->

                                <!--begin::Col Player -->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <input name="player" type="text"
                                               class="form-control form-control-solid" id="player"
                                               value="{{ $record->player }}"/>
                                        <label class="required " for="player">Player</label>
                                    </div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col Price -->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        <input name="price" type="text"
                                               class="form-control form-control-solid" id="price"
                                               value="{{ $record->price }}" required/>
                                        <label class="required " for="price">Price</label>
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
