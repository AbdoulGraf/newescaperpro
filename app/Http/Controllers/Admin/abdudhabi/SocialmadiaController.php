<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SocialmadiaController extends Controller
{

    public function index()
    {
        return view("pages.socialmedia.index", [
            "data" => SocialMedia::all(),
        ]);
    }



    // Create method
    public function create(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'platform' => 'required|string',
            'place' => 'required|string',
            'username' => 'required|string',
        ]);

        try {
            // Create a new instance of SocialMedia model and save the data
            $socialMedia = new SocialMedia();

            $socialMedia->platform = $validatedData['platform'];
            $socialMedia->placefor = $validatedData['place']; // Corrected field name
            $socialMedia->username = $validatedData['username'];
            // You can add more fields if necessary

            // Save the social media data to the database
            $socialMedia->save();

            // Store the success message in the session
            session()->flash('success', 'Social media data created successfully');

            // Redirect back to the previous page
            return redirect()->back();
        } catch (\Exception $e) {

            dd($e);
            // Log the error
            Log::error('Error creating social media data: ' . $e->getMessage());

            // Store the error message in the session
            session()->flash('error', 'An error occurred while creating the social media data. Please try again.');

            // Redirect back to the previous page
            return redirect()->back();
        }
    }




    public function edit($id)
    {
        $record = SocialMedia::findOrFail($id);
        // dd($record);
        return view('pages.socialmedia._edit', [
            'record' => $record,
        ]);
    }




    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'platform' => 'required|string',
            'place' => 'required|string',
            'username' => 'required|string',
        ]);

        try {
            // Find the SocialMedia record by ID
            $socialMedia = SocialMedia::findOrFail($id);

            // Update the record with validated data
            $socialMedia->update([
                'platform' => $request->platform,
                'place' => $request->place,
                'username' => $request->username,
                // Add more fields if necessary
            ]);

            // Flash success message
            session()->flash('message', 'Social media data updated successfully!');
        } catch (\Exception $e) {
            // Log the error and flash error message
            Log::error('Error updating social media data: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while updating the social media data. Please try again.');
        }

        // Redirect back
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            // Find the SocialMedia record by ID and delete it
            SocialMedia::findOrFail($id)->delete();

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
