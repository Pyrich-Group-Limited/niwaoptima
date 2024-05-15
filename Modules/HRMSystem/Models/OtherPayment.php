<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class OtherPayment extends Model
{
    protected $fillable = [
        'employee_id',
        'title',
        'amount',
        'created_by',
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }
    public static $otherPaymenttype=[
        'fixed'=>'Fixed',
        'percentage'=> 'Percentage',
    ];
}
