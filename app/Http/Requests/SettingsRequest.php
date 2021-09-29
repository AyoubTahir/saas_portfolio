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
            'website_name_ar'       => 'required|max:150',
            'website_name_en'       => 'required|max:150',
            'footer_desc_ar'        => 'required|max:200',
            'footer_desc_en'        => 'required|max:200',
            'theme_mode'            => 'required|max:150',
            'website_status'        => 'required'
        ];
    }
}
