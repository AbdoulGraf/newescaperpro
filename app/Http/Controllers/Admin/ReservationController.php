<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReservationForm;
use App\Http\Traits\UploadImage;
use App\Mail\ReservationComplated;
use Carbon\Carbon;
use App\Models\{ClientInfo, Hour, PaymentInfo, Place, Price, Room, Reservation};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\{JsonResponse, RedirectResponse, Request, Response};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;




class ReservationController extends Controller
{

    use UploadImage;


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */



    public function index()
    {
        addJavascriptFile('assets/js/graf.bundle.js');

        $currentPath = request()->path();



        // Fetch necessary data
        $archives = Reservation::onlyTrashed()->orderBy('id', 'desc')->get();
        $places = Place::where('status', 1)->get(['id', 'title']);
        $rooms = Room::status()->orderBy('order')->get(['id', 'title', 'place_id', 'order', 'status']);

        // Initialize arrays for Dubai and Abu Dhabi games
        $dubai = [];
        $abudhabi = [];

        // Filter rooms for Dubai and Abu Dhabi
        $rooms->each(function ($item) use (&$dubai, &$abudhabi) {
            ($item->place_id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
        });

        $isDubai = Str::contains($currentPath, 'dubai');
        $isAbuDhabi = Str::contains($currentPath, 'abudhabi');
        $isToday = Str::contains($currentPath, 'today');


        // Fetch reservations based on place_id if Dubai or Abu Dhabi is in the path
        if ($isDubai || $isAbuDhabi) {

            // $placeId = $isDubai ? 1 : 2;
            // $reservations = Reservation::where('place_id', $placeId)
            //     ->withoutTrashed()
            //     ->orderBy('id', 'desc')
            //     ->get();

        } else {
            $reservations = Reservation::withoutTrashed()
                ->orderBy('id', 'desc')
                ->get();
        }

        // Filter for today's reservations if 'today' is in the path
        if ($isToday) {
            $today = now()->startOfDay();
            $reservations = $reservations->filter(function ($reservation) use ($today) {
                $reservationDate = $reservation->reservation_date->startOfDay();
                return $reservationDate->equalTo($today);
            });
        }


        $hours = Hour::get();
        $clientInfo = ClientInfo::get();
        $paymentInfoDetails = PaymentInfo::get();


        $dubaiHours = [];
        $abudhabiHours = [];

        foreach ($hours as $hour) {
            if ($hour->place_id == 1) {
                $dubaiHours[] = $hour;
            } else {
                $abudhabiHours[] = $hour;
            }
        }

        return view('pages.reservation.index', [
            "reservations" => $reservations,
            "archives" => $archives,
            "rooms" => $rooms,
            "places" => $places,
            "dubaiGames" => $dubai,
            "abudhabiGames" => $abudhabi,
            "hours" => $hours,
            "clientInfos" => $clientInfo,
            "paymentInfos" => $paymentInfoDetails
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function dubai(Request $request)
{
    // Load required assets
    addJavascriptFile('assets/js/graf.bundle.js');

    // Check if the request is from DataTables for server-side processing
    if ($request->ajax()) {
        $query = Reservation::withoutTrashed()
            ->where('place_id', 1)
            ->orderBy('id', 'desc');

            dd($query);

        // DataTables server-side processing: filtering, sorting, and pagination
        return datatables()
            ->eloquent($query)
            ->addColumn('client_info', function ($reservation) {
                return $reservation->client_info->first_name . ' ' . $reservation->client_info->last_name;
            })
            ->addColumn('room_title', function ($reservation) {
                return $reservation->room->title ?? 'Room not found';
            })
            ->addColumn('place', function ($reservation) {
                return $reservation->place_id == 1 ? 'Dubai' : 'Abu Dhabi';
            })
            ->addColumn('reservation_date', function ($reservation) {
                return Carbon::parse($reservation->reservation_date)->format('d/m/Y');
            })
            ->addColumn('reservation_time', function ($reservation) {
                return Carbon::parse($reservation->hour->start)->format('H:i') . ' - ' . Carbon::parse($reservation->hour->end)->format('H:i');
            })
            ->addColumn('processes', function ($reservation) {
                return '<a href="' . route('admin.reservations.edit', $reservation->id) . '" class="btn btn-small btn-primary" style="background: #47be7d; padding:5px 8px; color:#fff"><i class="fas fa-edit"></i></a>
                        <form action="' . route('admin.reservations.destroy', $reservation->id) . '" method="POST" style="display: inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-small btn-primary" onclick="return confirm(\'Are you sure?\')" style="background: #f44f6c; padding:5px 8px; color:#fff"><i class="fas fa-trash-alt"></i></button>
                        </form>';
            })
            ->rawColumns(['processes']) ->toJson();
            // ->make(true);
    }

    // Fetch other data needed for the view
    $archives = Reservation::onlyTrashed()->orderBy('id', 'desc')->get();
    $places = Place::where('status', 1)->get(['id', 'title']);
    $rooms = Room::status()->orderBy('order')->get(['id', 'title', 'place_id', 'order', 'status']);

    $dubai = [];
    $abudhabi = [];
    $rooms->each(function ($item) use (&$dubai, &$abudhabi) {
        ($item->place_id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
    });

    return view('pages.reservation.index', [
        "archives" => $archives,
        "rooms" => $rooms,
        "places" => $places,
        "dubaiGames" => $dubai,
        "abudhabiGames" => $abudhabi
    ]);
}


    //dubai monthly reservation
    public function monthlylist(Request $request, $id)
    {

        $currentPath = $request->path();

        if (Str::contains($currentPath, 'dubai')) {
            $placeId = 1;
        } elseif (Str::contains($currentPath, 'abudhabi')) {
            $placeId = 2;
        } else {
            // If neither dubai nor abudhabi is found in the path, you might want to handle this case.
            abort(404, 'The location in the URL is not recognized.');
        }

        // Validate and parse the year and month from the $id parameter
        if (!preg_match('/^(\d{4})-(\d{2})$/', $id, $matches)) {
            abort(404, 'Invalid date format. Expected format: YYYY-MM');
        }


        $year = $matches[1];
        $month = $matches[2];

        // Retrieve all reservations for the specified place and month
        $reservations = Reservation::withoutTrashed()
            ->where('place_id', $placeId)
            ->whereYear('reservation_date', $year)
            ->whereMonth('reservation_date', $month)
            ->orderBy('id', 'desc')
            ->get();

        $rooms = Room::status()->orderBy('order')->get(['id', 'title', 'place_id', 'order', 'status']);

        $rooms->each(function ($item) use (&$dubai, &$abudhabi) {
            ($item->place_id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
        });

        $places = Place::where('status', 1)->get(['id', 'title']);

        $archives = Reservation::onlyTrashed()
            ->orderBy('id', 'desc')->get();


        // $groupedReservations = $reservations->groupBy(function ($date) {
        //     return Carbon::parse($date->reservation_date)->format('Y-m');
        // });

        $groupedReservations = $reservations->groupBy(function ($date) {
            // First level of grouping by year and month
            return Carbon::parse($date->reservation_date)->format('Y-m');
        })->map(function ($dayGroup) {
            // Second level of grouping by the exact reservation_date within each month group
            return $dayGroup->groupBy(function ($date) {
                return Carbon::parse($date->reservation_date)->format('d-m-Y');
            });
        });



        // dd($groupedReservations);

        // Pass the grouped reservations to the view
        return view('pages.reservation.monthly_details', [
            'groupedReservations' => $groupedReservations,
            "rooms" => $rooms,
            "places" => $places,
            "archives" => $archives,
        ]);
    }

    // daily reservation
    public function dailylist(Request $request, $id)
    {

        // Determine the base path from the current request
        $basePath = Str::contains($request->path(), 'dubai') ? 'dubai' : (Str::contains($request->path(), 'abudhabi') ? 'abudhabi' : null);

        // Determine place_id based on basePath
        $placeId = $basePath === 'dubai' ? 1 : ($basePath === 'abudhabi' ? 2 : null);

        if (!$placeId) {
            // Handle error or redirect if basePath is neither dubai nor abudhabi
            abort(404, 'Location not recognized.');
        }

        // Ensure the date is in the correct format (YYYY-MM-DD)
        try {
            $date = Carbon::createFromFormat('d-m-Y', $id);
        } catch (\Exception $e) {
            // Handle invalid date format
            abort(400, 'Invalid date format. Expected format: YYYY-MM-DD');
        }

        // Fetch reservations for the given date and place_id
        $reservations = Reservation::whereDate('reservation_date', '=', $date)
            ->where('place_id', $placeId)
            ->get();

        $archives = Reservation::onlyTrashed()
            ->orderBy('id', 'desc')->get();

        $places = Place::where('status', 1)->get(['id', 'title']);
        $rooms = Room::status()->orderBy('order')->get(['id', 'title', 'place_id', 'order', 'status']);


        $rooms->each(function ($item) use (&$dubai, &$abudhabi) {
            ($item->place_id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
        });


        $hours = Hour::get();
        $clientInfo = ClientInfo::get();

        $paymentInfoDetails = PaymentInfo::get();


        $dubaiHours = [];
        $abudhabiHours = [];

        foreach ($hours as $hour) {
            if ($hour->place_id == 1) {
                $dubaiHours[] = $hour;
            } else {
                $abudhabiHours[] = $hour;
            }
        }


        // Pass the grouped reservations to the view
        return view('pages.reservation.daily_details', [
            'reservations' => $reservations,
            "archives" => $archives,
            "rooms" => $rooms,
            "places" => $places,
            "hours" => $hours,
            "clientInfos" => $clientInfo,
            "paymentInfos" => $paymentInfoDetails
        ]);
    }



    public function abudhabi()
    {
        addJavascriptFile('assets/js/graf.bundle.js');
        $reservations = Reservation::withoutTrashed()
            ->where('place_id', 2)
            ->orderBy('id', 'desc')
            ->get();
        $archives = Reservation::onlyTrashed()->orderBy('id', 'desc')->get();
        $places = Place::where('status', 1)->get(['id', 'title']);
        $rooms = Room::status()->orderBy('order')->get(['id', 'title', 'place_id', 'order', 'status']);

        $rooms->each(function ($item) use (&$dubai, &$abudhabi) {

            ($item->place_id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
        });


        $groupedReservations = $reservations->groupBy(function ($item) {
            // Group by Year/Month
            return Carbon::parse($item->reservation_date)->format('Y/m');
        });

        foreach ($groupedReservations as $date => $reservationsByDate) {
            $groupedReservations[$date] = $reservationsByDate->groupBy('room_id')
                ->map(function ($items) {
                    return $items->count();
                });
        }

        return view('pages.reservation.index', [
            "reservations" => $reservations,
            "archives" => $archives,
            "rooms" => $rooms,
            "places" => $places,
            "dubaiGames" => $dubai,
            "abudhabiGames" => $abudhabi,
            'groupedReservations' => $groupedReservations
        ]);
    }


    //abudhabi monthly part
    public function abudhabimonthlylist()
    {

        return view('pages.reservation.monthly_details', []);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReservationForm $request
     */
    public function store(ReservationForm $request)
    {

        $reservation = new Reservation();
        $client = new ClientInfo();
        $payment = new PaymentInfo();
        $agent = new Agent();


        $reservation_info = $client_info = $payment_info = array();

        if (Reservation::where(['room_id' => $request->room_id, 'hour_id' => $request->hour_id, 'reservation_date' => $request->reservation_date])->exists()) {
            session()->flash('message', 'Selected date and hours already taken! It\'is not available anymore!');
            return redirect()->back();
        }

        if ($request->get('payment_method') == 2) {
            foreach ($request->only(array_values($payment->getFillable())) as $key => $value) $payment_info[$key] = $value;
        } else {
            $payment['outlet_id'] = 1;
            $payment['order_id'] = Str::random(10);
            $payment['payment_id'] = Str::random(10);
        }

        $payment->fill($payment_info)->save();
        $reservation_info['payment_info_id'] = $payment->id;


        foreach ($request->only(array_values($client->getFillable())) as $key => $value) $client_info[$key] = $value;
        $client_info['device'] = $agent->device();
        $client_info['platform'] = $agent->platform();
        $client_info['platform_version'] = $agent->version($client_info['platform']);
        $client_info['browser'] = $agent->browser();
        $client_info['browser_version'] = $agent->version($client_info['browser']);
        $client_info['language'] = $agent->languages()[0];
        $client_info['ipAddress'] = \Request::getClientIp(true);

        $mailDatas = ["client" => $client_info];

        $client->fill($client_info)->save();
        $reservation_info['client_info_id'] = $client->id;

        foreach ($request->only(array_keys($request->rules())) as $key => $value) $reservation_info[$key] = $value;
        $reservation_info['created_by'] = $reservation_info['updated_by'] = Auth::user()->id ?? null;

        $result = $reservation->fill($reservation_info)->save();

        $hour = Hour::select(['start', 'start_period', 'end', 'end_period'])->find($reservation->hour->id);
        $price = Price::where(['place_id' => $reservation->place->id, 'room_id' => $reservation->room->id, 'player' => $reservation->players])->get();

        $mailDatas = Arr::prepend($mailDatas, ($reservation->payment_method == 2) ? 'Online' : 'Upon Arrival', 'payment');
        $mailDatas = Arr::prepend($mailDatas, ($price[0]->price * $reservation_info['players']), 'total');
        $mailDatas = Arr::prepend($mailDatas, $price[0]->price, 'price');
        $mailDatas = Arr::prepend($mailDatas, $reservation->players, 'players');
        $mailDatas = Arr::prepend($mailDatas, ($hour->start->format("H:i") . $hour->start_period . " - " . $hour->end->format("H:i") . $hour->end_period), 'hour');
        $mailDatas = Arr::prepend($mailDatas, $reservation->reservation_date->format("d/m/Y"), 'date');
        $mailDatas = Arr::prepend($mailDatas, $reservation->room->title, 'room');
        $mailDatas = Arr::prepend($mailDatas, $reservation->place->title, 'location');


        // if ($reservation->clientInfo->email) {
        //     Mail::to($reservation->clientInfo->email)->cc(['info.dxb@black-out.ae'])->send(new ReservationComplated($mailDatas));
        // }

        if ($reservation->clientInfo->email) {
            Mail::to($reservation->clientInfo->email)->cc(
                ($reservation->place_id == 1) ?
                    'info.dxb@black-out.ae' :
                    'info.ad@black-out.ae'
                )->send(new ReservationComplated($mailDatas)); // Ensure your class name is correctly spelled here
        }






        return response()->json([
            "status" => $result,
            "message" => "Reservation is completed!",
            "class" => ($result) ? "info" : "danger",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $result = Reservation::withoutTrashed()->findOrFail($id);


        return response()->json([
            "result" => $result,
            "message" => $result['title'] . " bilgilerini güncellediniz!",
            "class" => ($result) ? "info" : "danger",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $rooms = Room::withoutTrashed()->get();
        $places = Place::withoutTrashed()->get();
        $hours = Hour::withoutTrashed()->get();

        return view('pages.reservation._edit', [
            'client' => $reservation->clientInfo,
            'reservation' => $reservation,
            'rooms' => $rooms,
            'places' => $places,
            'hours' => $hours
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

        // Assuming $id refers to the reservation's ID
        $datas = $request->except(['_token', '_method']);

        // Ensure the client ID is valid
        if (!is_numeric($datas['client']['id']) || $datas['client']['id'] === 'default_value') {
            return back()->with('error', 'Invalid client ID.');
        }
        $client = ClientInfo::findOrFail($datas['client']['id']);
        $reservation = Reservation::findOrFail($id);

        $room = Room::findOrFail($datas['room_id']);
        if ($datas['place_id'] != $room->place_id) {
            return back()->with('error', 'City and Room should be on the same location.');
        }

        // Prepare data for update
        $clientData = $datas['client'];
        $reservationData = Arr::except($datas, ['client']);

        // Update the client and reservation
        $client->update($clientData);
        $reservation->update($reservationData);

        return back()->with('message', 'The reservation and client information has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $record = Reservation::findOrFail($id);
        $record->status = 0;
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return back()->with('message', 'The reservation  has been successfully Deleted.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function forceDelete($id)
    {
        $record = Reservation::onlyTrashed()->findOrFail($id);
        $record->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $record = Reservation::onlyTrashed()->findOrFail($id);
        $record->status = 1;
        $record->restore();
        return redirect()->back();
    }
}
