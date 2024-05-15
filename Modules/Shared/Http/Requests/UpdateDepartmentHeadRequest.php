<?php

namespace Modules\Shared\Http\Requests;

use Modules\Shared\Models\DepartmentHead;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentHeadRequest extends FormRequest
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
        $rules = DepartmentHead::$rules;
        
        return $rules;
    }
}
