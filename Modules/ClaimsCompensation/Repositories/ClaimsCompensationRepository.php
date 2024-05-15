<?php

namespace Modules\ClaimsCompensation\Repositories;

use Modules\ClaimsCompensation\Models\ClaimsCompensation;
use App\Repositories\BaseRepository;

class ClaimsCompensationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'branch_id',
        'user_id',
        'images',
        'regional_manager_status',
        'head_office_status',
        'medical_team_status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ClaimsCompensation::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }
}
