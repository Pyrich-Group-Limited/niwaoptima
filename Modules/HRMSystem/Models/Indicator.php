<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $fillable = [
        'branch',
        'designation',
        'customer_experience',
        'marketing',
        'administration',
        'professionalism',
        'integrity',
        'attendance',
        'created_by',
        'created_user',
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

    public function departments()
    {
        return $this->hasOne('Modules\Shared\Models\Department', 'id', 'department');
    }

    public function designations()
    {
        return $this->hasOne('Modules\HRMSystem\Models\Designation', 'id', 'designation');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_user');
    }
}
