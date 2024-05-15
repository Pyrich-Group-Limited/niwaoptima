<?php

namespace App\Repositories;

use App\Models\IncomingDocumentsCategory;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class IncomingDocumentsCategoryRepository
 * @package App\Repositories
*/

class IncomingDocumentsCategoryRepository extends BaseRepository
{
    
    protected $fieldSearchable = [
        'name',
        'description',
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return IncomingDocumentsCategory::class;
    }

    
}
