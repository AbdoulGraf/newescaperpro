<div>
    <span>Prices scales down per person</span>
    <br>
    <span>Number of Selected Players: {{ $player }}</span>
    <div class="my-2">
        @foreach($players as $item)
            <input @checked($loop->index == 0) autocomplete="off"
                   id="booking__players-radio--{{ $item->player }}"
                   class="visually-hidden booking__players-radio"
                   type="radio"
                   name="booking__players"
                   value="{{ $item->player }}"
                   wire:key="player-{{$loop->index}}"
                   wire:click="$emit('price', {{ $item->price }})"
                   wire:model="player"
                   wire:change.prevent="changePlayer()">
            <label class="booking__players" for="booking__players-radio--{{ $item->player }}">{{ $item->player }}</label>
        @endforeach
    </div>

</div>
