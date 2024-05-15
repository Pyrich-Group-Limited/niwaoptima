<?php

namespace Modules\DocumentManager\Http\Requests;

use Modules\DocumentManager\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
        $rules = Document::$rules;
        $id = $this->route('document');
        $rules['folder_id'] = 'required|unique:documents,folder_id,' . $id . 'title';

        return $rules;
    }
}
