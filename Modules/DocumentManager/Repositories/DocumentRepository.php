<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\Document;
use App\Repositories\BaseRepository;

class DocumentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description',
        'document_url',
        'folder_id',
        'created_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Document::class;
    }

    public function findByTitleAndFolderId($title, $folder_id)
    {
        $query = $this->model->newQuery();

        return $query->where('title', '=', $title)->where('folder_id', '=', $folder_id);
    }
}
