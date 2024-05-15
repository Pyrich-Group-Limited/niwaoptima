<?php

namespace App\Repositories;

use App\Models\IncomingDocuments;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class IncomingDocumentsRepository
 * @package App\Repositories
*/

class IncomingDocumentsRepository extends BaseRepository
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
        return IncomingDocuments::class;
    }

    
}
