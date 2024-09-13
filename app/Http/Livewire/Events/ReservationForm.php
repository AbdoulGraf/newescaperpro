<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class ReservationForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $event_type;
    public $message;
    public $date;
    public $time;

    protected $rules = [
        'first_name' => 'required:min:3',
        'last_name' => 'required:min:3',
        'email' => 'required:email',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'event_type' => 'required:numeric:min:1',
        'message' => 'required|min:3|max:1000',
        'date' => 'required',
        'time' => 'required',
    ];

    protected $messages = [
        'token.required' => 'Token could not created. Please refresh the page!',
        'email.required' => 'Please enter your email address ',
        'email.email' => ':attribute value :input isn\'t validated email address!', //notice here we are using dynamic values provided by the form submission.
        'phone.required' => 'Please give us a phone number',
        'date.required' => 'Please select event date!',
        'time.required' => 'Please select event hour!',
        'event_type.required' => 'Please select event type!',
        'message.required' => 'Please type your request!',
    ];

    public function submitForm()
    {
        $validatedData = $this->validate();
        Event::create($validatedData);
        session()->flash('message', 'Reservation created successfully.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.events.reservation-form');
    }
}
