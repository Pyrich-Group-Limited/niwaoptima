<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\WorkflowType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkflowTypeRequest extends FormRequest
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
        $rules = WorkflowType::$rules;
        $id = $this->route('workflowType');
        $rules['workflow_type'] = 'required|unique:workflow_types,workflow_type,' . $id;
        return $rules;
    }
}
