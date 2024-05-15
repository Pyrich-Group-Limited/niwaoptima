<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'employee_id',
        'branch_id',
        'department_id',
        'transfer_date',
        'description',
        'created_by',
    ];

    public function department()
    {
        return $this->hasMany('Modules\Shared\Models\Department', 'id', 'department_id')->first();
    }

    public function branch()
    {
        return $this->hasMany('Modules\Shared\Models\Branch', 'id', 'branch_id')->first();
    }


    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }
}
