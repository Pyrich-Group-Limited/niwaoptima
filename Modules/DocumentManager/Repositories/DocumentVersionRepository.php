<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\DocumentVersion;
use App\Repositories\BaseRepository;

class DocumentVersionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'version_number',
        'document_id',
        'document_url',
        'created_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DocumentVersion::class;
    }
}
