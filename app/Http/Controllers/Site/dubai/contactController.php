<?php

namespace App\Http\Controllers\Site\dubai;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function contactIndex()
    {
        return view("site.uae.contact.index", []);
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

    return redirect()->back()->with('success', 'Your contact request has been submitted successfully.');
}
}