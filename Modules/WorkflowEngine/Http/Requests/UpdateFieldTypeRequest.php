<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\FieldType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldTypeRequest extends FormRequest
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
        $rules = FieldType::$rules;
        $id = $this->route('fieldType');
        $rules['field_type'] = 'required|unique:field_types,field_type,' . $id;
        return $rules;
    }
}
