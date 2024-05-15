<?php

namespace Modules\WorkflowEngine\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormFieldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'form_id' => $this->form_id,
            'field_name' => $this->field_name,
            'field_type_id' => $this->field_type_id,
            'field_label' => $this->field_label,
            'field_options' => $this->field_options,
            'is_required' => $this->is_required
        ];
    }
}
