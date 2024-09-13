<x-default-layout>
    @section('styles')
        <style>
            #kt_table_filter label {
                display: none;
                visibility: hidden
            }

            td.pg-actions {
                display: flex !important;
            }


            .process-btn {
                background-color: #910613;

                border: none;

                color: white;

                padding: 5px 18px;

                text-align: center;

                text-decoration: none;

                display: inline-block;

                font-size: 16px;

                margin: 4px 2px;

                transition-duration: 0.4s;

                cursor: pointer;

                border-radius: 5px;

            }

            .process-btn:hover {
                background-color: white;

                color: #910613;

                border: 2px solid #910613;

            }
        </style>
    @endsection
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 col">
        <!--begin::Toolbar container-->
        {{-- @include('pages.reservation._toolbar') --}}
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->


    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul
            class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2 me-10 justify-content-end">

            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                    href="#published_contents">Reservations</a>
            </li>
            <!--end:::Tab item-->
            @hasanyrole('root|admin')


            @endhasanyrole

            @hasanyrole('root|admin')@endhasanyrole
        </ul>
        <!--end:::Tabs-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="published_contents" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush card-dashed">
                        <!--begin::Card body-->
                        <div class="card-body pt-10">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <table id="reservation_yearly" class="table table-striped border rounded gy-5 gs-7">

                                @php
                                    $currentPath = request()->path();
                                    $isDubai = Str::contains($currentPath, 'dubai');
                                    $isAbuDhabi = Str::contains($currentPath, 'abudhabi');
                                    $isToday = Str::contains($currentPath, 'today');

                                    // Determine place_id based on the URL segment
                                    $placeId = $isDubai ? 1 : ($isAbuDhabi ? 2 : null);

                                    // Assuming $rooms is a Laravel Collection
                                    // Filter rooms based on place_id
                                    $filteredRooms = $rooms->filter(function ($room) use ($placeId) {
                                        return is_null($placeId) ? true : $room->place_id == $placeId;
                                    });

                                    $roomTitles = $filteredRooms->pluck('title')->unique();

                                    $roomTitlesWithIds = $filteredRooms
                                        ->map(function ($room) {
                                            return [
                                                'title' => $room->title,
                                                'room_id' => $room->id,
                                            ];
                                        })
                                        ->unique('title')
                                        ->values();

                                    // dd($groupedReservations);

                                @endphp


                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        @foreach ($roomTitles as $title)
                                            <th>{{ $title }}</th>
                                        @endforeach
                                        <th>Processes</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php

                                        $sortedDates = $groupedReservations->map(function ($days) {
                                            return $days->sortByDesc(function ($dayGroup, $key) {
                                                // Convert 'dd-mm-yyyy' to 'yyyy-mm-dd' for correct sorting
                                                return Carbon\Carbon::createFromFormat('d-m-Y', $key)->format('Y-m-d');
                                            });
                                        });

                                    @endphp



                                    @foreach ($sortedDates as $month => $days)
                                        @foreach ($days as $date => $reservationsByDate)
                                            <tr>
                                                <td>{{ $date }}</td>
                                                @foreach ($roomTitlesWithIds as $room)
                                                    @php
                                                        $count = $reservationsByDate->reduce(function (
                                                            $carry,
                                                            $reservation,
                                                        ) use ($room) {
                                                            return $carry +
                                                                ($reservation->room_id == $room['room_id'] ? 1 : 0);
                                                        }, 0);

                                                        $displayCount = $count > 0 ? $count : '';
                                                    @endphp
                                                    <td>{{ $displayCount }}</td> <!-- Display count for the room -->
                                                @endforeach

                                                @php
                                                    $basePath = request()->is('*/dubai/*') ? 'dubai' : 'abudhabi';
                                                    // No need to reformat $date as it's already in 'dd-mm-yyyy' format based on your setup
                                                @endphp

                                                <td>
                                                    <button class="process-btn" data-basepath="{{ $basePath }}"
                                                        data-date="{{ $date }}"
                                                        onclick="redirectToDailyList(this)" style="color:#fff">
                                                        <i class="fas fa-arrow-circle-right"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach


                                </tbody>


                            </table>

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                </div>
            </div>
            <!--end::Tab pane-->

            @hasanyrole('root|admin')@endhasanyrole
            <div class="tab-pane fade" id="deleted_contents" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <div class="card card-flush card-dashed">
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            @include('pages.reservation._archive_table')
                            <!--end::Table-->
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!--end::Main column-->
    @include('pages.reservation._modals')

    @section('scripts')
        <script>
            $("#reservation_yearly").DataTable({
                responsive: true
            });
            $("#reservation_monthly").DataTable({
                responsive: true
            });
            $("#reservation_daily").DataTable({
                responsive: true
            });




            var input = document.getElementById('playerNum');

            input.addEventListener('input', function(e) {
                // Parse the input value to integer
                var num = parseInt(e.target.value, 10);

                // Check if the number is within 1 and 11, if not, reset the input
                if (isNaN(num) || num < 1 || num > 11) {
                    e.target.value = "";
                    alert("Please enter a number between 1 and 11.");
                } else {
                    // Remove leading zeros
                    e.target.value = num;
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $('input[name="room_id"]').on('change', function() {
                    sessionStorage.setItem('room_id', $(this).val());
                    const selectedRoom = localStorage.getItem('room_id');
                    var url = '/admin/hours/' + $(this).val();

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                _token: '{{ csrf_token() }}',
                                room: selectedRoom ?? 1,
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            var hourOptionsHtml = '';
                            data.forEach(hour => {

                                hourOptionsHtml += `
                                    <label class="d-flex flex-stack cursor-pointer mb-5">
                                        <span class="d-flex align-items-center my-2">
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold fs-6">${hour.start} - ${hour.end}</span>
                                            </span>
                                        </span>
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" name="hour_id" value="${hour.id}" />
                                        </span>
                                    </label>
                                `;

                            });
                            document.getElementById('hourOptions').innerHTML = hourOptionsHtml;
                        })
                        .catch(error => console.error('Error:', error));

                });
            });


            function redirectToDailyList(button) {
                var basePath = button.getAttribute('data-basepath');
                var date = button.getAttribute('data-date');

                if (!basePath || !date) {
                    console.log("Button is disabled or data is missing.");
                    // Optionally disable the button or give user feedback
                    button.disabled = true;
                    return;
                }

                // Construct the URL using the basePath and reservation date
                var url = `/admin/reservations/${basePath}/details/${date}/list`;
                // Redirect to the constructed URL
                window.location.href = url;
            }
        </script>
    @endsection
</x-default-layout>
