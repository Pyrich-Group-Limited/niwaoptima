<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::number('service_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Application Form Payment Status Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('application_form_payment_status', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('application_form_payment_status', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('application_form_payment_status', 'Application Form Payment Status', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Date Of Inspection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_inspection', 'Date Of Inspection:') !!}
    {!! Form::text('date_of_inspection', null, ['class' => 'form-control','id'=>'date_of_inspection']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_inspection').datepicker()
    </script>
@endpush

<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    {!! Form::text('service_type_id', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Current Step Field -->
<div class="form-group col-sm-6">
    {!! Form::label('current_step', 'Current Step:') !!}
    {!! Form::number('current_step', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('status_summary', 'Status Summary:') !!}
    {!! Form::textarea('status_summary', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Mse Are Documents Verified Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mse_are_documents_verified', 'Mse Are Documents Verified:') !!}
    {!! Form::number('mse_are_documents_verified', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Mse Document Verification Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mse_document_verification_comment', 'Mse Document Verification Comment:') !!}
    {!! Form::textarea('mse_document_verification_comment', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Finance Is Application Fee Verified Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finance_is_application_fee_verified', 'Finance Is Application Fee Verified:') !!}
    {!! Form::number('finance_is_application_fee_verified', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Finance Is Processing Fee Verified Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finance_is_processing_fee_verified', 'Finance Is Processing Fee Verified:') !!}
    {!! Form::number('finance_is_processing_fee_verified', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Finance Is Inspection Fee Verified Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finance_is_inspection_fee_verified', 'Finance Is Inspection Fee Verified:') !!}
    {!! Form::number('finance_is_inspection_fee_verified', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Inspection Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inspection_status', 'Inspection Status:') !!}
    {!! Form::number('inspection_status', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Comments On Inspection Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comments_on_inspection', 'Comments On Inspection:') !!}
    {!! Form::textarea('comments_on_inspection', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Inspection Report Document Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inspection_report_document_path', 'Inspection Report Document Path:') !!}
    {!! Form::text('inspection_report_document_path', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Are Equipment And Monitoring Fees Verified Field -->
<div class="form-group col-sm-6">
    {!! Form::label('are_equipment_and_monitoring_fees_verified', 'Are Equipment And Monitoring Fees Verified:') !!}
    {!! Form::number('are_equipment_and_monitoring_fees_verified', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Area Officer Approval Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area_officer_approval', 'Area Officer Approval:') !!}
    {!! Form::number('area_officer_approval', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Area Officer Signature Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area_officer_signature_path', 'Area Officer Signature Path:') !!}
    {!! Form::text('area_officer_signature_path', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Hod Marine Approval Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hod_marine_approval', 'Hod Marine Approval:') !!}
    {!! Form::number('hod_marine_approval', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Hod Marine Signature Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hod_marine_signature_path', 'Hod Marine Signature Path:') !!}
    {!! Form::text('hod_marine_signature_path', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Permit Document Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permit_document_path', 'Permit Document Path:') !!}
    {!! Form::text('permit_document_path', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>
