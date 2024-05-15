<?php

namespace App\Models;

use App\Traits\Approval;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccidentClaim extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use Approval;
    use \OwenIt\Auditing\Auditable;
    public $table = 'accident_claims';
    public $primarykey='id';
    protected $fillable = [
        'employer_id', 'employee_id', 'accident_date', 'accident_time', 'accident_town',
        'accident_report_date', 'accident_report_time', 'employee_earning', 'employee_task',
        'nature_of_injury', 'course_of_work', 'first_aid_given', 'branch_id',
        'medical_last_name', 'medical_first_name', 'medical_practice_number', 'document', 'status',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
