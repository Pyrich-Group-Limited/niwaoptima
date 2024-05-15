<?php

namespace Modules\UnitManager\Repositories;

use Modules\UnitManager\Models\Region;
use App\Repositories\BaseRepository;

class RegionRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'name'
    ];
     public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    } 

    public function model(): string
    {
        return Region::class;
    }

    public function findByDepartment($department_id)
    {
        $query = $this->model->newQuery();

        return $query->where('department_id', $department_id)->get();
    }

    public function findByUnitHead($unit_head_id)
    {
        $query = $this->model->newQuery();

        return $query->where('unit_head_id', $unit_head_id)->get();
    }
}
