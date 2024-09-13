<?php

namespace App\Http\Controllers\Site\abdudhabi;

use App\Models\Hour;
use App\Models\Room;
use App\Models\RequestVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class requestvideoController extends Controller

{
    
    public function index()
    {

        $hours = Hour::all();


        $rooms = Room::whereNotIn('title', ['Torture', 'Chaos'])->get();



        // Collect titles and IDs of all rooms in an array
        $roomData = $rooms->map(function ($room) {

            return [
                'id' => $room->id,
                'title' => $room->title,
            ];
        });


        return view("site.abudhabi.videorequest", [
            'hours' => $hours,
            "roomData" => $roomData
        ]);
    }


    // public function store(Request $request)
    // {
    //     // Validate the incoming request data
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'phone' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'store_country' => 'required|string',
    //         'store_room' => 'required|integer', // Assuming 'store_room' relates to a room ID
    //         'date_game' => 'required|date',
    //         'time_game' => 'required', // Adjust validation based on your requirements
    //         'videoLength' => 'required|string',
    //         'paymentMethodx' => 'required|string',
    //         'area' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'city_for' => 'required|string|max:255',
    //     ]);


    
    //     // Process the data (e.g., save to database)
    //     $reservation = new RequestVideo(); // Ensure RequestVideo model exists and is correctly set up
    //     $reservation->firstname = $validated['name'];
    //     $reservation->lastname = $validated['lastname'];
    //     $reservation->phoneNumber = $validated['phone'];
    //     $reservation->email = $validated['email'];
    //     $reservation->room = $validated['store_country'];
    //     $reservation->store = $validated['store_room']; // Ensure this column exists in your table
    //     $reservation->date = $validated['date_game'];
    //     $reservation->time = $validated['time_game'];
    //     $reservation->video_type = $validated['videoLength']; // Ensure this column exists in your table
    //     $reservation->payment_method = $validated['paymentMethodx']; // Ensure this column exists in your table
    //     $reservation->video_description = $validated['area'];
    //     $reservation->address_country = $validated['country'];
    //     $reservation->address_city = $validated['city_for']; // Assuming there's a typo in your code snippet and correcting 'city_for' to match the column name
    //     $reservation->save();
    
    //     // Redirect or return response
    //     return back()->with('success', 'Your request has been submitted successfully.');
    // }

    

}
