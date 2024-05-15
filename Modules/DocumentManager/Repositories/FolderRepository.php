<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\Folder;
use App\Repositories\BaseRepository;

class FolderRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'parent_folder_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Folder::class;
    }

    public function rootFolders()
    {
        $query = $this->model->newQuery();

        return $query->where('parent_folder_id', '=', null);
    }

    public function findByName($name)
    {
        $query = $this->model->newQuery();

        return $query->where('name', '=', $name)->where('parent_folder_id', null);
    }

    public function findByNameAndParentId($name, $parent_folder_id)
    {
        $query = $this->model->newQuery();

        return $query->where('name', '=', $name)->where('parent_folder_id', '=', $parent_folder_id);
    }
}
