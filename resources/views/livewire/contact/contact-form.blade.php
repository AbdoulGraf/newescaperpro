<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <h3>Personal Detail</h3>
    <form wire:submit.prevent="submitForm" class="third-contact-form">
        <div class="row">
            <div class="col-sm-6">
                <input type="text" placeholder="Name" value="{{ old('$first_name') }}" wire:model.lazy="first_name" required>
                @if($errors->has('first_name')) <span class="text-danger">{{ $errors->first('first_name') }}</span> @endif
            </div>
            <div class="col-sm-6">
                <input name="last_name" type="text" placeholder="Surname" value="{{ old('last_name') }}" wire:model.lazy="last_name" required>
                @if($errors->has('last_name')) <span class="text-danger">{{ $errors->first('last_name') }}</span> @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <input name="email" type="email" placeholder="Email" wire:model.lazy="email" required>
                @if($errors->has('email')) <span class="text-danger">{{ $errors->first('email') }}</span> @endif
            </div>
            <div class="col-sm-6">
                <input name="phone" type="text" placeholder="Phone" wire:model.lazy="phone" required>
                @if($errors->has('phone')) <span class="text-danger">{{ $errors->first('phone') }}</span> @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <textarea wire:model="message" placeholder="Write Message..."></textarea>
                @if($errors->has('message')) <span class="text-danger">{{ $errors->first('message') }}</span> @endif
            </div>
        </div>
        <button type="submit" class="btn btn-style-2 mt-40 float-right" data-animation="fadeInUp" data-delay=".8s">Send</button>
    </form>
</div>
