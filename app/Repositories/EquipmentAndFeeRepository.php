<?php

namespace App\Repositories;

use App\Models\EquipmentAndFee;
use App\Repositories\BaseRepository;

class EquipmentAndFeeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'service_id',
        'name',
        'price',
        'metric',
        'sub_service_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EquipmentAndFee::class;
    }
}
