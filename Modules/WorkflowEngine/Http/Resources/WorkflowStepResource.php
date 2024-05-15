<?php

namespace Modules\WorkflowEngine\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkflowStepResource extends JsonResource
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
            'workflow_id' => $this->workflow_id,
            'step_order' => $this->step_order,
            'parent_step_id' => $this->parent_step_id,
            'next_approved_id' => $this->next_approved_id,
            'next_rejected_id' => $this->next_rejected_id,
            'actor_type_id' => $this->actor_type_id,
            'actor_role_id' => $this->actor_role_id,
            'step_activity_id' => $this->step_activity_id,
            'step_type_id' => $this->step_type_id,
            'step_name' => $this->step_name
        ];
    }
}
