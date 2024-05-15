<?php

namespace App\Http\API\Requests;

use InfyOm\Generator\Request\APIRequest;

class CreateUserAPIRequest extends APIRequest
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
        $rules = [
            'first_name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'roles'               => 'required'
        ];

        return $rules;
    }
}
