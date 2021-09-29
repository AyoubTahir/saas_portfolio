<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'full_name_ar'      => 'required|max:150',
            'full_name_en'      => 'required|max:150',
            'sub_title_ar'      => 'required|max:150',
            'sub_title_en'      => 'required|max:150',
            'job_ar'            => 'required|max:150',
            'job_en'            => 'required|max:150',
            'description_ar'    => 'required',
            'description_en'    => 'required',
            'button_ar'         => 'required|max:50',
            'button_en'         => 'required|max:50',
            'status'            => 'required',
        ];
    }
}
