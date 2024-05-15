@extends('layouts.app')
@section('content')
    <div class="card mx-4">
        <div class="card-header text-center">
            <span class="card-title text-center text-primary">UPDATE APPLICANT RECORD</span>
        </div>
        <div class="card-body">
            <form action="{{route('updateapp',[$record->id])}}" class="form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        {!! Form::label('company_name', 'COMPANY NAME', ['class' => 'form-label']) !!}
                        {!! Form::text('company_name', $record->company_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-6">
                        {!! Form::label('company_address', 'COMPANY ADDRESS', ['class' => 'form-label']) !!}
                        {!! Form::text('company_address', $record->company_address, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {!! Form::label('company_email', 'COMPANY EMAIL', ['class' => 'form-label']) !!}
                        {!! Form::email('company_email', $record->company_email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-6">
                        {!! Form::label('company_rcnumber', 'COMPANY RCNUMBER', ['class' => 'form-label']) !!}
                        {!! Form::text('company_rcnumber', $record->company_rcnumber, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {!! Form::label('cac_reg_year', 'COMPANY CAC REG YEAR', ['class' => 'form-label']) !!}
                        {!! Form::number('cac_reg_year', $record->cac_reg_year, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-6">
                        {!! Form::label('contact_surname', ' CONTACT PERSON SURNAME', ['class' => 'form-label']) !!}
                        {!! Form::text('contact_surname', $record->contact_surname, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {!! Form::label('contact_firstname', 'CONTACT PERSON FIRST NAME', ['class' => 'form-label']) !!}
                        {!! Form::text('contact_firstname', $record->contact_firstname, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-6">
                        {!! Form::label('contact_middlename', ' CONTACT PERSON MIDDLE NAME', ['class' => 'form-label']) !!}
                        {!! Form::text('contact_middlename', $record->contact_middlename, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {!! Form::label('contact_number', 'CONTACT PERSON NUMBER', ['class' => 'form-label']) !!}
                        {!! Form::tel('contact_number', $record->contact_number, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-6">
                        {!! Form::label('user_type', 'APPLICANT TYPE', ['class' => 'form-label']) !!}
                        {!! Form::select('user_type', ['private' => 'Private User', 'company' => 'Company'], null, [
                            'class' => 'form-control form-select',
                        ]) !!}
                    </div>
                </div>

                <div class="row-8 float-end mt-4">

                    <button class="btn-sm btn-primary" type="submit">UPDATE RECORD</button>
                </div>

            </form>
        </div>
    </div>
@endsection
