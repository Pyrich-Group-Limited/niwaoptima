<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\StepType;
use App\Repositories\BaseRepository;

class StepTypeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'step_type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return StepType::class;
    }
}
