<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $first_name, $last_name, $email, $phone, $message, $room_id, $place_id;

    protected $rules = [
        'first_name' => 'required:min:3',
        'last_name' => 'required:min:3',
        'email' => 'required:email',
        'phone' => 'required:phone',
        'message' => 'required:min:3',
    ];

    protected $messages = [
        'token.required' => 'Token could not created. Please refresh the page!',
    ];

    public function submitForm(){
        $validatedData = $this->validate();
        Contact::create($validatedData);
        session()->flash('message', 'Form submitted successfully.');
        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.contact.contact-form');
    }
}
