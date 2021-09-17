<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
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
            'title_ar'          => 'required',
            'title_en'          => 'required',
            'job_ar'            => 'required',
            'job_en'            => 'required',
            'description_ar'    => 'required',
            'description_en'    => 'required',
            'button_ar'         => 'required',
            'button_en'         => 'required',
        ];
    }
}
