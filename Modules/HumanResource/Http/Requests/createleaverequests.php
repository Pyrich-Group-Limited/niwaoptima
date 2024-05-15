<?php

namespace Modules\HumanResource\Http\Requests;

use Modules\HumanResource\Models\LeaveRequest;
use Illuminate\Foundation\Http\FormRequest;

class createleaverequests extends FormRequest
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
        return LeaveRequest::$rules;
    }
}
