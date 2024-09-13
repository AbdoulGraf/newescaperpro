<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Models\Hour;
use App\Models\Room;
use App\Models\Place;
use App\Models\PhotoVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class photovideoController extends Controller
{


    public function index()
    {
        addJavascriptFile('assets/js/graf.bundle.js');
        $places = Place::where('status', 1)->get(['id', 'title']);

        $rooms = Room::status()
            ->orderBy('order')
            ->get(['id', 'title', 'place_id', 'order', 'status']);

        return view('pages.photo_videos.index', compact('rooms', 'places'));
    }


    // store the data

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_or_video_name' => 'required|string|max:255',
            'place_for' => 'required|string',
            'room_id' => 'required|exists:rooms,id',
            'photo_img' => 'nullable|image|max:10240', // Adjust size as needed
            'video_mp4' => 'nullable|mimes:mp4|max:51200', // Adjust size as needed
        ]);

        $photoPath = null;
        $videoPath = null;

        if ($request->hasFile('photo_img')) {
            $photoPath = $request->file('photo_img')->store('storage/uploads/photos', 'public');
        }

        if ($request->hasFile('video_mp4')) {
            $videoPath = $request->file('video_mp4')->store('storage/uploads/videos', 'public');
        }

        $photoVideo = PhotoVideo::create([
            'name' => $validated['image_or_video_name'],
            'placefor' => $validated['place_for'],
            'room_id' => $validated['room_id'],
            'photos_img' => $photoPath,
            'videos_mp4' => $videoPath,
        ]);

        return redirect()->back()->with('success', 'Photo/Video has been successfully added.');
    }

    // edit

    public function edit($id)
    {

        

        $photovideo = PhotoVideo::findOrFail($id);
    
        $rooms = Room::all(); 
        $places = ['Dubai', 'Abu Dhabi', 'All']; 

    
        return view('pages.photo_videos._edit', [
            'photovideo' => $photovideo,
            'rooms' => $rooms,
            'places' => $places
        ]);

    }



  



    // update

    public function update(Request $request, $id)
    {
        $request->validate([
            'image_or_video_name' => 'required|string|max:255',
            'place_for' => 'required|string',
            'room_id' => 'required|integer',
            'photo_img' => 'nullable|image',
            'video_mp4' => 'nullable|mimes:mp4',
        ]);
    
        $photovideo = PhotoVideo::findOrFail($id);
        $photovideo->name = $request->image_or_video_name;
        $photovideo->placefor = $request->place_for;
        $photovideo->room_id = $request->room_id;
    
        if ($request->hasFile('photo_img')) {
            $photovideo->photos_img = $request->photo_img->store('storage/uploads/photos', 'public');
        }
        if ($request->hasFile('video_mp4')) {
            $photovideo->videos_mp4 = $request->video_mp4->store('storage/uploads/videos', 'public');
        }
    
        $photovideo->save();
    

        session()->flash('message', 'Photo/Video updated successfully!');
    return redirect()->back();



    }

    




    // destory dataa
    public function destroy($id)
    {
        $photovideos = PhotoVideo::findOrFail($id);
        $photovideos->delete();

        session()->flash('message', 'Photo/videos deleted successfully!');
        return redirect()->back();
    }

}
