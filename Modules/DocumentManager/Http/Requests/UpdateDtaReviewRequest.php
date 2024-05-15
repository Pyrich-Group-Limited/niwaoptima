<?php

namespace Modules\DTARequests\Http\Requests;

use Modules\DTARequests\Models\DtaReview;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDtaReviewRequest extends FormRequest
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
        $rules = DtaReview::$rules;

        return $rules;
    }
}
