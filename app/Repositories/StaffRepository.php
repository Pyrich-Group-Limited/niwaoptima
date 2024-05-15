<?php

namespace App\Repositories;

use Modules\WorkflowEngine\Models\Staff;
use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Class StaffRepository
 * @package App\Repositories
*/

class StaffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'department_id',
        'branch_id',
        'dash_type',
        'gender',
        'staff_id',
        'region',
        'phone',
        'profile_picture',
        'status',
        'alternative_email',
        'created_by',
        'date_approved',
        'approved_by',
        'security_key',
        'date_modified',
        'modified_by',
        'office_position',
        'position',
        'about_me',
        'total_received_email',
        'total_sent_email',
        'total_draft_email',
        'total_event',
        'my_groups',
        'signature_data',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Staff::class;
    }

    public function getByUserId($id)
    {
        return Staff::where('user_id', $id)->first();
    }

    public function getUsersByDepartment($departmentId)
    {
        $users = DB::table('users')
    ->join('staff as s', 'users.id', '=', 's.user_id') // Use alias 's' for the staff table
    ->join('departments as d', 's.department_id', '=', 'd.id') // Use alias 'd' for the departments table
    ->select('users.id as id', 'users.first_name', 'users.last_name') // Use 'd' to reference the departments table
    ->where('s.department_id', $departmentId)
    ->get();
return $users;
        
    }

}
