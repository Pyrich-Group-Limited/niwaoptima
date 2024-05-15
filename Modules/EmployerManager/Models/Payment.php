<?php

namespace Modules\EmployerManager\Models;

use App\Models\Service;
use App\Models\ServiceApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\EmployerManager\Models\Certificate;
use Modules\EmployerManager\Models\Employer;
use Modules\Shared\Models\Branch;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id', 'payment_type', 'rrr', 'invoice_number', 'invoice_generated_at', 'service_id', 'service_type_id', 'document_uploads',
        'invoice_duration', 'payment_status', 'amount', 'approval_status', 'paid_at', 'transaction_id', 'sub_service_id',
        'contribution_year', 'contribution_period', 'contribution_months', 'employees', 'certificate_status', 'letter_of_intent', 'service_application_id',
        'branch_id', 'applicant_type', 'applicant_name', 'serviceapplication_code'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // public function employ(){
    //    $data=ServiceApplication::where('serviceapplication_code',$this->serviceapplication_code)->first();
    //    $data=ServiceApplication::where('serviceapplication_code',$this->serviceapplication_code)->first();
    //    return $data;
    // }
    public function serviceapp(){
        return $this->belongsTo(ServiceApplication::class,'serviceapplication_code','id');
    }
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function serviceapplication()
    {
        return $this->belongsTo(ServiceApplication::class, 'service_application_id');
    }
    public function serviceapplicationcode(){
        return $this->belongsTo(ServiceApplication::class,'serviceapplication_code','id');
    }
}
