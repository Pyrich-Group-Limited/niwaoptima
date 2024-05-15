<?php

namespace Modules\HumanResource\Repositories;

use Modules\HumanResource\Models\LeaveType;
use App\Repositories\BaseRepository;
use LeaveType as GlobalLeaveRequest;

class LeaveTypeRepository extends BaseRepository
{
     protected $fieldSearchable = [

     ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return LeaveType::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }

    public function getById($id)
    {
        $query = $this->model->newQuery();

        return $query->where('id', $id)->first();
    }

}
