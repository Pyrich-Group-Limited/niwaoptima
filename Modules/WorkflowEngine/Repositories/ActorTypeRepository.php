<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\ActorType;
use App\Repositories\BaseRepository;

class ActorTypeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'actor_type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ActorType::class;
    }
}
