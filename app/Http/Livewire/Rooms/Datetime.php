<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Hour;
use App\Models\Reservation;
use Carbon\Carbon;
use Livewire\Component;

class Datetime extends Component
{
    public Reservation $reservation;

    public $selectedDate;

    public function changedDate($val){
        $this->emit('changedDate', $val);
    }


    public function render()
    {
        return view('livewire.rooms.datetime');
    }
}
