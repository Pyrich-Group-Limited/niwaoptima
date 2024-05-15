<?php

namespace Modules\WorkflowEngine\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkflowResource extends JsonResource
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
            'workflow_name' => $this->workflow_name,
            'workflow_type_id' => $this->workflow_type_id
        ];
    }
}
