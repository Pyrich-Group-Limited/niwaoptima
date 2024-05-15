<?php

namespace Modules\HumanResource\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\Department;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use App\Traits\Approval;

class LeaveRequest extends Model implements Auditable


{
    use HasFactory;
    use SoftDeletes;
    use AuditingAuditable;
    use Approval;
    public $table = 'leave_request';
    public $primarykey = 'id';
    public $fillable = [
        'user_id',

        'leavetype_id',


        'date_start_new',
        'end_date',



        'daystaken',

        'status',
        


    ];

    // protected $cast=[
    //     'staff_id'=>'integer',
    //     'type'=>'string',


    //     'date_start_new'=>'string',
    //     'number_days'=>'string',
    //     'home_address'=>'string',
    //     'home_number'=>'string',
    //     'street_name'=>'string',

    //     'local_council'=>'string',
    //     'state'=>'string',
    //     'phone_number'=>'integer',
    //     'officer_relieve'=>'string',
    //     'signature_path'=>'string',
    //     'end_date'=>'string',
    //     'approve_status'=>'integer',
    //     'supervisor_office'=>'integer',
    //     'md_hr'=>'string',
    //     'leave_officer'=>'string',
    //     'supervisor_approval'=>'integer',
    //     'hod_approval'=>'integer',
    //     'hr_approval'=>'integer',
    // ];
    public static array $rules = [
        // 'daystaken'=>'required',
        // 'number_days'=>'required',
        // 'date_start_new'=>'required',
        // 'number_days'=>'required',
        // 'phone_number'=>'required',

    ];





    public function leavetype()
    {
        return $this->belongsTo(LeaveType::class, 'leavetype_id', 'id');
    }
    // public function staff(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->belongsTo(\Modules\Shared\Models\staff::class, 'staff_id', 'id');
    // }

    // public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->belongsTo(\Modules\Shared\Models\Branch::class, 'branch_id', 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // public function departments()
    // {
    //     return $this->belongsTo(Department::class, 'department_id', 'id');
    // }
}
