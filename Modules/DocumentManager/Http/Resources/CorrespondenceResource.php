<?php

namespace Modules\DocumentManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorrespondenceResource extends JsonResource
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
            'subject' => $this->subject,
            'date' => $this->date,
            'sender' => $this->sender,
            'reference_number' => $this->reference_number,
            'description' => $this->description,
            'comments' => $this->comments,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
