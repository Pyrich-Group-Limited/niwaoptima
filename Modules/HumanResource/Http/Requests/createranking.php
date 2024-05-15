<?php

namespace Modules\HumanResource\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\HumanResource\Models\Ranking;

class createranking extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Ranking::$rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
