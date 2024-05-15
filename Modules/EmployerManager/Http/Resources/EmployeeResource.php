<?php

namespace Modules\EmployerManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'employer_id' => $this->employer_id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'email' => $this->email,
            'employment_date' => $this->employment_date,
            'address' => $this->address,
            'local_govt_area' => $this->local_govt_area,
            'state_of_origin' => $this->state_of_origin,
            'phone_number' => $this->phone_number,
            'means_of_identification' => $this->means_of_identification,
            'identity_number' => $this->identity_number,
            'identity_issue_date' => $this->identity_issue_date,
            'identity_expiry_date' => $this->identity_expiry_date,
            'next_of_kin' => $this->next_of_kin,
            'next_of_kin_phone' => $this->next_of_kin_phone,
            'monthly_renumeration' => $this->monthly_renumeration,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
