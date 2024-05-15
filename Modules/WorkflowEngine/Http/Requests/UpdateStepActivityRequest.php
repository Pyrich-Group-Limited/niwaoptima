<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\StepActivity;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStepActivityRequest extends FormRequest
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
        $rules = StepActivity::$rules;
        $id = $this->route('stepActivity');
        $rules['step_activity'] = 'required|unique:step_activities,step_activity,' . $id;
        return $rules;
    }
}
