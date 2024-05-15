<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PaySlip extends Model
{
    protected $fillable = [
        'employee_id',
        'net_payble',
        'basic_salary',
        'salary_month',
        'status',
        'allowance',
        'commission',
        'loan',
        'saturation_deduction',
        'other_payment',
        'overtime',
        'created_by',
    ];

    public static function employee($id)
    {
        return User::find($id);
    }

    public function employees()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id');
    }
}
