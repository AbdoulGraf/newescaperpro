<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{


    public function index()
    {
        return view("pages.subscribers.index", [
            "data" => Subscribers::all(),
        ]);
    }

    // destroy
    public function destroy($id)
    {
        // Find the subscriber by id
        $subscriber = Subscribers::findOrFail($id);

        // Delete the subscriber
        $subscriber->delete();

        // Flash success message
        session()->flash('message', 'Subscriber deleted successfully!');

        // Redirect back to the previous page or any desired route
        return redirect()->back();
    }
}
