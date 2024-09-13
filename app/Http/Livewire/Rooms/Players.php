<?php

namespace App\Http\Livewire\Rooms;

use Livewire\Component;

class Players extends Component
{
    public $players;
    public $player = 2;
    public $perPrice;



    public function mount($players)
    {
        $this->perPrice = $players[0]->price;
    }

    public function changePlayer(){
        $this->emit('player', $this->player);
    }

    public function render()
    {
        return view('livewire.rooms.players');
    }
}
