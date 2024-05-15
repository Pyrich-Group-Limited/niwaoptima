<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class GoalTracking extends Model
{
    protected $fillable = [
        'branch',
        'goal_type',
        'start_date',
        'end_date',
        'subject',
        'target_achievement',
        'description',
        'created_by',
        'rating',
    ];

    public function goalType()
    {
        return $this->hasOne('Modules\HRMSystem\Models\GoalType', 'id', 'goal_type');
    }

    public function branches()
    {
        return $this->hasOne('Modules\Shared\Models\Branch', 'id', 'branch');
    }

    public static $status = [
        'Not Started',
        'In Progress',
        'Completed',
    ];
}
