<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\MemoHasUser;
use App\Repositories\BaseRepository;

class MemoHasUserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'memo_id',
        'user_id',
        'assigned_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return MemoHasUser::class;
    }

    public function findByUser($user_id)
    {
        $query = $this->model->newQuery();

        return $query->where('user_id', '=', $user_id);
    }

    public function findByUserAndMemo($user_id, $memo_id)
    {
        $query = $this->model->newQuery();

        return $query->where('user_id', '=', $user_id)->where('memo_id', '=', $memo_id)->first();
    }
}
