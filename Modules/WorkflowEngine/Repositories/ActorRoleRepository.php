<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\ActorRole;
use App\Repositories\BaseRepository;

class ActorRoleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'actor_role'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ActorRole::class;
    }
}
