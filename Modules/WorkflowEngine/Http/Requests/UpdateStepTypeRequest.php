<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\StepType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStepTypeRequest extends FormRequest
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
        $rules = StepType::$rules;
        $id = $this->route('stepType');
        $rules['step_type'] = 'required|unique:step_types,step_type,' . $id;
        return $rules;
    }
}
