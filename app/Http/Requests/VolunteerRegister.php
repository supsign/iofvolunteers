<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerRegister extends FormRequest
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
            'id' => 'int',
            'name' => 'required|max:191',
            'country_id' => 'int',
            'email' => 'required|email|max:191',
            'gender_id' => 'int',
            'birthdate' => 'required|date',
            'nickname' => 'max:191',
            'driving_licence' => 'required|boolean',
            'discipline' => '',
            'ol_duration' => 'int|size:4',
            'club' => 'max:191',
            'o_experience' => '',
            'language' => '',
            'continent' => '',
            'work_duration' => 'int',
            'skill' => '',
            'skill_teaching' => '',
            'skill_mapping' => '',
            'skill_coaching' => '',
            'skill_event_organising' => '',
            'skill_it' => '',
            'skill_other' => '',
            'o_work_expirence' => '',
            'duty' => '',
            'help' => '',
            'expectation' => '',
            'agb' => 'required|boolean',
        ];
    }
}
