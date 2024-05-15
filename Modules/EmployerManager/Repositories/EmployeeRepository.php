<?php

namespace Modules\EmployerManager\Repositories;

use Modules\EmployerManager\Models\Employee;
use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employer_id',
        'last_name',
        'first_name',
        'middle_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'email',
        'employment_date',
        'address',
        'local_govt_area',
        'state_of_origin',
        'phone_number',
        'means_of_identification',
        'identity_number',
        'identity_issue_date',
        'identity_expiry_date',
        'next_of_kin',
        'next_of_kin_phone',
        'monthly_renumeration',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Employee::class;
    }
}
