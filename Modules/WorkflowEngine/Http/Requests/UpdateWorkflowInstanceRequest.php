<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\WorkflowInstance;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkflowInstanceRequest extends FormRequest
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
        $rules = WorkflowInstance::$rules;
        
        return $rules;
    }
}
