<!-- Last Name Field -->
<div class="col-sm-12">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $employee->last_name }}</p>
</div>

<!-- First Name Field -->
<div class="col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $employee->first_name }}</p>
</div>

<!-- Middle Name Field -->
<div class="col-sm-12">
    {!! Form::label('middle_name', 'Middle Name:') !!}
    <p>{{ $employee->middle_name }}</p>
</div>

<!-- Date Of Birth Field -->
<div class="col-sm-12">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    <p>{{ $employee->date_of_birth }}</p>
</div>

<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <p>@if ($employee->gender == 1)
        Male
    @elseif($employee->gender == 2)
        Female
    @else
        Others
    @endif</p>
</div>

<!-- Marital Status Field -->
<div class="col-sm-12">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    <p>@switch($employee->marital_status)
        @case(1)
            Single
        @break

        @case(2)
            Married
        @break

        @case(3)
            Separated
        @break

        @case(4)
            Divorced
        @break

        @case(5)
            Separated
        @break

        @default
        Not Specified
    @endswitch</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $employee->email }}</p>
</div>

<!-- Employment Date Field -->
<div class="col-sm-12">
    {!! Form::label('employment_date', 'Employment Date:') !!}
    <p>{{ $employee->employment_date }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $employee->address }}</p>
</div>

<!-- Local Govt Area Field -->
<div class="col-sm-12">
    {!! Form::label('local_govt_area', 'Local Govt Area:') !!}
    <p> @if ($employee->company_localgovt)
        {{ $employee->localGovernment->name }}
    @else
        Not Specified
    @endif</p>
</div>

<!-- State Of Origin Field -->
<div class="col-sm-12">
    {!! Form::label('state_of_origin', 'State Of Origin:') !!}
    <p>{{ $employee->state_of_origin }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $employee->phone_number }}</p>
</div>

<!-- Means Of Identification Field -->
<div class="col-sm-12">
    {!! Form::label('means_of_identification', 'Means Of Identification:') !!}
    <p>{{ $employee->means_of_identification }}</p>
</div>

<!-- Identity Number Field -->
<div class="col-sm-12">
    {!! Form::label('identity_number', 'Identity Number:') !!}
    <p>{{ $employee->identity_number }}</p>
</div>

<!-- Identity Issue Date Field -->
<div class="col-sm-12">
    {!! Form::label('identity_issue_date', 'Identity Issue Date:') !!}
    <p>{{ $employee->identity_issue_date }}</p>
</div>

<!-- Identity Expiry Date Field -->
<div class="col-sm-12">
    {!! Form::label('identity_expiry_date', 'Identity Expiry Date:') !!}
    <p>{{ $employee->identity_expiry_date }}</p>
</div>

<!-- Next Of Kin Field -->
<div class="col-sm-12">
    {!! Form::label('next_of_kin', 'Next Of Kin:') !!}
    <p>{{ $employee->next_of_kin }}</p>
</div>

<!-- Next Of Kin Phone Field -->
<div class="col-sm-12">
    {!! Form::label('next_of_kin_phone', 'Next Of Kin Phone:') !!}
    <p>{{ $employee->next_of_kin_phone }}</p>
</div>

<!-- Monthly Renumeration Field -->
<div class="col-sm-12">
    {!! Form::label('monthly_renumeration', 'Monthly Renumeration:') !!}
    <p>{{ $employee->monthly_renumeration }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>@if ($employee->status == 1)
        Registered
    @else
        Incomplete
    @endif</p>
</div>

