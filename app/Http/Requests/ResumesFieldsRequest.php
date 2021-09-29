<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumesFieldsRequest extends FormRequest
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
            'name_ar'           => 'required|max:150',
            'name_en'           => 'required|max:150',
            'job_ar'            => 'required|max:150',
            'job_en'            => 'required|max:150',
            'desc_ar'           => 'required|max:200',
            'desc_en'           => 'required|max:200',
            'date_from'         => 'required',
            'date_to'           => 'required',
        ];
    }
}
