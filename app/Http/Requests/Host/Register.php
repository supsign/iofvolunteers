<?php

namespace App\Http\Requests\Host;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'country_id' => 'required|int',
            'maxDuration' => 'required|int',
            'hostDesc' => 'required|string',
            'guestExpectations' => 'nullable|string',
            'name' => 'required|max:191|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|email:rfc,dns|max:191',
            'contact_other' => 'nullable|string',
            'language' => 'nullable|array',
            'other_languages' => 'nullable|string',
            'offer' => 'nullable|array',
            'offer_text' => 'nullable|string',
        ];
    }
}
