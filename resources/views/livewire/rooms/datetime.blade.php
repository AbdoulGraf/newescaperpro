<div>
    <span>Choose date &amp; time: </span>
    <input name="booking__date" class="flatpickr flatpickr-input active" type="text" placeholder="Select Date.." readonly="readonly" wire:model="selectedDate" wire:change="changedDate($event.target.value)">
</div>
