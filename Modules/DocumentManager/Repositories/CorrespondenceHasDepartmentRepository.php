<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\CorrespondenceHasDepartment;
use App\Repositories\BaseRepository;

class CorrespondenceHasDepartmentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'correspondence_id',
        'department_id',
        'assigned_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CorrespondenceHasDepartment::class;
    }

    public function findByDepartmentAndCorrespondence($department_id, $correspondence_id)
    {
        $query = $this->model->newQuery();

        return $query->where('department_id', '=', $department_id)->where('correspondence_id', '=', $correspondence_id)->first();
    }
}
