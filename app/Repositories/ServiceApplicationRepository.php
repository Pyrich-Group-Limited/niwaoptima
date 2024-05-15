<?php

namespace App\Repositories;

use App\Models\ServiceApplication;
use App\Repositories\BaseRepository;

class ServiceApplicationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'service_id',
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
        'permit_document_path'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ServiceApplication::class;
    }
}
