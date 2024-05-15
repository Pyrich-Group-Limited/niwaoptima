<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\StepActivity;
use App\Repositories\BaseRepository;

class StepActivityRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'step_activity'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return StepActivity::class;
    }
}
