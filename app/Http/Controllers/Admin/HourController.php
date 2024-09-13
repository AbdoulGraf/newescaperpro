<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hour;
use App\Models\Room;
use App\Models\Place;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



class HourController extends Controller
{





    public function index()
    {

        $places = Place::with("rooms.hour")->get();
        $rooms = Room::all();





        // Collect titles and IDs of all rooms in an array
        $roomData = $rooms->map(function ($room) {
            return [
                'id' => $room->id,
                'title' => $room->title,
            ];
        });

        // Separate rooms by place
        $dubai = [];
        $abudhabi = [];

        $places->each(function ($item) use (&$dubai, &$abudhabi) {
            ($item->id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
        });

        return view('pages.hours.index', compact('dubai', 'abudhabi', 'roomData'));
    }



    public function edit($id)
    {
        $record = Price::findOrFail($id);
        $rooms = Room::withoutTrashed()->get();
        $places = Place::withoutTrashed()->get();

        return view('pages.hours._edit', [
            'record' => $record,
            'rooms' => $rooms,
            'places' => $places,
        ]);
    }

    // public function edit($id)
    // {
    //     $record = Hour::findOrFail($id);
    //     $rooms = Room::all();
    //     return view('pages.hours._edit', compact('record', 'rooms'));
    // }



    // create
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'room' => 'required',
            'place' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);


        // Extract start and end periods (AM or PM)
        $start_period = date('a', strtotime($validatedData['start_time']));
        $end_period = date('a', strtotime($validatedData['end_time']));

        // Create a new instance of the Hour model
        $hour = new Hour();
        $hour->room_id = $validatedData['room'];
        $hour->place_id = $validatedData['place'];
        $hour->start = $validatedData['start_time'];
        $hour->end = $validatedData['end_time'];
        $hour->start_period = $start_period;
        $hour->end_period = $end_period;
        // Save the hour data
        $hour->save();

        // Optionally, you can flash a success message
        session()->flash('success', 'Hour created successfully.');

        // Redirect to a specific route after successful creation
        return redirect()->route('admin.hours.index');
    }


    public function getHours(Request $request)
    {
        //get selected room hours from Hour model

        $date = Carbon::parse($request->date);

    

        $reservedHours = Reservation::where('room_id',  $request->room)->whereDate('reservation_date', $date)->pluck('hour_id');

        $availableHours = Hour::where('room_id',  $request->room)->whereNotIn('id', $reservedHours)->get();

        return response()->json($availableHours);
    }




    public function update(Request $request, Hour $hour)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'place_id' => 'required|exists:places,id',
            'start_time' => 'required',
            'end_time' => 'required',
            // Add validation rules for other fields if needed
        ]);

        try {
            // Check if start time is AM or PM
            $start_period = date('a', strtotime($validatedData['start_time']));
            // Check if end time is AM or PM
            $end_period = date('a', strtotime($validatedData['end_time']));

            // Update the hour record with the validated data
            $hour->update([
                'room_id' => $validatedData['room_id'],
                'place_id' => $validatedData['place_id'],
                'start' => $validatedData['start_time'],
                'end' => $validatedData['end_time'],
                'start_period' => $start_period,
                'end_period' => $end_period,
            ]);

            // Hour updated successfully, you can flash a success message
            session()->flash('message', 'Hour updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            // If an error occurs during hour update, handle the error
            Log::error('Error updating hour: ' . $e->getMessage());
            // Flash an error message
            session()->flash('error', 'An error occurred while updating the hour. Please try again.');
            return redirect()->back();
        }
    }




    // delete

    public function destroy($id)
    {
        try {
            // Find the SocialMedia record by ID and delete it
            Hour::findOrFail($id)->delete();

            // Flash success message
            session()->flash('success', 'Hour deleted successfully!');
        } catch (\Exception $e) {
            // Log the error and flash error message
            Log::error('Error deleting this Hour: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting this time. Please try again.');
        }
        // Redirect back
        return redirect()->back();
    }
}
