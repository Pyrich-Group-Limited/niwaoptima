<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\ActorType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActorTypeRequest extends FormRequest
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
        $rules = ActorType::$rules;
        $id = $this->route('actorType');
        $rules['actor_type'] = 'required|unique:actor_types,actor_type,' . $id;
        return $rules;
    }
}
