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
            'organisation_name' => 'string',
            'organisation_webpage' => 'string',
            'organisation_contact' => 'string',
            'organisation_contact_position' => 'string',
            'organisation_email' => 'string',
            'organisation_phone' => 'string',
            'organisation_language_id' => 'int',
            'place' => 'string',
            'start_date' => 'date',
            'contact' => 'string',
            'driving_licence' => 'boolean',
            'offer_text' => 'string',
            'exprience_details' => 'string',
        ];
    }
}
