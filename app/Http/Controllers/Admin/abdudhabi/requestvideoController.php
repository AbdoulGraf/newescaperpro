<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\RequestVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class requestvideoController extends Controller
{
    public function index()
    {
        return view("pages.requestvideo.index", [
            "data" => RequestVideo::all(),
        ]);
    }


    public function destroy($id)
    {
        try {
            // Find the SocialMedia record by ID and delete it
            RequestVideo::findOrFail($id)->delete();

            // Flash success message
            session()->flash('success', 'Social media data deleted successfully!');
        } catch (\Exception $e) {
            // Log the error and flash error message
            Log::error('Error deleting social media data: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting the social media data. Please try again.');
        }
        // Redirect back
        return redirect()->back();
    }

}
