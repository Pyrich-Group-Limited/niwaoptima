<?php

namespace Modules\DocumentManager\Http\Requests;

use Modules\DocumentManager\Models\Memo;
use Illuminate\Foundation\Http\FormRequest;

class CreateMemoRequest extends FormRequest
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
        return Memo::$rules;
    }
}
