<?php

namespace App\Http\Requests\Host;

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
            'max_duration' => 'required|int',
            'host_desc' => 'required|string',
            'guest_expectations' => 'nullable|string',
            'name' => 'required|max:191|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|email:rfc,dns|max:191',
            'contact_other' => 'nullable|string',
            'language' => 'nullable|array',
            'other_languages' => 'nullable|string',
            'offer' => 'nullable|array',
            'offer_text' => 'nullable|string',
        ];
    }
}
