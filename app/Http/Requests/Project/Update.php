<?php

namespace App\Http\Requests\Project;

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
            'name' => 'required|max:191|string',
            'organisation_name' => 'required|string',
            'organisation_webpage' => 'nullable|url',
            'organisation_contact' => 'nullable|string',
            'organisation_contact_position' => 'nullable|string',
            'organisation_email' => 'required|email:rfc,dns|max:191',
            'organisation_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'place' => 'nullable|string',
            'start_date' => 'nullable|date',
            'contact' => 'required|string',
            'driving_licence' => 'boolean',
            'offer_text' => 'nullable|string',
            'exprience_details' => 'required|string',
            'project_status_id' => 'required|int',
            'gender_id' => 'nullable|int',
            'country_id' => 'required|int',
            'continent_id' => 'required|int',
            'organisation_language_id' => 'nullable|int',
            'offer' => 'nullable|array',
            'discipline' => 'nullable|array',
            'skill' => 'nullable|array',
            'duty' => 'nullable|array',
            'other_duties' => 'nullable|string',
            'o_work_experience' => 'nullable|array',
        ];
    }
}
