<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class promocodeController extends Controller
{
    public function index()
    {

        $rooms = Room::all();

        // Collect titles and IDs of all rooms in an array
        $roomData = $rooms->map(function ($room) {
            return [
                'id' => $room->id,
                'title' => $room->title,
            ];
        });


        return view("pages.promocode.index", [
            "roomData" => $roomData
        ]);
    }


    public function edit($id)
    {


        $promocode = Promocode::findOrFail($id);
        $rooms = Room::all();

        $places = ['Dubai', 'Abu Dhabi', 'All'];
        return view('pages.promocode._edit', [
            'promocode' => $promocode,
            'places' => $places
        ]);

    }

    // storenew propemocode

    public function store(Request $request)
{
    $request->validate([
        'store' => 'required',
        'promocode' => 'required',
        'discount' => 'required',
        'start_date' => 'required',
        'validity_period' => 'required|numeric|min:0',
    ]);


    $promocode = new Promocode([
        'placefor' => $request->store,
        'promocode' => $request->promocode, // Corrected field name here
        'discount' => $request->discount,
        'start_date' => $request->start_date,
        'validity_period' => $request->validity_period,
        'status' => 1,
    ]);

    $promocode->save();

    session()->flash('message', 'Promo code created successfully.');
    return redirect()->back(); // Redirect to the listing page, adjust the route as necessary
}




public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'store' => 'required|string',
        'promocode' => 'required|string|unique:promocodes,promocode,' . $id,
        'discount' => 'required|numeric|min:0|max:100',
        'start_date' => 'required|date',
        'validity_period' => 'required|numeric|min:0',
        'status' => 'sometimes|nullable|boolean',
    ]);

    // Find the existing promocode by ID
    $promocode = Promocode::findOrFail($id);

    // Update promocode details
    $promocode->update([
        'store' => $validated['store'],
        'promocode' => $validated['promocode'],
        'discount' => $validated['discount'],
        // Use Carbon to handle date conversion if not automatically casted by model
        'start_date' => Carbon::createFromFormat('Y-m-d', $validated['start_date']),
        'validity_period' => $validated['validity_period'],
        'status' => $validated['status'] ?? false,
    ]);

    // Redirect back with success message

    session()->flash('message', 'Promocode updated successfully.!');
    return redirect()->back();



}



public function destroy($id)
    {
        $faq = Promocode::findOrFail($id);
        $faq->delete();

        session()->flash('message', 'PromoCode deleted successfully!');
        return redirect()->back();
    }





}
