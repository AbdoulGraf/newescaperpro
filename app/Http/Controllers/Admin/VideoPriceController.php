<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoPrice;
use Illuminate\Http\Request;

class VideoPriceController extends Controller
{

    public function index()
    {
        return view("pages.video_price.index", [
            "data" => VideoPrice::all(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'placefor' => 'required|in:1,2',
        ]);


        VideoPrice::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'place_id' => $request->placefor,
        ]);

        return redirect()->back()->with('success', 'Video price added successfully.');
    }


    public function edit($id)
    {
        $record = VideoPrice::findOrFail($id);
        // dd($record);
        return view('pages.video_price._edit', [
            'record' => $record,
        ]);
    }

    //upadte price video
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'place_id' => 'required|integer',
        ]);

        $videoPrice = VideoPrice::findOrFail($id);
        $videoPrice->update($validated);


        session()->flash('message', 'Video price updated successfully.');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $faq = VideoPrice::findOrFail($id);
        $faq->delete();

        session()->flash('message', 'Video price deleted successfully!');
        return redirect()->back();
    }
}
