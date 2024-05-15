<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\Memo;
use App\Repositories\BaseRepository;

class MemoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description',
        'created_by',
        'document_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Memo::class;
    }
}
