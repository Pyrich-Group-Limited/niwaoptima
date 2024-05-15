<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingEmployee extends Model
{
    protected $fillable = [
        'meeting_id',
        'employee_id',
        'created_by',
    ];
}
