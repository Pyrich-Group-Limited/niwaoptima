<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\FormField;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFormFieldRequest extends FormRequest
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
        $rules = FormField::$rules;
        $id = $this->route('formField');
        $rules['field_name'] = 'required|unique:form_fields,field_name,' . $id . 'form_id';

        return $rules;
    }
}
