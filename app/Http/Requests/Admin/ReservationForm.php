<?php

namespace App\Http\Requests\Admin;

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
        $todayDate = date('Y-m-d');
        return [
            'place_id' => ['required', Rule::exists(Place::class, 'id')],
            'room_id' => ['required', Rule::exists(Room::class, 'id')],
            'hour_id' => ['required', Rule::exists(Hour::class, 'id')],
            'payment_method' => 'required:numeric:min:1',
            'players' => 'required',
            'reservation_date' => 'required|date_format:Y-m-d|after_or_equal:'.$todayDate,
            'first_name' => 'required:min:3',
            'last_name' => 'sometimes:min:3',
            'email' => 'sometimes:email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'comment' => 'sometimes',
            'promotion_code' => 'sometimes',
            'discount' => 'sometimes',
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
