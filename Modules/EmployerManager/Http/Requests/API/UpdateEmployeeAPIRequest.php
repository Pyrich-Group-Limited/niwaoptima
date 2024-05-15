<?php

namespace Modules\EmployerManager\Http\Requests\API;

use Modules\EmployerManager\Models\Employee;
use InfyOm\Generator\Request\APIRequest;

class UpdateEmployeeAPIRequest extends APIRequest
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
        $rules = Employee::$rules;
        
        return $rules;
    }
}
