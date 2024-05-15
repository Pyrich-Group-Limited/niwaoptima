<?php

namespace Modules\UnitManager\Repositories;

use Modules\UnitManager\Models\Units;
use App\Repositories\BaseRepository;

class UnitRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'unit_name'
    ];
     public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    } 

    public function model(): string
    {
        return Units::class;
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
