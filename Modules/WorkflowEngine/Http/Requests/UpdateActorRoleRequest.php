<?php

namespace Modules\WorkflowEngine\Http\Requests;

use Modules\WorkflowEngine\Models\ActorRole;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActorRoleRequest extends FormRequest
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
        $rules = ActorRole::$rules;
        $id = $this->route('actorRole');
        $rules['actor_role'] = 'required|unique:actor_roles,actor_role,' . $id;
        return $rules;
    }
}
