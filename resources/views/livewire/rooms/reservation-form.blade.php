<div>

    <div class="row">

        <div class="col-lg-6">
            <h3>Personal Detail</h3>
            <form action="{{route('reservations.store')}}" class="third-contact-form">
                <input name="room_id" type="hidden" value="{{ $room_id }}">
                <input name="place_id" type="hidden" value="{{ $place_id }}">
                <input name="hour_id" type="hidden" value="{{ $hour_id }}">
                <input name="reservation_date" type="hidden" value="{{ $reservation_date }}">
                <input name="players" type="hidden" value="{{ $players }}">
                <div class="row">
                    <div class="col-sm-6">
                        <input name="first_name" type="text" placeholder="Name" value="{{ old('$first_name') }}" wire:model.lazy="first_name" required>
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
                    <div class="col-sm-6">
                        <input label="Pay Upon Arrival" type="radio" id="payment_method_1" name="payment_method" value="1" wire:click="toggleInputs(1)"   wire:model.lazy="payment_method" required>
                    </div>
                    <div class="col-sm-6">
                        <input label="Pay with Card" type="radio" id="payment_method_2" name="payment_method" value="2" wire:click="toggleInputs(2)"  wire:model.lazy="payment_method" >
                    </div>
                    @if($errors->has('payment_method')) <span class="text-danger">{{ $errors->first('payment_method') }}</span> @endif
                </div>
                @if($showInputs)
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="city" wire:model="city" placeholder="City">
                            @if($errors->has('city')) <span class="text-danger">{{ $errors->first('city') }}</span> @endif
                        </div>
                        <div class="col-sm-6">
                            <select name="country" wire:model="country">
                                <option>Select Country</option>
                                @foreach($countryList as $key => $value)
                                    <option value="{{ $key }}" title="{{ $value }}" @selected($key == "AE")>{{ $value }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country')) <span class="text-danger">{{ $errors->first('country') }}</span> @endif
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="address" wire:model="address" placeholder="Address">
                            @if($errors->has('address')) <span class="text-danger">{{ $errors->first('address') }}</span> @endif
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-12">
                        <input label="Have read and approved all terms" type="checkbox" id="terms" name="terms" wire:model.lazy="terms" value="1" required>
                        @if($errors->has('terms')) <span class="text-danger">{{ $errors->first('terms') }}</span> @endif
                    </div>
                    <div class="col-sm-12">
                        <input label="I have read and agree to the Privacy Policy." type="checkbox" id="privacy" name="privacy" wire:model.lazy="privacy" value="1" required>
                        @if($errors->has('privacy')) <span class="text-danger">{{ $errors->first('privacy') }}</span> @endif
                    </div>
                    <div class="col-sm-12">
                        <input label="I have read and agree to the liability policy." type="checkbox" id="liability" name="liability" wire:model.lazy="liability" value="1" required>
                        @if($errors->has('liability')) <span class="text-danger">{{ $errors->first('liability') }}</span> @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-style-2 py-3 my-3 float-right text-light" data-animation="fadeInUp" data-delay=".8s">submit</button>
            </form>
        </div>

        <div class="col-lg-6 mb-40">
            <h3>Order Detail</h3>
            <div class="col-md-6 float-right mx-0 px-0">
                <ul id="pdetails">
                    <li>
                        <span>Fullname</span>
                        <span>{{ $first_name }} {{ $last_name }}</span>
                    </li>
                    <li>
                        <span>Email</span>
                        <span>{{ $email }} </span>
                    </li>
                    <li>
                        <span>Phone</span>
                        <span>{{ $phone }}</span>
                    </li>
                    <li>
                        <span>Payment Methods</span>
                        <span>{{ ($payment_method == 2) ? 'Online' : 'Upon Arrival' }}</span>
                    </li>
                    <li>
                        <span>Terms and Conditions</span>
                        <span>{{ ($terms == 1) ? 'I approve' : '' }}</span>
                    </li>
                    <li>
                        <span>Privacy Policy</span>
                        <span>{{ ($privacy == 1) ? 'I approve' : '' }}</span>
                    </li>
                    <li>
                        <span>Disclaimer And Liability</span>
                        <span>{{ ($liability == 1) ? 'I approve' : '' }}</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 float-right mx-0 px-0">
                <ul id="odetails">
                    <li>
                        <span>Place</span>
                        <span>{{ $place }}</span>
                    </li>
                    <li>
                        <span>Room</span>
                        <span>{{ $room }}</span>
                    </li>
                    <li>
                        <span>Date</span>
                        <span>{{ $date }}</span>
                    </li>
                    <li>
                        <span>Time</span>
                        <span>{{ $reservation_hour }}</span>
                    </li>
                    <li>
                        <span>Players</span>
                        <span>{{ $players }}</span>
                    </li>
                    <li>
                        <span>Price per Person</span>
                        <span>AED {{ $price }}</span>
                    </li>
                    <li>
                        <span>Total Price</span>
                        <span>AED {{ $total }}</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12 float-right mx-0 px-0 mt-3">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>

    </div>

</div>
