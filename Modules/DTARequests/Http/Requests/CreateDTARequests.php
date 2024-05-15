<?php

namespace Modules\DTARequests\Http\Requests;

use Modules\DTARequests\Models\DTARequests;
use Illuminate\Foundation\Http\FormRequest;

class CreateDTARequests extends FormRequest
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
        return DTARequests::$rules;
    }
}
