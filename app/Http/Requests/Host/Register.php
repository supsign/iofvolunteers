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
            'zip' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'max_duration' => 'required|int',
            'host_desc' => 'required|string',
            'guest_expectations' => 'nullable|string',
            'name' => 'required|max:255|string',
            'contact_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
            'contact_email' => 'required|email:rfc,dns|max:255',
            'contact_other' => 'nullable|string|max:255',
            'language' => 'nullable|array',
            'other_languages' => 'nullable|string|max:255',
            'offer' => 'nullable|array',
            'offer_text' => 'nullable|string|max:255',
        ];
    }
}
