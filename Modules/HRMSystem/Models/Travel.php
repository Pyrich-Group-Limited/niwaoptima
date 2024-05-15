<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travels';

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'purpose_of_visit',
        'place_of_visit',
        'description',
        'created_by',
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }
}
