<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Hour;
use Livewire\Component;
use Carbon\Carbon;

class Hours extends Component
{

    public Hour $hour;
    public $hours, $price, $player, $place, $room, $selectedDate;
    public $today, $toHour, $nextHours, $todayHours, $nextDays;


    protected $listeners = ['price', 'player', 'changedDate'];


    public function mount(){
        $this->today = Carbon::parse(now())->toDateString();
        $this->toHour = Carbon::now()->toTimeString();
        $this->selectedDate = $this->today;
        $this->player = 2;
    }



    public function changedDate($date){
        $this->selectedDate = $date;
        $this->hours = $this->selectedDate == $this->today
            ? Hour::available($this->room)->get()
            : Hour::next(["room" => $this->room, "date" => $this->selectedDate])->get();
    }



    public function price($price)
    {
        $this->price = $price;
    }
    public function player($player)
    {
        $this->player = $player;
    }

    public function render()
    {
        return view('livewire.rooms.hours');
    }
}
