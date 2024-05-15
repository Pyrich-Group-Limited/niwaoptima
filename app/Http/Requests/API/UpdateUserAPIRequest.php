<?php

namespace App\Http\API\Requests;

use InfyOm\Generator\Request\APIRequest;

class UpdateUserAPIRequest extends APIRequest
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
        $id = $this->route('user');
        $rules = [
            'first_name'     => 'required',
            //'email'    => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'roles'  => 'required'
        ];

        return $rules;
    }
}
