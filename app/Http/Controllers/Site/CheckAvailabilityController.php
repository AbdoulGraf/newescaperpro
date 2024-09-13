<?php

namespace App\Http\Controllers\Site;

use Carbon\Carbon;
use App\Models\Hour;
use App\Models\Price;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $room_id)
    {
        $date = Carbon::parse($request->query('date'));
        $reservedHours = Reservation::where('room_id', $room_id)->whereDate('reservation_date', $date)->pluck('hour_id');

        $availableHours = Hour::where('room_id', $room_id)->whereNotIn('id', $reservedHours)->get();



        $vailablePriceswithOurs = Price::where('room_id', $room_id)->get();




        return response()->json([

            'availableHours' => $availableHours,
            'availablePrices' => $vailablePriceswithOurs

        ]);
    }
}
