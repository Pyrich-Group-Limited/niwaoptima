<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'employee_id',
        'loan_option',
        'title',
        'amount',
        'start_date',
        'end_date',
        'reason',
        'created_by',
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }

    public function loan_option()
    {
        return $this->hasOne('Modules\HR\Models\LoanOption', 'id', 'loan_option')->first();
    }
    public static $Loantypes=[
        'fixed'=>'Fixed',
        'percentage'=> 'Percentage',
    ];
}
