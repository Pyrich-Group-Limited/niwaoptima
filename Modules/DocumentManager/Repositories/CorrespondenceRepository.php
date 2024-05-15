<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\Correspondence;
use App\Repositories\BaseRepository;

class CorrespondenceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'subject',
        'date',
        'sender',
        'reference_number',
        'description',
        'comments'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Correspondence::class;
    }
}
