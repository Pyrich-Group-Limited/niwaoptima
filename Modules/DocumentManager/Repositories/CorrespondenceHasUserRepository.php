<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\CorrespondenceHasUser;
use App\Repositories\BaseRepository;

class CorrespondenceHasUserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'correspondence_id',
        'user_id',
        'assigned_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CorrespondenceHasUser::class;
    }

    public function findByUser($user_id)
    {
        $query = $this->model->newQuery();

        return $query->where('user_id', '=', $user_id);
    }

    public function findByUserAndCorrespondence($user_id, $correspondence_id)
    {
        $query = $this->model->newQuery();

        return $query->where('user_id', '=', $user_id)->where('correspondence_id', '=', $correspondence_id)->first();
    }
}
