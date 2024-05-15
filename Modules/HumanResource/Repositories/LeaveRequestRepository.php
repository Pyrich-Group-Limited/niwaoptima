<?php

namespace Modules\HumanResource\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Modules\HumanResource\Models\LeaveRequest;
//use LeaveRequest as GlobalLeaveRequest;

class LeaveRequestRepository extends BaseRepository
{
     protected $fieldSearchable = [
//
     ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return LeaveRequest::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }

    public function getByUserId($id)
    {
        return DB::table('leave_request')->where('user_id', $id)->paginate(10);
    }

    public function getByUnitHeadId($id)
    {
        return DB::table('leave_request')->where('unit_head_id', $id)->paginate(10);
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
        $unitHeadUserId = DB::table('unit_heads')
        ->select('users.id','users.first_name', 'users.last_name', 'users.email')
        ->join('staff', 'unit_heads.user_id', '=', 'staff.user_id')
        ->join('users', 'staff.user_id', '=', 'users.id')
        ->where('staff.department_id', $d)
        ->where('unit_heads.user_id', '!=', $u) // Exclude the logged-in user from the result
        ->first();
        //->value('users.id','users.first_name', 'users.last_name', 'users.email');

        return $unitHeadUserId;
    }
}
