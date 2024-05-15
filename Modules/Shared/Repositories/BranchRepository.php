<?php

namespace Modules\Shared\Repositories;

use Modules\Shared\Models\Branch;
use App\Repositories\BaseRepository;

class BranchRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'branch_name',
        'branch_region',
        'branch_code',
        'last_ecsnumber',
        'highest_rank',
        'staff_strength',
        'managing_id',
        'branch_email',
        'branch_phone',
        'branch_address'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Branch::class;
    }
}
