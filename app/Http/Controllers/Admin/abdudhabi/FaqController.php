<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;

class FaqController extends Controller
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


        return view("pages.faq.index", [

            "data" => FAQ::all(),
            "roomData" => $roomData


        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'room' => 'required',
        ]);

        // Assuming `placefor` is the correct column name as used in your update method
        $faq = new FAQ([
            'placefor' => $request->place_id, // Ensure this matches your database column
            'question' => $request->question,
            'answer' => $request->answer,
            'room_id' => (int) $request->room,
        ]);

        $faq->save(); // Save the new FAQ to the database

        session()->flash('message', 'FAQ added successfully!');
        return redirect()->back(); // Redirect to the listing page, adjust the route as necessary
    }




    public function edit($id)
    {


        $record = FAQ::findOrFail($id);

        $rooms = Room::all();

        // Collect titles and IDs of all rooms in an array
        $roomData = $rooms->map(function ($room) {
            return [
                'id' => $room->id,
                'title' => $room->title,
            ];
        });



        // dd($record);
        return view('pages.faq._edit', [
            'record' => $record,
            "roomData" => $roomData
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'place_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'room' => 'required',
        ]);

        $faq = FAQ::findOrFail($id);

        $faq->update([
            'placefor' => $request->place_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'room_id' => (int) $request->room,
        ]);

        session()->flash('message', 'FAQ details are updated!');
        return redirect()->back();
    }



    // delete data

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        session()->flash('message', 'FAQ deleted successfully!');
        return redirect()->back();
    }
}
