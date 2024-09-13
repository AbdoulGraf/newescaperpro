<?php

namespace App\Http\Controllers\Site\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\FranchiseForm;
use Illuminate\Http\Request;
use App\Mail\{FranchiseRequestMail};
use Illuminate\Support\Facades\{Mail};



class requestfranchiseController extends Controller
{
    public function index()
    {
        return view("site.abudhabi.franchise", []);
    }


    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'franchise_subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);


    $franchiseForm = new FranchiseForm([
        'firstname' => $request->first_name,
        'lastname' => $request->last_name,
        'phoneNumber' => $request->phone,
        'request_franchise' => $request->franchise_subject,
        'message' => $request->message,
    ]);

    $franchiseForm->save();

    //  Mail::to(['ogulcan@caveentertainment.com','tugce@caveentertainment.com', 'gokap@caveentertainment.com'])->send(new FranchiseRequestMail($franchiseForm));
     Mail::to(['ogulcan@caveentertainment.com', 'tugce@caveentertainment.com', 'gokap@caveentertainment.com'])->send(new FranchiseRequestMail($franchiseForm));
    // Mail::to(['idikoicom@gmail.com'])->send(new FranchiseRequestMail($franchiseForm));




    return redirect()->back()->with('success', 'Your franchise request has been submitted successfully.');
}


}
