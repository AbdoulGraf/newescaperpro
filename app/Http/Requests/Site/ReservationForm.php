<?php

namespace App\Http\Requests\Site;

use App\Models\Hour;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required:min:3',
            'last_name' => 'required:min:3',
            'email' => 'required:email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'place_id' => ['required', Rule::exists(Place::class, 'id')],
            'room_id' => ['required', Rule::exists(Room::class, 'id')],
            'hour_id' => ['required', Rule::exists(Hour::class, 'id')],
            'payment_method' => 'required:numeric:min:1',
            'reservation_date' => 'required',
            'players' => 'required',
            'terms' => 'required',
            'privacy' => 'required',
            'liability' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'Your name is required!',
            'last_name.required' => 'Your surname is required!',
            'email.required' => 'Your email is required!',
            'phone.required' => 'Your phone is required!',
            'payment_method.required' => 'You must select the payment method!',
        ];
    }

}
