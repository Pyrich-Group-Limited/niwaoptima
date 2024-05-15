<?php

namespace Modules\DTARequests\Repositories;

use Modules\DTARequests\Models\DtaReview;
use App\Repositories\BaseRepository;

class DtaReviewRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'dta_reviewid',
        'officer_id',
        'comments',
        'review_status',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DtaReview::class;
    }
}
