<?php
namespace Modules\HumanResource\Http\Requests;

use Modules\HumanResource\Models\LeaveRequest;
use Illuminate\Foundation\Http\FormRequest;


class updateleaverequests extends FormRequest
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
        $rules = LeaveRequest::$rules;
        
        return $rules;
    }
}
