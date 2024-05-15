<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    public $table = "all_leaves";
    protected $fillable = [
        'employee_id',
        'Leave_type_id',
        'applied_on',
        'start_date',
        'end_date',
        'total_leave_days',
        'leave_reason',
        'remark',
        'status',
        'created_by',
    ];

    public function leaveType()
    {
        return $this->hasOne('Modules\HRMSystem\Models\LeaveType', 'id', 'leave_type_id');
    }

    public function employees()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id');
    }
}
