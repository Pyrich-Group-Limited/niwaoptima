<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\FormField;
use Illuminate\Foundation\Http\FormRequest;

class CreateFormAndFormFieldsRequest extends FormRequest
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
        $rules = [
            'form_id' => 'required',
            'form_fields' => 'required',
        ];
        return $rules;
    }
}
