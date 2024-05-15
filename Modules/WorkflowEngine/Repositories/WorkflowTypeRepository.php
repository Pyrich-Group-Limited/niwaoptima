<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\WorkflowType;
use App\Repositories\BaseRepository;

class WorkflowTypeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'workflow_type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return WorkflowType::class;
    }
}
