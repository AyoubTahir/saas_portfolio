<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillsRequest extends FormRequest
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
            'expertise_field_id' => 'required',
            'skill_ar' => 'required',
            'skill_en' => 'required',
            'lvl' => 'required|integer'
        ];
    }
}
