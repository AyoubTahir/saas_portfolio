<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterestRequest extends FormRequest
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
            'title_ar'          => 'required|max:150',
            'title_en'          => 'required|max:150',
            'description_ar'    => 'required|max:200',
            'description_en'    => 'required|max:200',
            'status'            => 'required',
        ];
    }
}
