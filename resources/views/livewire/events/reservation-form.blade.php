<div class="my-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submitForm" class="third-contact-form">
        <div class="col d-flex p-0">
            <div class="col-6 m-0 p-0">
                <div class="form-group">
                    <input type="text" wire:model="first_name" class="form-control" id="first_name" placeholder="First Name">
                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6 m-0 p-0 ml-2">
                <div class="form-group">
                    <input type="text" wire:model="last_name" class="form-control" id="last_name" placeholder="Last Name">
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="col d-flex p-0">
            <div class="col-6 m-0 p-0">
                <div class="form-group">
                    <input type="email" wire:model="email" class="form-control" id="email" placeholder="Email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6 m-0 p-0 ml-2">
                <div class="form-group">
                    <input type="text" wire:model="phone" class="form-control" id="phone" placeholder="Phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="col d-flex p-0">
            <div class="col-6 m-0 p-0">
                <div class="form-group">
                    <input label="Birthday Event" type="radio" id="event_1" value="1" wire:model="event_type">
                    @error('event_type') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6 m-0 p-0 ml-2">
                <div class="form-group">
                    <input label="Corporate Event" type="radio" id="event_2" value="2" wire:model="event_type">
                    @error('event_type') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="col d-flex p-0">
            <div class="col-6 m-0 p-0">
                <div class="form-group">
                    <input type="date" wire:model="date" class="form-control" id="date" placeholder="Select Date">
                    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6 m-0 p-0 ml-2">
                <div class="form-group">
                    <input type="time" wire:model="time" class="form-control" id="time" placeholder="Select Time">
                    @error('time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="col  m-0 p-0 form-group">
            <textarea id="message" class="form-control" rows="4" wire:model="message" placeholder="Type your request" style="min-height: auto"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-style-2 py-3 my-5 float-right text-light" data-animation="fadeInUp" data-delay=".8s">submit</button>
    </form>
</div>
