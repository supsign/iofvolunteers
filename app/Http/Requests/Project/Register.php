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
            'name' => 'required|max:255|string',
            'organisation_name' => 'required|string|max:255',
            'organisation_webpage' => 'nullable|url|max:255',
            'organisation_contact' => 'nullable|string|max:255',
            'organisation_contact_position' => 'nullable|string|max:255',
            'organisation_email' => 'required|email:rfc,dns|max:255',
            'organisation_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
            'place' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'contact' => 'required|string|max:255',
            'driving_licence' => 'boolean',
            'offer_text' => 'nullable|string|max:255',
            'exprience_details' => 'required|string|max:255',
            'project_status_id' => 'required|int',
            'gender_id' => 'nullable|int',
            'country_id' => 'required|int',
            'continent_id' => 'required|int',
            'organisation_language_id' => 'nullable|int',
            'offer' => 'nullable|array',
            'discipline' => 'nullable|array',
            'skill' => 'nullable|array',
            'duty' => 'nullable|array',
            'other_duties' => 'nullable|string|max:255',
            'o_work_experience' => 'nullable|array',
        ];
    }
}
