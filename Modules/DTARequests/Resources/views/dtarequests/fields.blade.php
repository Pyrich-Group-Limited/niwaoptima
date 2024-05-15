<!-- Name Field -->


<!-- Destination Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::text('destination', null, ['class' => 'form-control']) !!}
</div>

<!-- NUMBER OF DAYS -->
<div class="form-group col-sm-6">
    {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
    {!! Form::number('number_days',null, ['class' => 'form-control ']) !!}
</div>
{{-- Travel date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('travel_date', 'TRAVEL DATE:') !!}
    {!! Form::date('travel_date',null, ['class' => 'form-control ']) !!}
</div>
{{-- Arrival date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('arrival_date', 'ARRIVAL DATE:') !!}
    {!! Form::date('arrival_date',null, ['class' => 'form-control ']) !!}
</div>
{{--  estimated expenses --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('estimated_expenses', 'ESTIMATED EXPENSES:') !!}
    {!! Form::text('estimated_expenses',null, ['class' => 'form-control']) !!}
</div>
{{-- purpose of travel --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('purpose_travel ', 'PURPOSE OF TRAVEL:') !!}
    {!! Form::textarea('purpose_travel',null, ['class' => 'form-control']) !!}
</div>
{{-- <div class="form-group col-sm-6 my-4">
    {!! Form::label('branch_id', 'Branch') !!}
    {!! Form::select('branch_id',$branches,null, ['class' => 'form-control form-control-solid border border-2']) !!}
</div> --}}

<!-- document fields -->
<div class="col-sm-4 my-5">
    <span class="text-danger">UPLOAD ALL NECESSARY SUPPORTING DOCUMENT INCLUDING RECIEPT AND INVOICE(SCAN ALL AS SINGLE DOC IN PDF FORMAT)</span>
    <div class="form-group">
        {!! Form::file('uploaded_doc', ['class' =>'form-control','accept' => '.pdf',
        'onchange' => 'validateFile(this)']) !!}
    </div>
    {!! Form::label('uploaded_doc', ' PDF FILE') !!}
</div>