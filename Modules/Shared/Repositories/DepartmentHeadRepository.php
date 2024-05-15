<?php

namespace Modules\Shared\Repositories;

use Modules\Shared\Models\DepartmentHead;
use App\Repositories\BaseRepository;

class DepartmentHeadRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'name',
        'user_id',
    ];

     public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    } 

    public function model(): string
    {
        return DepartmentHead::class;
    }

    public function findByUser($user_id)
    {
        $query = $this->model->newQuery();

        return $query->where('user_id', $user_id)->get();
    }

    public function findByDepartmentId($department_id)
    {
        $query = $this->model->newQuery();

        return $query->where('department_id', $department_id)->first();
    }

    
}
