<div>
    @if($room == 4)
        @foreach($hours->sortBy('id') as $item)
            <div class="available-time col">
                <a href="javascript:void(0);" class=""
                   data-place="{{ $place }}"
                   data-room="{{ $room }}"
                   data-hour="{{ $item->id }}"
                   data-date="{{ $selectedDate }}"
                   data-player="{{ $player }}">
                    <span class="time d-flex justify-content-center">{{ $item->start->format('H:i') }} - {{ $item->end->format('H:i') }}</span>
                    <span class="per d-flex justify-content-center">Coming Soon</span>
                </a>
            </div>
        @endforeach
    @else
        @foreach($hours->sortBy('id') as $item)
            <div class="available-time col">
                <a class="selectedDate" data-place="{{ $place }}" data-room="{{ $room }}" data-hour="{{ $item->id }}" data-date="{{ $selectedDate ?? $today }}" data-player="{{ $player }}">
                    <span class="time d-flex justify-content-center">{{ $item->start->format('H:i') }} - {{ $item->end->format('H:i') }}</span>
                    <span class="price d-flex justify-content-center">AED {{ $price }}</span>
                    <span class="per d-flex justify-content-center">per person</span>
                </a>
            </div>
        @endforeach
    @endif
</div>
