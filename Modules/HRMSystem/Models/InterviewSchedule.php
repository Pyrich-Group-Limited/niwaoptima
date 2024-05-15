<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model
{
    protected $fillable = [
        'candidate',
        'employee',
        'date',
        'time',
        'comment',
        'employee_response',
        'created_by',
    ];

    public function applications()
    {
       return $this->hasOne('Modules\HRMSystem\Models\JobApplication','id','candidate');
    }

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee');
    }
}
