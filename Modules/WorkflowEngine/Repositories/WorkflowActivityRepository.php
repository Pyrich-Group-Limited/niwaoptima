<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\WorkflowActivity;
use App\Repositories\BaseRepository;

class WorkflowActivityRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'workflow_step_id',
        'status',
        'user_id',
        'comment',
        'action',
        'action_date',
        'workflow_instance_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return WorkflowActivity::class;
    }
}
