<?php

namespace Modules\WorkflowEngine\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkflowTypeResource extends JsonResource
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
            'workflow_type' => $this->workflow_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
