<?php

namespace Modules\EmployerManager\Models;

use App\Models\ServiceApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\EmployerManager\Models\Payment;
use Modules\EmployerManager\Models\Employee;
use Modules\Shared\Models\Branch;

class Employer extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'employers';

    public $fillable = [
        'user_id',
        'applicant_code',
        'ecs_number',
        'company_name',
        'company_email',
        'company_address',
        'company_rcnumber',
        'contact_position',
        'contact_number',
        'company_localgovt',
        'company_state',
        'business_area',
        'inspection_status',
        'contact_number',
        'cac_reg_year',
        'number_of_employees',
        'status',
        'password',
        'paid_registration',
        'registered_date',
        'contact_surname',
        'contact_firstname',
        'contact_middlename',
        'company_phone',
        'branch_id',
        'region_id',
        'transaction_id',
        'contribution_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'certificate_of_incorporation',
        'updated_at',
        'created_at',
        'account_officer_id',
        'user_type'
    ];

    /* protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'ecs_number' => 'string',
        'company_name' => 'string',
        'company_email' => 'string',
        'company_address' => 'string',
        'company_rcnumber' => 'string',
        'cac_reg_year' => 'integer',
        'contact_person' => 'string',
        'contact_number' => 'string',
        'company_localgovt' => 'string',
        'number_of_employees' => 'integer',
        'status' => 'string',
        'company_state' => 'integer',
        'business_area' => 'string',
        'inspection_status' => 'string',
        'registered_date' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ]; */

    public static array $rules = [
        'applicant_code'=>'required'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'user_id', 'id');
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'created_by', 'id');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'updated_by', 'id');
    }

    public function deletedBy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'deleted_by', 'id');
    }

    public function state()
    {
        return $this->belongsTo('app\Models\State','company_state');
    }

    public function localGovernment()
    {
        return $this->belongsTo('app\Models\LocalGovt','company_localgovt');
    }

    public function serviceapplication(){
        return $this->hasMany(ServiceApplication::class,'applicant_code','id');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


}
