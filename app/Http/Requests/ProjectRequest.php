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
            'title_ar'      => 'required',
            'title_en'      => 'required',
            'desc_ar'       => 'required',
            'desc_en'       => 'required',
            'client_ar'     => 'required',
            'client_en'     => 'required',
            'subject_ar'    => 'required',
            'subject_en'    => 'required',
            'website'       => 'required',
            'date'          => 'required',
            //'thumbnail'     => 'required|mimes:png,jpg',
        ];
    }
}
