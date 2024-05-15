<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\WorkflowInstance;
use App\Repositories\BaseRepository;

class WorkflowInstanceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'workflow_id',
        'started_by',
        'date_completed'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return WorkflowInstance::class;
    }
}
