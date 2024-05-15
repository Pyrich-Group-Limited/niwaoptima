<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\WorkflowStep;
use App\Repositories\BaseRepository;

class WorkflowStepRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'workflow_id',
        'step_order',
        'parent_step_id',
        'next_approved_id',
        'next_rejected_id',
        'actor_type_id',
        'actor_role_id',
        'step_activity_id',
        'step_type_id',
        'step_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return WorkflowStep::class;
    }
}
