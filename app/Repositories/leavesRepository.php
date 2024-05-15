<?php

namespace Modules\Leaves\Repositories;

use Modules\Leaves\Models\leaves;
use App\Repositories\BaseRepository;

class leavesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'days',
        'title',
        'age'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return leaves::class;
    }
}
