<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public $table = 'leavetype';
    protected $fillable = [
        'title',
        'days',
        'created_by',
        'name',
        'duration',
    ];
}
