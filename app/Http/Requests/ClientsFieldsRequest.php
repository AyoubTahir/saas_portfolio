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
            'project_ar'    => 'required',
            'project_en'    => 'required',
            'name_ar'       => 'required',
            'name_en'       => 'required',
            'job_ar'        => 'required',
            'job_en'        => 'required',
            'opinion_ar'    => 'required',
            'opinion_en'    => 'required',
            'rating'        => 'required|integer',
            'image'         => 'required',
        ];
    }
}
