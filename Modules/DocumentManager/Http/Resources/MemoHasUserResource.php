<?php

namespace Modules\DocumentManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemoHasUserResource extends JsonResource
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
            'memo_id' => $this->memo_id,
            'user_id' => $this->user_id,
            'assigned_by' => $this->assigned_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
