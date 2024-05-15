<?php

namespace Modules\DocumentManager\Http\Requests;

use Modules\DocumentManager\Models\Memo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMemoRequest extends FormRequest
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
        $rules = Memo::$rules;
        $id = $this->route('memo');
        $rules['title'] = 'required|unique:memos,title,' . $id;
        return $rules;
    }
}
