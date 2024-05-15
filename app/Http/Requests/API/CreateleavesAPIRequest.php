<?php

namespace Modules\Leaves\Http\Requests\API;

use Modules\Leaves\Models\leaves;
use InfyOm\Generator\Request\APIRequest;

class CreateleavesAPIRequest extends APIRequest
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
        return leaves::$rules;
    }
}
