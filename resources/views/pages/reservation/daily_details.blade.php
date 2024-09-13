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

            <!--begin:::Tab item-->
            {{-- <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#deleted_contents">Archive</a>
            </li> --}}
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



                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800">
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
                                        <th class=""> Creation Date : </th>

                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td>
                                                <span>{{ $reservation->id }}</span>
                                            </td>

                                            <td>
                                                @foreach ($clientInfos as $clientInfo)
                                                    @if ($reservation->client_info_id == $clientInfo->id)
                                                        {{ $clientInfo->first_name }} {{ $clientInfo->last_name }}
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                @php
                                                    $room = $rooms->firstWhere('id', $reservation->room_id);
                                                @endphp

                                                {{ $room ? $room->title : 'Room not found' }}
                                            </td>

                                            <td>
                                                @if ($reservation->place_id == 1)
                                                    Dubai
                                                @elseif ($reservation->place_id == 2)
                                                    Abu Dhabi
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}
                                            </td>

                                            <td>

                                                @foreach ($hours as $hour)
                                                    @if ($reservation->hour_id == $hour->id)
                                                        {{ \Carbon\Carbon::parse($hour->start)->format('H:i') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($hour->end)->format('H:i') }}
                                                    @endif
                                                @endforeach


                                            </td>
                                            <td>
                                                <a href="{{ route('admin.reservations.edit', ['reservation' => $reservation->id]) }}"
                                                    class="btn btn-small btn-primary"
                                                    style="background: #47be7d; padding:5px 8px">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form
                                                    action="{{ route('admin.reservations.destroy', ['reservation' => $reservation->id]) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-small btn-primary"
                                                        onclick="return confirm('Are you sure?')"
                                                        style="background: #f44f6c; padding:5px 8px">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>


                                            <td>
                                                @foreach ($clientInfos as $clientInfo)
                                                    @if ($reservation->client_info_id == $clientInfo->id)
                                                        {{ $clientInfo->email }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($clientInfos as $clientInfo)
                                                    @if ($reservation->client_info_id == $clientInfo->id)
                                                        {{ $clientInfo->phone }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $reservation->players }}
                                            </td>

                                            <td>
                                                @foreach ($paymentInfos as $paymentInfo)
                                                    @if ($reservation->payment_info_id == $paymentInfo->id)
                                                        @if ($paymentInfo->amount !== null)
                                                            AED {{ $paymentInfo->amount / 100 }}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($reservation->created_at)->format('d/m/Y') }}
                                            </td>


                                        </tr>
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

                                // Saat bilgisini formatlayarak HTML içeriği oluşturun


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
        </script>
    @endsection
</x-default-layout>
