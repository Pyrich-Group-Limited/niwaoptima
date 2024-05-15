<?php

namespace Modules\WorkflowEngine\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FieldTypeResource extends JsonResource
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
            'field_type' => $this->field_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
