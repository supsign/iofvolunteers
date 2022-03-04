<?php

namespace App\Http\Requests\Guest;

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
            'name' => 'required|max:255|string',
            'birthdate' => 'required|date|before:-18 years',
            'driving_licence' => 'required|boolean',
            'discipline' => 'nullable|array',
            'gender_id' => 'nullable|int',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
            'contact_other' => 'nullable|string|max:255',
            'ol_duration' => 'required|int',
            'club' => 'nullable|string|max:255',
            'local_experience' => 'nullable|int',
            'national_experience' => 'nullable|int',
            'international_experience' => 'nullable|int',
            'language' => 'nullable|array',
            'other_languages' => 'nullable|string|max:255',
            'o_expectations' => 'nullable|string',
            'motivation' => 'nullable|string',
            'health_restrictions' => 'nullable|string',
            'offer' => 'nullable|string',
            'other_input' => 'nullable|string',
        ];
    }
}
