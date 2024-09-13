<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Price;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PriceController extends Controller
{



    public function index()
    {
        $places = Place::with("rooms.price")->get();

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

        return view('pages.prices.index', compact('dubai', 'abudhabi', 'roomData'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'room' => 'required|exists:rooms,id',
            'place' => 'required|in:1,2', // Assuming only Dubai and Abu Dhabi are valid options
            'player' => 'required|numeric',
            'price' => 'required|numeric',
            // Remove validation rules for start_time and end_time if not applicable
        ]);


        try {
            // Create a new price record
            Price::create([
                'room_id' => $validatedData['room'],
                'place_id' => $validatedData['place'],
                'player' => $validatedData['player'],
                'price' => $validatedData['price'],
                // Remove fields that are not present in the form
            ]);

            // Price created successfully, you can flash a success message
            session()->flash('success', 'Price added successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            // If an error occurs during price creation, handle the error
            Log::error('Error creating price: ' . $e->getMessage());
            // Flash an error message
            session()->flash('error', 'An error occurred while adding the price. Please try again.');
            return redirect()->back();
        }
    }


    public function create(Request $request)
    {
        //create
    }




    // public function index(){

    //     $places = Place::with("rooms.price")->get();

    //     $places->each(function ($item) use (&$dubai, &$abudhabi) {

    //         ($item->id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
    //     });

    //     return view('pages.prices.index', compact('dubai', 'abudhabi'));

    // }


    public function edit($id)
    {
        $record = Price::findOrFail($id);
        $rooms = Room::withoutTrashed()->get();
        $places = Place::withoutTrashed()->get();

        return view('pages.prices._edit', [
            'record' => $record,
            'rooms' => $rooms,
            'places' => $places,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'player' => 'required|numeric',
            'place_id' => 'required|exists:places,id',
            'room_id' => 'required|exists:rooms,id',
            // Add validation rules for other fields if needed
        ]);

        try {
            // Find the price record by ID
            $price = Price::findOrFail($id);

            // Update the price record with the validated data
            $price->update([
                'price' => $validatedData['price'],
                'player' => $validatedData['player'],
                'place_id' => $validatedData['place_id'],
                'room_id' => $validatedData['room_id'],
                // Add other fields here if needed
            ]);

            // Price updated successfully, you can flash a success message
            session()->flash('message', 'Price updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            // If an error occurs during price update, handle the error
            Log::error('Error updating price: ' . $e->getMessage());
            // Flash an error message
            session()->flash('error', 'An error occurred while updating the price. Please try again.');
            return redirect()->back();
        }
    }


    //destroy price
    public function destroy($id)
    {
        try {
            // Find the SocialMedia record by ID and delete it
            Price::findOrFail($id)->delete();

            // Flash success message
            session()->flash('success', 'Price deleted successfully!');
        } catch (\Exception $e) {
            // Log the error and flash error message
            Log::error('Error deleting this Price: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting this Price. Please try again.');
        }
        // Redirect back
        return redirect()->back();
    }
}
