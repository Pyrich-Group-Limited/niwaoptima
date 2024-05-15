<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\MemoHasDepartment;
use App\Repositories\BaseRepository;

class MemoHasDepartmentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'memo_id',
        'department_id',
        'assigned_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return MemoHasDepartment::class;
    }

    public function findByDepartmentAndMemo($department_id, $memo_id)
    {
        $query = $this->model->newQuery();

        return $query->where('department_id', '=', $department_id)->where('memo_id', '=', $memo_id)->first();
    }
}
