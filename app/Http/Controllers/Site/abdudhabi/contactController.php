<?php

namespace App\Http\Controllers\Site\abdudhabi;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    public function contactIndex()
    {
        

        return view("site.abudhabi.contact.index", []);


    }


    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    $contact = new Contact([
        'first_name' => $request->first_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
        
    ]);

    $contact->save();


      // Prepare data for sending email
      $mailData = [
        'client_info' => [
            'first_name' => $request->first_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ],
    ];
    // Send email
    $this->sendMail($mailData);

    return redirect()->back()->with('success', 'Your contact request has been submitted successfully.');


}


//mail sender
public function sendMail($mailData)
{
    $toEmail = 'abdoul_yacoubou@grafstudios.com.tr';

    Mail::to($toEmail)
        ->cc(['abdoul_yacoubou@grafstudios.com.tr']);
}


}
