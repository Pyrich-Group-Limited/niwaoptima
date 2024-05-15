<?php

namespace Modules\DTARequests\Repositories;

use Modules\DTARequests\Models\DTARequests;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Modules\UnitManager\Models\UnitHead;


class DTARequestsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'branch_id',
        'user_id',
        'images',
        'regional_manager_status',
        'head_office_status',
        'medical_team_status'
    ];
    //DTARequestsRepository
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DTARequests::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }

    public function getByUserId($id)
    {
        return DB::table('dta_requests')->where('user_id', $id)->paginate(10);
    }

    public function getByUnitHeadId($id)
    {
        //return DB::table('dta_requests')->where('unit_head_id', $id)->paginate(10);
        return DTARequests::where('unit_head_id', $id)->paginate(10);
    }

    public function getByBranchId($id)
    {
        //return DB::table('dta_requests')->where('unit_head_id', $id)->paginate(10);
        return DTARequests::where('branch_id', $id)->paginate(10);
    }


    public function isUnitHeadInSameDepartment($loggedInUserId, $departmentId)
    {

        // Check if there is any other user with the role of 'unit_head' in the same department
        $unitHeadUserId = DB::table('unit_heads')
            ->select('staff.user_id')
            ->join('staff', 'unit_heads.user_id', '=', 'staff.user_id')
            ->where('staff.department_id', $departmentId)
            ->where('unit_heads.user_id', '!=', $loggedInUserId) // Exclude the logged-in user from the result
            ->value('staff.user_id');

        return $unitHeadUserId;
    }

    public function getUnitHeadInfo($loggedInUserId, $departmentId)
    {
        $d = intval($departmentId);
        $u = intval($loggedInUserId);
        // Check if there is any other user with the role of 'unit_head' in the same department
        /* $unitHeadUserId = DB::table('unit_heads')
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.email')
            ->join('staff', 'unit_heads.user_id', '=', 'staff.user_id')
            ->join('users', 'staff.user_id', '=', 'users.id')
            ->where('staff.department_id', $d)
            ->where('unit_heads.user_id', '!=', $u) // Exclude the logged-in user from the result
            ->first(); */
        //->value('users.id','users.first_name', 'users.last_name', 'users.email');
        $unitHeadUserId = UnitHead::with('user')
                ->join('staff', 'unit_heads.user_id', '=', 'staff.user_id')
                ->where('staff.department_id', $d)
                ->where('unit_heads.user_id', '!=', $u)
                ->first();

        return $unitHeadUserId;
    }
}
