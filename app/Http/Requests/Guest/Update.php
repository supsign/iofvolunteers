<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name' => 'required|max:191|string',
            'birthdate' => 'required|date',
            'driving_licence' => 'required|boolean',
            'discipline' => 'nullable|array',
            'gender_id' => 'required|int',
            'email' => 'required|email:rfc,dns|max:191',
            'phone' => 'required|string',
            'contact_other' => 'nullable|string',
            'ol_duration' => 'required|int',
            'club' => 'nullable|string',
            'local_experience' => 'nullable|int',
            'national_experience' => 'nullable|int',
            'international_experience' => 'nullable|int',
            'language' => 'nullable|array',
            'other_languages' => 'nullable|string',
            'o_expectations' => 'nullable|string',
            'motivation' => 'nullable|string',
            'health_restrictions' => 'nullable|string',
            'offer' => 'nullable|string',
            'other_input' => 'nullable|string',

        ];
    }
}