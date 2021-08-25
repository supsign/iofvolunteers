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
            'country_id' => 'int',
            'email' => 'required|email:rfc,dns|max:191',
            'gender_id' => 'int',
            'birthdate' => 'required|date',
            'nickname' => 'max:191',
            'driving_licence' => 'required|boolean',
            'discipline' => 'array',
            'ol_duration' => 'int',
            'club' => 'nullable|max:191',
            'local_experience' => 'nullable|int',
            'national_experience' => 'nullable|int',
            'international_experience' => 'nullable|int',
            'language' => 'array',
            'continent' => 'array',
            'work_duration' => 'int|nullable',
            'skill' => 'array',
            'skill_mapping' => 'string',
            'skill_teaching' => 'string',
            'skill_coaching' => 'string',
            'skill_event_organising' => 'string',
            'skill_it' => 'string',
            'skill_other' => 'string',
            'o_work_expirence' => 'array',
            'duty' => 'array',
            'help' => 'string',
            'expectation' => 'string',
        ];
    }
}
