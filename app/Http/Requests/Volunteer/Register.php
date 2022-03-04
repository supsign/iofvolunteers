<?php

namespace App\Http\Requests\Volunteer;

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
            'name' => 'required|max:255',
            'country_id' => 'required|int',
            'email' => 'required|email:rfc,dns|max:255',
            'gender_id' => 'int',
            'birthdate' => 'required|date|before:-18 years',
            'driving_licence' => 'required|boolean',
            'discipline' => 'nullable|array',
            'ol_duration' => 'int',
            'club' => 'max:255',
            'local_experience' => 'nullable|int',
            'national_experience' => 'nullable|int',
            'international_experience' => 'nullable|int',
            'language' => 'nullable|array',
            'other_languages' => 'nullable|string|max:255',
            'continent' => 'nullable|array',
            'work_duration' => 'int|nullable',
            'skill' => 'nullable|array',
            'skill_teaching' => 'nullable|string',
            'skill_mapping' => 'nullable|string',
            'skill_coaching' => 'nullable|string',
            'skill_event_organising' => 'nullable|string',
            'skill_it' => 'nullable|string',
            'skill_other' => 'nullable|string',
            'o_work_experience' => 'nullable|array',
            'duty' => 'nullable|array',
            'help' => 'string',
            'expectation' => 'nullable|string',
            'agb' => 'required|boolean',
            'skill_map_upload' => '',
        ];
    }
}
