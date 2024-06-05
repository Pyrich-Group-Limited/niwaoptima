<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shared\Models\Branch;

class ServiceApplication extends Model
{
    use HasFactory;
    public $table = 'service_applications';

    public $fillable = [
        'service_id',
        'applicant_code',
        'serviceapplication_code',
        'application_form_payment_status',
        'date_of_inspection',
        'service_type_id',
        'current_step',
        'status_summary',
        'user_id',
        'mse_are_documents_verified',
        'mse_document_verification_comment',
        'finance_is_application_fee_verified',
        'finance_is_processing_fee_verified',
        'finance_is_inspection_fee_verified',
        'inspection_status',
        'comments_on_inspection',
        'inspection_report_document_path',
        'are_equipment_and_monitoring_fees_verified',
        'area_officer_approval',
        'area_officer_signature_path',
        'hod_marine_approval',
        'hod_marine_signature_path',
        'permit_document_path',
        'branch_id',
        'demand_total',
        'axis_id',
        'expiry_date',
        'assigned_user_id',
        'inspection_report',
    ];

    protected $casts = [
        'application_form_payment_status' => 'boolean',
        'date_of_inspection' => 'datetime',
        'service_type_id' => 'string',
        'status_summary' => 'string',
        'mse_document_verification_comment' => 'string',
        'comments_on_inspection' => 'string',
        'inspection_report_document_path' => 'string',
        'area_officer_signature_path' => 'string',
        'hod_marine_signature_path' => 'string',
        'permit_document_path' => 'string',
        'branch_id' => 'string'
    ];

    public static array $rules = [
        'service_id' => 'required',
        'application_form_payment_status' => 'required|boolean',
        'date_of_inspection' => 'nullable',
        'service_type_id' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'current_step' => 'required',
        'status_summary' => 'nullable|string|max:65535',
        'user_id' => 'required',
        'mse_are_documents_verified' => 'required',
        'mse_document_verification_comment' => 'nullable|string|max:65535',
        'finance_is_application_fee_verified' => 'required',
        'finance_is_processing_fee_verified' => 'required',
        'finance_is_inspection_fee_verified' => 'required',
        'inspection_status' => 'required',
        'comments_on_inspection' => 'nullable|string|max:65535',
        'inspection_report_document_path' => 'nullable|string|max:191',
        'are_equipment_and_monitoring_fees_verified' => 'required',
        'area_officer_approval' => 'required',
        'area_officer_signature_path' => 'nullable|string|max:191',
        'hod_marine_approval' => 'required',
        'hod_marine_signature_path' => 'nullable|string|max:191',
        'permit_document_path' => 'nullable|string|max:191',
        'branch_id' => 'required',
    ];

    public function axis()
    {
        return $this->belongsTo(Axis::class,'axis_id', 'id');
    }

    public function payment(){
        return $this->hasMany(Payment::class,'serviceapplication_code','id');
    }
    /* public function employer()
    {
        $employer = Employer::where('applicant_code', $this->applicant_code)->first();
        return $employer;
    } */
    public function applicant(){
        return $this->belongsTo(Employer::class,'applicant_code','applicant_code');
    }

     public function employer(){
         return $this->belongsTo(Employer::class,'user_id','id');
     }

    public function theservice()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(ServiceApplicationDocument::class);
    }

    public function processingType()
    {
        return $this->belongsTo(ProcessingType::class, 'service_type_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
