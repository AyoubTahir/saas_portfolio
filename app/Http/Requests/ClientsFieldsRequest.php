<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsFieldsRequest extends FormRequest
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
            'project_ar'    => 'required|max:150',
            'project_en'    => 'required|max:150',
            'name_ar'       => 'required|max:150',
            'name_en'       => 'required|max:150',
            'job_ar'        => 'required|max:150',
            'job_en'        => 'required|max:150',
            'opinion_ar'    => 'required',
            'opinion_en'    => 'required',
            'rating'        => 'required|integer',
            'image'         => 'required|max:200',
        ];
    }
}
