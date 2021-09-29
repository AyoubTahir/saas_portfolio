<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'title_ar'      => 'required|max:150',
            'title_en'      => 'required|max:150',
            'desc_ar'       => 'required|max:200',
            'desc_en'       => 'required|max:200',
            'status'       => 'required',
        ];
    }
}
