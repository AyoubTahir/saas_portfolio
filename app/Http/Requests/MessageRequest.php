<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    protected $redirect;

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
        $this->redirect = "/" . str_replace(' ', '-', $this->username) . "#contact";

        return [
            'full_name'         => 'required|max:150',
            'email'             => 'required|email|max:150',
            'subject'           => 'required|max:150',
            'message'           => 'required',
        ];
    }
}
