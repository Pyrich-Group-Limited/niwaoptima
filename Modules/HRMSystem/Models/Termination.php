<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    protected $fillable = [
        'employee_id',
        'notice_date',
        'termination_date',
        'termination_type',
        'description',
        'created_by',
    ];

    public function terminationType()
    {
        return $this->hasOne('Modules\HRMSystem\Models\TerminationType', 'id', 'termination_type')->first();
    }

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }
}
