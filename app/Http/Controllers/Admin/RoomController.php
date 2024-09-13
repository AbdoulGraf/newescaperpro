<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hour;
use App\Models\Place;
use App\Models\Reservation;
use App\Models\Room;
use App\Http\Traits\UploadImage;
use App\Http\Controllers\Controller;
//use App\Http\Livewire\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoomController extends Controller
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
        addJavascriptFile('assets/js/graf.bundle.js');
        $places = Place::where('status', 1)->get(['id', 'title']);
        $rooms = Room::status()
            ->orderBy('order')
            ->get(['id', 'title', 'place_id', 'order', 'status']);

        return view('pages.rooms.index', compact('rooms', 'places'));
    }

    public function getRooms($place_id)
    {
        $rooms = Room::where('place_id', $place_id)->status()->orderBy('order')->get(['id', 'title', 'place_id', 'order', 'status']);
        return response()->json($rooms);
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
     * @param Request $request
     * @param Room $room
     * @return JsonResponse
     */



    public function store(Request $request)
    {
        $datas = $request->except('_method', '_token');

        // Create a new Room instance
        $room = new Room();

        $info = array();
        foreach ($request->only($room->getFillable()) as $key => $value) {
            $info[$key] = $value;
        }

        // Handle the status field
        $info['status'] = array_key_exists('status', $info) ? 1 : 0;
        $info['created_by'] = Auth::user()->id; // Assuming you have authenticated users

        // Save the room to get an ID for image directory
        $room->fill($info)->save();

        // Image parameters and upload logic
        $params_poster = [
            "name" => "poster",
            "dir" => "storage/uploads/rooms/{$room->id}/",
            "file" => $info["poster"] ?? null,
            "resize" => ['w' => '750', 'h' => '1000'],
            "key" => "rooms",
            "rm" => $info['poster_remove'] ?? null
        ];
        $params_banner = [
            "name" => "banner",
            "dir" => "storage/uploads/rooms/{$room->id}/",
            "file" => $info["banner"] ?? null,
            "resize" => ['w' => '2000', 'h' => '1500'],
            "key" => "rooms",
            "rm" => $info['banner_remove'] ?? null
        ];
        $params_text_picture = [
            "name" => "text_picture",
            "dir" => "storage/uploads/rooms/{$room->id}/",
            "file" => $info["text_picture"] ?? null,
            "resize" => ['w' => '1000', 'h' => '600'],
            "key" => "rooms",
            "rm" => $info['text_picture_remove'] ?? null
        ];

        // Image uploading and removal logic
        if ($request->hasFile('banner') || $request['banner_remove'] == "1") {
            $info['banner'] = $this->createImage($params_banner);
        }

        if ($request->hasFile('text_picture') || $request['text_picture_remove'] == "1") {
            $info['text_picture'] = $this->createImage($params_text_picture);
        }

        if ($request->hasFile('poster') || $request['poster_remove'] == "1") {
            $info['poster'] = $this->createImage($params_poster);
        }

        // Update the room with the possibly modified info array (to include image paths)
        $room->update($info);

        session()->flash('success', "New Room added successfully!");
        return redirect()->route('admin.rooms.index');
    }








    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);

        $rooms = Room::withoutTrashed()->get();
        $places = Place::withoutTrashed()->get();
        $hours = Hour::withoutTrashed()->get();

        return view('pages.rooms._edit', [
            'room' => $room,
            'prices' => $room->price,
            'hour' => $room->hour,
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
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $datas = $request->except('_method', '_token');

        $info = array();
        foreach ($request->only(array_values($room->getFillable())) as $key => $value)  $info[$key] = $value;

        if (array_key_exists('status', $info)) :
            $info['status'] = 1;
        else :   $info['status'] = 0;
        endif;
        $info['updated_by'] = Auth::user()->id;

        $room->fill($info)->save();

        $params_poster = [
            "name" => "poster",
            "dir" => "storage/uploads/rooms/$room->id/",
            "file" => $info["poster"] ?? null,
            "resize" => ['w' => '750', 'h' => '1000'],
            "key" =>  "rooms",
            "rm" => $info['poster_remove'] ?? null
        ];
        $params_banner = [
            "name" => "banner",
            "dir" => "storage/uploads/rooms/$room->id/",
            "file" => $info["banner"] ?? null,
            "resize" => ['w' => '2000', 'h' => '1500'],
            "key" =>  "rooms",
            "rm" => $info['banner_remove'] ?? null
        ];
        $params_text_picture = [
            "name" => "banner",
            "dir" => "storage/uploads/rooms/$room->id/",
            "file" => $info["text_picture"] ?? null,
            "resize" => ['w' => '1000', 'h' => '600'],
            "key" =>  "rooms",
            "rm" => $info['text_picture_remove'] ?? null
        ];

        if ($request->hasFile(key: 'banner') || $request['banner_remove'] == "1") :
            $info['banner'] = $this->createImage($params_banner);
        endif;

        if ($request->hasFile(key: 'text_picture')   || $request['text_picture_remove'] == "1") :
            $info['text_picture'] = $this->createImage($params_text_picture);
        endif;

        if ($request->hasFile(key: 'poster') || $request['poster_remove'] == "1") :
            $info['poster'] = $this->createImage($params_poster);
        endif;

        $result = $room->update($info);

        session()->flash('message', "Room details are updated!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $record = Room::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return redirect()->back();
    }
}
