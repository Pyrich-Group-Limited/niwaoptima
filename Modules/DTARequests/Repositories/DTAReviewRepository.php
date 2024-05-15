<?php

namespace Modules\DTARequests\Repositories;

use Modules\DTARequests\Models\DTAReview;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class DTAReviewRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'dtarequest_id',
        'comments',
        'staff_id',
        'review_status',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DTAReview::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }

    public function getAllRequestsById($id)
    {
        //return DB::table('dta_reviews')->where('user_id', $id)->paginate(10);
        $results = DB::table('dta_requests')
    ->join('dta_reviews', 'dta_requests.id', '=', 'dta_reviews.dta_id')
    ->select('dta_requests.*', 'dta_reviews.*')
    ->where('dta_requests.user_id',$id)
    ->distinct()
    ->get();
    return $results;
    }
    public function getAllRequests()
    {
        //return DB::table('dta_reviews')->where('user_id', $id)->paginate(10);
        $results = DB::table('dta_requests')
    ->join('dta_reviews', 'dta_requests.id', '=', 'dta_reviews.dta_id')
    ->select('dta_requests.*', 'dta_reviews.*')
    ->distinct()
    ->get();
    return $results;
    }
}
