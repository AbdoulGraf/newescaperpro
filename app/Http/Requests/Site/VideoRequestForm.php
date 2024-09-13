<?php

namespace App\Http\Requests\Site;

use App\Models\Hour;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VideoRequestForm extends FormRequest
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
            'firstname' => 'required:min:3',
            'lastname' => 'required:min:3',
            'email' => 'required:email',
            'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'store' => ['required', Rule::exists(Place::class, 'id')],
            'room' => ['required', Rule::exists(Room::class, 'id')],
            'date' => 'required|date',
            'time' => ['required', Rule::exists(Hour::class, 'id')],
            'video_type' => 'required:numeric:min:1',
            'payment_method' => 'required:numeric:min:1',
            'address_country' => 'required:min:3',
            'address_city' => 'required:min:3',
            'video_description' => 'sometimes',
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
