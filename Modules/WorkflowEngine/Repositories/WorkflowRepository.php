<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\Workflow;
use App\Repositories\BaseRepository;

class WorkflowRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'workflow_name',
        'workflow_type_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Workflow::class;
    }
}
