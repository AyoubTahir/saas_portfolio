<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'website_name_ar'       => 'required',
            'website_name_en'       => 'required',
            'footer_desc_ar'        => 'required',
            'footer_desc_en'        => 'required',
            'theme_mode'            => 'required',
            'website_status'        => 'required'
        ];
    }
}
