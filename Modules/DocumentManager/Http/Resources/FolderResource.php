<?php

namespace Modules\DocumentManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'parent_folder_id' => $this->parent_folder_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
