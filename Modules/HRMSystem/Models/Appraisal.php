<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    protected $fillable = [
        'branch',
        'employee',
        'appraisal_date',
        'customer_experience',
        'marketing',
        'administration',
        'professionalism',
        'integrity',
        'attendance',
        'remark',
        'created_by',
        'rating',
    ];

    public static $technical = [
        'None',
        'Beginner',
        'Intermediate',
        'Advanced',
        'Expert / Leader',
    ];

    public static $organizational = [
        'None',
        'Beginner',
        'Intermediate',
        'Advanced',
    ];

    public function branches()
    {
        return $this->hasOne('Modules\Shared\Models\Branch', 'id', 'branch');
    }


    public function employees()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee');
    }

    public function staff()
    {
        return $this->hasOne('Modules\Workflowengine\Models\Staff', 'user_id', 'employee');
    }
}
