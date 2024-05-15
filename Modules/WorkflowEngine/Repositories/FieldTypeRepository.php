<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\FieldType;
use App\Repositories\BaseRepository;

class FieldTypeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'field_type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FieldType::class;
    }
}
