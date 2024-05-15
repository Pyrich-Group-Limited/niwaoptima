<!-- Ecs Number Field -->
<div class="col-sm-12">
    {!! Form::label('ecs_number', 'ECS Number:') !!}
    <p>{{ $employer->ecs_number }}</p>
</div>

<!-- Company Name Field -->
<div class="col-sm-12">
    {!! Form::label('company_name', 'Company Name:') !!}
    <p>{{ $employer->company_name }}</p>
</div>

<!-- Company Email Field -->
<div class="col-sm-12">
    {!! Form::label('company_email', 'Company Email:') !!}
    <p>{{ $employer->company_email }}</p>
</div>

<!-- Company Address Field -->
<div class="col-sm-12">
    {!! Form::label('company_address', 'Company Address:') !!}
    <p>{{ $employer->company_address }}</p>
</div>

<!-- Company Rcnumber Field -->
<div class="col-sm-12">
    {!! Form::label('company_rcnumber', 'Company Rcnumber:') !!}
    <p>{{ $employer->company_rcnumber }}</p>
</div>

<!-- Company Contact person Field -->
<div class="col-sm-12">
    {!! Form::label('contact_person', 'Company Contact Person:') !!}
    <p>{{ $employer->contact_person }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('contact_number', 'Company Contact Person Number:') !!}
    <p>{{ $employer->contact_number }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('cac_reg_year', 'Company CAC Reg Year:') !!}
    <p>{{ $employer->cac_reg_year }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('number_of_employees', 'Company Number of Employees:') !!}
    <p>{{ $employer->number_of_employees }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('registered_date', 'Company Registered Date:') !!}
    <p>{{ $employer->registered_date }}</p>
</div>

<!-- Company Localgovt Field -->
<div class="col-sm-12">
    {!! Form::label('company_localgovt', 'Company Localgovt:') !!}
    <p>
        @if ($employer->company_localgovt)
            {{ $employer->localGovernment->name }}
        @else
            Not Specified
        @endif
    </p>
</div>

<!-- Company State Field -->
<div class="col-sm-12">
    {!! Form::label('company_state', 'Company State:') !!}
    <p>{{ $employer->state->name }}</p>
</div>

<!-- Business Area Field -->
<div class="col-sm-12">
    {!! Form::label('business_area', 'Business Area:') !!}
    <p>{{ $employer->business_area }}</p>
</div>

<!-- Inspection Status Field -->
<div class="col-sm-12">
    {!! Form::label('inspection_status', 'Inspection Status:') !!}
    <p>{{ $employer->inspection_status }}</p>
</div>

<!--  Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>
        @if ($employer->status == 1)
            Registered
        @else
            Pending
        @endif
    </p>
</div>
