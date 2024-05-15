<?php

namespace Modules\Shared\Http\Requests;

use Modules\Shared\Models\Branch;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
        $rules = Branch::$rules;
        $id = $this->route('branch');
        $rules['branch_name'] = 'required|unique:branches,branch_name,' . $id;
        $rules['branch_code'] = 'required|unique:branches,branch_code,' . $id;
        $rules['branch_email'] = 'required|unique:branches,branch_email,' . $id;
        $rules['branch_phone'] = 'required|unique:branches,branch_phone,' . $id;
        return $rules;
    }
}
