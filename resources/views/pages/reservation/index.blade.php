<x-default-layout>
    @section('styles')
        <style>
            #kt_table_filter label {
                display: none;
                visibility: hidden;
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
        @include('pages.reservation._toolbar')
    </div>
    <!--end::Toolbar-->

    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul
            class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2 me-10 justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                    href="#published_contents">Reservations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#deleted_contents">Archive</a>
            </li>
        </ul>
        <!--end:::Tabs-->

        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="published_contents" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush card-dashed">
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

                                    if (!$isToday) {
                                        $roomTitles = $filteredRooms->pluck('title')->unique();
                                    }
                                    // $roomTitles = $filteredRooms->pluck('title')->unique();
                                @endphp


                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800">
                                        @if ($isToday)
                                            <th data-priority="1" class="min-w-150px">Record ID</th>
                                            <th data-priority="2" class="min-w-300px">Full Name</th>
                                            <th class="min-w-150px">Room</th>
                                            <th class="min-w-100px">Location</th>
                                            <th class="min-w-150px">Reservation Date</th>
                                            <th class="min-w-150px">Reservation Time</th>
                                            <th class="min-w-200px">Processes</th>
                                            <th class="min-w-300px">Email :</th>
                                            <th class="">Phone : </th>
                                            <th class="">Players : </th>
                                            <th class="">Total Pay : </th>
                                            <th class="">Creation Date : </th>
                                        @else
                                            <th>Date</th>
                                            @foreach ($roomTitles as $title)
                                                <th>{{ $title }}</th>
                                            @endforeach
                                            <th>Processes</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- DataTables will populate the rows via AJAX -->
                                </tbody>
                            </table>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::General options-->
                </div>
            </div>
            <!--end::Tab pane-->

            <div class="tab-pane fade" id="deleted_contents" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <div class="card card-flush card-dashed">
                        <div class="card-body py-4">
                            @include('pages.reservation._archive_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Main column-->

    @include('pages.reservation._modals')

    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#reservation_yearly').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('admin.reservations.dubai') }}', // Replace with the correct route name
                        type: 'GET',
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'client_info',
                            name: 'client_info'
                        },
                        {
                            data: 'room_title',
                            name: 'room_title'
                        },
                        {
                            data: 'place',
                            name: 'place'
                        },
                        {
                            data: 'reservation_date',
                            name: 'reservation_date'
                        },
                        {
                            data: 'reservation_time',
                            name: 'reservation_time'
                        },
                        {
                            data: 'processes',
                            name: 'processes',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'players',
                            name: 'players'
                        },
                        {
                            data: 'total_pay',
                            name: 'total_pay'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                    ],
                    responsive: true,
                    pageLength: 20,
                    lengthChange: false,
                    searching: true,
                    ordering: true,
                });

                // Additional DataTables configurations for other tables
                $('#reservation_monthly').DataTable({
                    responsive: true
                });
                $('#reservation_daily').DataTable({
                    responsive: true
                });

                // Handling player number input validation
                var input = document.getElementById('playerNum');
                input.addEventListener('input', function(e) {
                    var num = parseInt(e.target.value, 10);
                    if (isNaN(num) || num < 1 || num > 11) {
                        e.target.value = "";
                        alert("Please enter a number between 1 and 11.");
                    } else {
                        e.target.value = num;
                    }
                });

                // Handle room and date selection changes
                $('input[name="room_id"]').on('change', function() {
                    sessionStorage.setItem('room_id', $(this).val());
                });

                $('input[name="reservation_date"]').on('change', function() {
                    var selDate = $(this).val();
                    sessionStorage.setItem('reservation_date', selDate);
                    var roomID = sessionStorage.getItem('room_id');

                    fetch('/admin/hours/getHours', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                _token: '{{ csrf_token() }}',
                                room: roomID,
                                date: selDate
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

            function redirectToMonthlyList(button) {
                var basePath = button.getAttribute('data-basepath');
                var date = button.getAttribute('data-date');

                if (!basePath || !date) {
                    console.log("Button is disabled or data is missing.");
                    button.disabled = true;
                    return;
                }

                var url = `/admin/reservations/${basePath}/${date}/list`;
                window.location.href = url;
            }
        </script>
    @endsection
</x-default-layout>
