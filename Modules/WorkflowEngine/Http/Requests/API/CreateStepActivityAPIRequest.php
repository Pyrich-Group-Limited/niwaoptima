<?php

namespace Modules\WorkflowEngine\Http\Requests\API;

use Modules\WorkflowEngine\Models\StepActivity;
use InfyOm\Generator\Request\APIRequest;

class CreateStepActivityAPIRequest extends APIRequest
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
        return StepActivity::$rules;
    }
}
