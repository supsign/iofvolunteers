<?php

namespace App\Http\Requests\Volunteer;

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
            'name' => 'required|max:191',
            'country_id' => 'required|int',
            'email' => 'required|email:rfc,dns|max:191',
            'gender_id' => 'int',
            'birthdate' => 'required|date|before:-18 years',
            'driving_licence' => 'required|boolean',
            'discipline' => 'nullable|array',
            'ol_duration' => 'int',
            'club' => 'max:191',
            'local_experience' => 'nullable|int|max:1200',
            'national_experience' => 'nullable|int|max:1200',
            'international_experience' => 'nullable|int|max:1200',
            'language' => 'nullable|array',
            'other_languages' => 'nullable|string',
            'continent' => 'nullable|array',
            'work_duration' => 'int|nullable|max:1200',
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
            'skill_map_upload' => '',
        ];
    }
}
