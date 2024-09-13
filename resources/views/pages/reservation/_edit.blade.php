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
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Update Reservation
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
                        action="{{ route('admin.reservations.update', $reservation->id) }}">
                        @csrf @method('patch')
                        @if ($reservation->clientInfo)
                            <input type="hidden" name="client[id]" value="{{ $reservation->clientInfo->id }}">
                        @else
                            <!-- Handle the case where clientInfo is null. This could be not rendering the input, or setting a default/placeholder value -->
                            <!-- Example: Setting a default value (you might need to adjust this based on your application's logic) -->
                            <input type="hidden" name="client[id]" value="default_value">
                        @endif

                        <div class="col-12 float-start px-3 py-5">
                            <!--begin::Input group-->
                            <div class="row g-9">
                                <!--begin::Col First Name -->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        @if ($client)
                                            <input name="client[first_name]" type="text"
                                                class="form-control form-control-solid" id="first_name"
                                                value="{{ $client->first_name }}" required />
                                        @else
                                            <input name="client[first_name]" type="text"
                                                class="form-control form-control-solid" id="first_name" value=""
                                                placeholder="Enter first name" required />
                                        @endif

                                        <label class="required " for="first_name">First Name</label>
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col Last Name -->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        @if ($client)
                                            <input name="client[last_name]" type="text"
                                                class="form-control form-control-solid" id="last_name"
                                                value="{{ $client->last_name }}" required />
                                        @else
                                            <!-- Handle the case where $client is null -->
                                            <input name="client[last_name]" type="text"
                                                class="form-control form-control-solid" id="last_name" value=""
                                                placeholder="Enter last name" required />
                                        @endif

                                        <label class="required " for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col Email-->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">
                                        @if ($client)
                                            <input name="client[email]" type="text"
                                                class="form-control form-control-solid" id="email"
                                                value="{{ $client->email }}" required />
                                        @else
                                            <input name="client[email]" type="text"
                                                class="form-control form-control-solid" id="email" value=""
                                                placeholder="Enter email" required />
                                        @endif

                                        <label class="required " for="email">Email</label>
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col Phone-->
                                <div class="col-md-3 fv-row">
                                    <div class="form-floating mb-7 fv-row">

                                        @if ($client)
                                            <input name="client[phone]" type="text"
                                                class="form-control form-control-solid" id="phone"
                                                value="{{ $client->phone }}" required />
                                        @else
                                            <input name="client[phone]" type="text"
                                                class="form-control form-control-solid" id="phone" value=""
                                                placeholder="Enter phone number" required />
                                        @endif


                                        <label class="required " for="phone">Phone</label>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->


                            <!--begin::Input group-->
                            <div class="row g-9">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <div class="form-floating mb-7 fv-row">
                                                <select name="place_id" id="place_id"
                                                    class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Place Select" data-allow-clear="true" required>
                                                    <option></option>
                                                    @foreach ($places as $place)
                                                        <option value="{{ $place->id }}"
                                                            @selected($place->id == $reservation->place_id)>{{ $place->title }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="required " for="place_id">Place</label>
                                            </div>
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="form-floating mb-7">
                                                <div class="form-floating mb-7 fv-row">
                                                    <select name="room_id" id="room_id"
                                                        class="form-select form-select-solid" data-control="select2"
                                                        data-placeholder="Room Select" data-allow-clear="true"
                                                        required>
                                                        <option></option>
                                                        @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}"
                                                                @selected(old('room_id') == $room->id || $room->id === $reservation->room_id)>{{ $room->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label class="required " for="room_id">Room</label>
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="form-floating mb-7 fv-row">
                                                <input value="{{ $reservation->reservation_date }}"
                                                    name="reservation_date" class="form-control form-control-solid"
                                                    placeholder="Pick a date" id="reservation_date" />
                                                <label class="required " for="reservation_date">Reservation
                                                    Date</label>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="form-floating mb-7 fv-row">
                                                <select name="hour_id" class="form-select form-select-solid"
                                                    data-control="select2" data-placeholder="Hour Select"
                                                    data-allow-clear="true" required>
                                                    <option></option>
                                                    @foreach ($hours->where('room_id', $reservation->room_id) as $hour)
                                                        <option value="{{ $hour->id }}"
                                                            @selected(old('hour_id') == $hour->id || $hour->id === $reservation->hour_id)>
                                                            {{ $hour->start->format('H:i:s') }}
                                                            - {{ $hour->end->format('H:i:s') }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="required " for="reservation_date">Reservation
                                                    Hour</label>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->



                            <!--begin::Input group-->
                            <div class="row g-9">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <div class="form-floating mb-7 fv-row">
                                                <select name="players" id="players"
                                                    class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Player Select" data-allow-clear="true" required>
                                                    <option></option>
                                                    @for ($i = 2; $i <= 11; $i++)
                                                        <option value="{{ $i }}"
                                                            @selected($i == $reservation->players)> {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <label class="required " for="players">Players</label>
                                            </div>
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="form-floating mb-7">
                                                <div class="form-floating mb-7 fv-row">

                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">

                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">

                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->


                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8">
                                <!--begin::Input group-->
                                <div class="form-floating">
                                    <textarea name="comment" class="form-control form-control-solid kt_autosize min-h-100px" maxlength="500"
                                        data-kt-autosize="true" id="floatingContentDescription">{!! $reservation->comment !!}</textarea>
                                    <label for="floatingContentDescription">Comment</label>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->
                            <div class="row g-9">
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="text" class="form-control form-control-solid" id="promotion"
                                            value="{{ $reservation->promotion_code }}" />
                                        <label for="promotion"> Promotion </label>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="text" class="form-control form-control-solid" id="discount"
                                            value="{{ $reservation->discount }}" />
                                        <label for="discount">Discount</label>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="text" class="form-control form-control-solid" id="created_at"
                                            value="{{ $reservation->payment_method ? 'Website' : 'Online' }}"
                                            disabled />
                                        <label for="created_at">Payment Method</label>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="text" class="form-control form-control-solid"
                                            id="payment_info_id" value="{{ $reservation->payment_info_id }}" />
                                        <label for="payment_info_id">Payment ID</label>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row g-9 mb-8">
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    Method:
                                    {{ $reservation->payment_method == 1 ? 'Upon Arrival' : 'Online Payment' }}
                                </div>
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    Per Price:
                                    @isset($reservation->paymentInfo->amount)
                                        {{ $reservation->paymentInfo->amount / 100 }}
                                    @else
                                        @php
                                            $priceRecord = $reservation->price
                                                ::where([
                                                    'place_id' => $reservation->place_id,
                                                    'room_id' => $reservation->room_id,
                                                    'player' => $reservation->players,
                                                ])
                                                ->first();
                                        @endphp

                                        {{ $priceRecord ? $priceRecord->price . ' AED' : 'Price not available' }}
                                    @endisset

                                </div>
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">

                                    @php
                                        $priceRecord = $reservation->price
                                            ::where([
                                                'place_id' => $reservation->place_id,
                                                'room_id' => $reservation->room_id,
                                                'player' => $reservation->players,
                                            ])
                                            ->first();
                                    @endphp

                                    Total:
                                    @if ($priceRecord)
                                        {{ $reservation->players * $priceRecord->price }} AED
                                    @else
                                        Price not available
                                    @endif



                                </div>
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <label
                                        class="form-check form-switch form-check-custom form-check-danger form-check-solid">
                                        <input name="status" class="form-check-input" type="checkbox"
                                            value="{{ $reservation->status }}" @checked($reservation->status) />
                                        <span class="form-check-label status">Status</span>
                                    </label>
                                </div>

                            </div>
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
        <script>
            $(function() {
                $("#reservation_date").flatpickr({
                    minDate: "2023-01",
                    altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d",

                });
            });
        </script>
    @endsection
</x-default-layout>
