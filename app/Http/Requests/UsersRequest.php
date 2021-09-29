<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|unique:users|max:150',
            'email' => 'required|email|unique:users|max:150',
            'password' => 'required|max:150',
            'status' => 'required|max:1',
            'image' => 'required|mimes:jpg,jpeg,png',
        ];
    }
}
