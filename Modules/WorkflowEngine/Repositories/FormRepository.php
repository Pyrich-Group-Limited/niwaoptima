<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\Form;
use App\Repositories\BaseRepository;

class FormRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'form_name',
        'has_workflow',
        'workflow_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Form::class;
    }
}
