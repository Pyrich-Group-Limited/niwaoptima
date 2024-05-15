<?php

namespace Modules\HumanResource\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Modules\HumanResource\Models\Ranking;


class RankingRepository extends BaseRepository
{
     protected $fieldSearchable = [
    
     ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ranking::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }

    public function getById($id)
    {
        $query = $this->model->newQuery();

        return $query->where('id', $id)->first();
    }
    // public function geteditrank($id){
    //     return DB::table('rankings')
    //     ->join('staff','rankings.id','=','staff.ranking_id');

    // }
    
}
