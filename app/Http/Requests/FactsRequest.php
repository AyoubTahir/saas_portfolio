<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactsRequest extends FormRequest
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
            'cover'             => 'mimes:png,jpg|max:200',
            'status'            => 'required',
        ];
    }
}
