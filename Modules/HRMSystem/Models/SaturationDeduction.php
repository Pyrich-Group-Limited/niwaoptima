<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class SaturationDeduction extends Model
{
    protected $fillable = [
        'employee_id',
        'deduction_option',
        'title',
        'amount',
        'created_by',
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }

    public function deduction_option()
    {
        return $this->hasOne('Modules\HRMSystem\Models\DeductionOption', 'id', 'deduction_option')->first();
    }
    public static $saturationDeductiontype = [
        'fixed'=>'Fixed',
        'percentage'=> 'Percentage',
    ];
}
