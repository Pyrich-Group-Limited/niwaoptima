<?php

namespace Modules\EmployerManager\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Modules\ClaimsCompensation\Models\DeathClaim;
 use Modules\ClaimsCompensation\Models\AccidentClaim;
 use Modules\ClaimsCompensation\Models\DiseaseClaim;
 use Modules\Shared\Models\Department;


 class Employee extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'employees';

    public $fillable = [
        'employer_id',
        'last_name',
        'first_name',
        'middle_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'email',
        'employment_date',
        'address',
        'local_govt_area',
        'state_of_origin',
        'phone_number',
        'means_of_identification',
        'identity_number',
        'identity_issue_date',
        'identity_expiry_date',
        'next_of_kin',
        'next_of_kin_phone',
        'monthly_renumeration',
        'status',
        
        'user_id',
        'dob',
        'employee_id',
        'branch_id',
        'department_id',
        'designation_id',
        'company_doj',
        'documents',
        'account_holder_name',
        'account_number',
        'bank_name',
        'bank_identifier_code',
        'branch_location',
        'tax_payer_id',
        'salary_type',
        'salary',
        'created_by',
    ];

    protected $casts = [
        'id' => 'integer',
        'employer_id' => 'integer',
        'last_name' => 'string',
        'first_name' => 'string',
        'middle_name' => 'string',
        'date_of_birth' => 'string',
        'gender' => 'string',
        'marital_status' => 'string',
        'email' => 'string',
        'employment_date' => 'string',
        'address' => 'string',
        'local_govt_area' => 'string',
        'state_of_origin' => 'string',
        'phone_number' => 'string',
        'means_of_identification' => 'string',
        'identity_number' => 'string',
        'identity_issue_date' => 'string',
        'identity_expiry_date' => 'string',
        'next_of_kin' => 'string',
        'next_of_kin_phone' => 'string',
        'monthly_renumeration' => 'string',
        'status' => 'string'
    ];

    public static array $rules = [
        
    ];

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\EmployerManager\Models\Employer::class, 'employer_id', 'id');
    }

    public function accident_claims()
    {
        return $this->hasMany(AccidentClaim::class);
    }

    public function death_claims()
    {
        return $this->hasMany(DeathClaim::class);
    }

    public function disease_claims()
    {
        return $this->hasMany(DiseaseClaim::class);
    }

    public function documents()
    {
        return $this->hasMany('App\Models\EmployeeDocument', 'employee_id', 'employee_id')->get();
    }

    public function salary_type()
    {
        return $this->hasOne('App\Models\PayslipType', 'id', 'salary_type')->pluck('name')->first();
    }

    public function get_net_salary()
    {

        //allowance
        $allowances      = Allowance::where('employee_id', '=', $this->id)->get();
        $total_allowance = 0 ;
        foreach($allowances as $allowance)
        {
            if($allowance->type == 'fixed')
            {
                $totalAllowances  = $allowance->amount;
            }
            else
            {
                $totalAllowances  = $allowance->amount * $this->salary / 100;
            }
            $total_allowance += $totalAllowances ;
        }

        //commission
        $commissions      = Commission::where('employee_id', '=', $this->id)->get();
        $total_commission = 0;
        foreach($commissions as $commission)
        {
            if($commission->type == 'fixed')
            {
                $totalCom  = $commission->amount;
            }
            else
            {
                $totalCom  = $commission->amount * $this->salary / 100;
            }
            $total_commission += $totalCom ;
        }

        //Loan
        $loans      = Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        foreach($loans as $loan)
        {
            if($loan->type == 'fixed')
            {
                $totalloan  = $loan->amount;
            }
            else
            {
                $totalloan  = $loan->amount * $this->salary / 100;
            }
            $total_loan += $totalloan ;
        }


        //Saturation Deduction
        $saturation_deductions      = SaturationDeduction::where('employee_id', '=', $this->id)->get();
        $total_saturation_deduction = 0 ;
        foreach($saturation_deductions as $deductions)
        {
            if($deductions->type == 'fixed')
            {
                $totaldeduction  = $deductions->amount;
            }
            else
            {
                $totaldeduction  = $deductions->amount * $this->salary / 100;
            }
            $total_saturation_deduction += $totaldeduction ;
        }

        //OtherPayment
        $other_payments      = OtherPayment::where('employee_id', '=', $this->id)->get();
        $total_other_payment = 0;
        $total_other_payment = 0 ;
        foreach($other_payments as $otherPayment)
        {
            if($otherPayment->type == 'fixed')
            {
                $totalother  = $otherPayment->amount;
            }
            else
            {
                $totalother  = $otherPayment->amount * $this->salary / 100;
            }
            $total_other_payment += $totalother ;
        }

        //Overtime
        $over_times      = Overtime::where('employee_id', '=', $this->id)->get();
        $total_over_time = 0;
        foreach($over_times as $over_time)
        {
            $total_work      = $over_time->number_of_days * $over_time->hours;
            $amount          = $total_work * $over_time->rate;
            $total_over_time = $amount + $total_over_time;
        }


        //Net Salary Calculate
        $advance_salary = $total_allowance + $total_commission - $total_loan - $total_saturation_deduction + $total_other_payment + $total_over_time;

        $employee       = Employee::where('id', '=', $this->id)->first();

        $net_salary     = (!empty($employee->salary) ? $employee->salary : 0) + $advance_salary;

        return $net_salary;

    }

    public static function allowance($id)
    {

        //allowance
        $allowances      = Allowance::where('employee_id', '=', $id)->get();
        $total_allowance = 0;
        foreach($allowances as $allowance)
        {
            $total_allowance = $allowance->amount + $total_allowance;
        }

        $allowance_json = json_encode($allowances);

        return $allowance_json;

    }

    public static function commission($id)
    {
        //commission
        $commissions      = Commission::where('employee_id', '=', $id)->get();
        $total_commission = 0;
        foreach($commissions as $commission)
        {
            $total_commission = $commission->amount + $total_commission;
        }
        $commission_json = json_encode($commissions);

        return $commission_json;

    }

    public static function loan($id)
    {
        //Loan
        $loans      = Loan::where('employee_id', '=', $id)->get();
        $total_loan = 0;
        foreach($loans as $loan)
        {
            $total_loan = $loan->amount + $total_loan;
        }
        $loan_json = json_encode($loans);

        return $loan_json;
    }

    public static function saturation_deduction($id)
    {
        //Saturation Deduction
        $saturation_deductions      = SaturationDeduction::where('employee_id', '=', $id)->get();
        $total_saturation_deduction = 0;
        foreach($saturation_deductions as $saturation_deduction)
        {
            $total_saturation_deduction = $saturation_deduction->amount + $total_saturation_deduction;
        }
        $saturation_deduction_json = json_encode($saturation_deductions);

        return $saturation_deduction_json;

    }

    public static function other_payment($id)
    {
        //OtherPayment
        $other_payments      = OtherPayment::where('employee_id', '=', $id)->get();
        $total_other_payment = 0;
        foreach($other_payments as $other_payment)
        {
            $total_other_payment = $other_payment->amount + $total_other_payment;
        }
        $other_payment_json = json_encode($other_payments);

        return $other_payment_json;
    }

    public static function overtime($id)
    {
        //Overtime
        $over_times      = Overtime::where('employee_id', '=', $id)->get();
        $total_over_time = 0;
        foreach($over_times as $over_time)
        {
            $total_work      = $over_time->number_of_days * $over_time->hours;
            $amount          = $total_work * $over_time->rate;
            $total_over_time = $amount + $total_over_time;
        }
        $over_time_json = json_encode($over_times);

        return $over_time_json;
    }

    public static function employee_id()
    {
        $employee = Employee::latest()->first();

        return !empty($employee) ? $employee->id + 1 : 1;
    }

    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }

    public function department()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }

    public function designation()
    {
        return $this->hasOne('App\Models\Designation', 'id', 'designation_id');
    }

    public function salaryType()
    {
        return $this->hasOne('App\Models\PayslipType', 'id', 'salary_type');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function paySlip()
    {
        return $this->hasOne('App\Models\PaySlip', 'id', 'employee_id');
    }


    public function present_status($employee_id, $data)
    {
        return AttendanceEmployee::where('employee_id', $employee_id)->where('date', $data)->first();
    }

    public static function employee_salary($salary)
    {
        $employee = Employee::where("salary", $salary)->first();
        if ($employee->salary == '0' || $employee->salary == '0.0') {
            return "-";
        } else {
            return $employee->salary;
        }
    }
}
