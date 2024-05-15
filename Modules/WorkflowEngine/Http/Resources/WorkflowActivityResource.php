<?php

namespace Modules\WorkflowEngine\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkflowActivityResource extends JsonResource
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
            'workflow_step_id' => $this->workflow_step_id,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'comment' => $this->comment,
            'action' => $this->action,
            'action_date' => $this->action_date,
            'workflow_instance_id' => $this->workflow_instance_id
        ];
    }
}
