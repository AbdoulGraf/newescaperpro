<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class contactController extends Controller
{

    public function index()
    {
        return view("pages.contacts.index", [
            "data" => Contact::all(),
        ]);
    }

    public function destroy($id)
    {
        $faq = Contact::findOrFail($id);
        $faq->delete();

        session()->flash('message', 'FAQ deleted successfully!');
        return redirect()->back();
    }



}
