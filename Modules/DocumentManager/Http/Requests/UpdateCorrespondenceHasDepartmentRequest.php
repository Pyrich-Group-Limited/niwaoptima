<?php

namespace Modules\DocumentManager\Http\Requests;

use Modules\DocumentManager\Models\CorrespondenceHasDepartment;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCorrespondenceHasDepartmentRequest extends FormRequest
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
        $rules = CorrespondenceHasDepartment::$rules;
        
        return $rules;
    }
}
