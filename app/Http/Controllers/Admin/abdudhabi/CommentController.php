<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Models\Room;
use App\Models\Place;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
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


        return view("pages.comment.index", [
            "data" => Comment::all(),
            "roomData" => $roomData
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required',
            'name' => 'required',
            'comment' => 'required',
            'room' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
        ]);

        $comment = new Comment([
            'placefor' => $request->place_id, // Ensure your database column matches this attribute
            'person_name' => $request->name,
            'person_comment' => $request->comment,
            'room_id' => (int) $request->room,
        ]);

        // Handle image upload
        if ($request->hasFile('poster')) {
            // Store the new image and retrieve the path
            $path = $request->file('poster')->store('storage/uploads/comments', 'public');
            // Save the path in the database column
            $comment->person_image = Storage::url($path);
        }

        $comment->save();

        session()->flash('message', 'Comment added successfully!');
        return redirect()->back(); // Adjust the route as necessary
    }



    public function edit($id)
    {
        $record = Comment::findOrFail($id);
        // You may need to pass $rooms to the view if it's required

        $rooms = Room::all();

        // Collect titles and IDs of all rooms in an array
        $roomData = $rooms->map(function ($room) {
            return [
                'id' => $room->id,
                'title' => $room->title,
            ];
        });


        return view('pages.comment._edit', [
            'record' => $record,
            "roomData" => $roomData
        ]);
    }

    //update the comment section 
    public function update(Request $request, $id)
    {
        $request->validate([
            'place_id' => 'required',
            'name' => 'required',
            'comment' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
            'room' => 'required',
        ]);



        $comment = Comment::findOrFail($id);

        // Update other fields except the image
        $comment->update([
            'placefor' => $request->place_id,
            'person_name' => $request->name,
            'person_comment' => $request->comment,
            'room_id' => (int) $request->room,
            // Do not update 'person_image' field here
        ]);

        // Handle image upload
        if ($request->hasFile('poster')) {
            // Delete previous image if exists
            if ($comment->person_image) {
                Storage::delete($comment->person_image);
            }

            // Store the new image
            $path = $request->file('poster')->store('storage/uploads/comments', 'public');
            $comment->person_image = $path;
            $comment->save();
        }

        session()->flash('message', 'Comment details are updated!');
        return redirect()->back();
    }


    //delete the comment heere
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Delete the image associated with the comment if it exists
        if ($comment->person_image) {
            Storage::delete($comment->person_image);
        }

        // Delete the comment
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully!');
        return redirect()->back();
    }
}
