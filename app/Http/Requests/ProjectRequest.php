<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'category_id'   => 'required',
            'title_ar'      => 'required|max:150',
            'title_en'      => 'required|max:150',
            'desc_ar'       => 'required|max:200',
            'desc_en'       => 'required|max:200',
            'client_ar'     => 'required|max:150',
            'client_en'     => 'required|max:150',
            'subject_ar'    => 'required|max:150',
            'subject_en'    => 'required|max:150',
            'website'       => 'required|max:240',
            'date'          => 'required',
            //'thumbnail'     => 'required|mimes:png,jpg',
        ];
    }
}
