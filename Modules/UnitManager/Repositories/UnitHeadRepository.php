<?php

namespace Modules\UnitManager\Repositories;

use Modules\UnitManager\Models\UnitHead;
use App\Repositories\BaseRepository;

class UnitHeadRepository extends BaseRepository
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
        return UnitHead::class;
    }

    public function findByUser($user_id)
    {
        $query = $this->model->newQuery();

        return $query->where('user_id', $user_id)->get();
    }

    public function findByDepartmentId($unit_id)
    {
        $query = $this->model->newQuery();

        return $query->where('unit_id', $unit_id)->first();
    }
    
}
