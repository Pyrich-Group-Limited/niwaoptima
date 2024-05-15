<?php

namespace Modules\DocumentManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorrespondenceHasDepartmentResource extends JsonResource
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
            'correspondence_id' => $this->correspondence_id,
            'department_id' => $this->department_id,
            'assigned_by' => $this->assigned_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
