<?php

namespace App\Http\Requests\Project;

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
            'name' => 'string',
            'organisation_name' => 'string',
            'organisation_webpage' => 'nullable|string',
            'organisation_contact' => 'string',
            'organisation_contact_position' => 'string',
            'organisation_email' => 'string',
            'organisation_phone' => 'string',
            'organisation_language_id' => 'int',
            'place' => 'nullable|string',
            'start_date' => 'date',
            'contact' => 'string',
            'driving_licence' => 'boolean',
            'offer_text' => 'nullable|string',
            'exprience_details' => 'nullable|string',
            'project_status_id' => 'nullable|int',
            'gender_id' => 'nullable|int',
            'country_id' => 'nullable|int',
            'organisation_language_id' => 'nullable|int',
            'offer' => 'array',
            'discipline' => 'array',
            'skill' => 'array',
            'duty' => 'array',
            'o_work_experience' => 'nullable|array',
        ];
    }
}
