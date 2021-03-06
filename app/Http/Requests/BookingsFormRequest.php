<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingsFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'booking_name' => 'required|string|min:3',
            'booking_credit_card' => 'required|string|size:16',
            'booking_room' => 'required|numeric|min:1|max:99',
            'booking_from' => '',
            'booking_to' => '',
            'booking_more_details' => 'required|string|min:3'
        ];
    }
}
