<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\Department;
use App\Repositories\BaseRepository;

class DepartmentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'status',
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Department::class;
    }
}
