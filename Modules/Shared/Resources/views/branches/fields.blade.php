<!-- Branch Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_name', 'Branch Name:') !!}
    {!! Form::text('branch_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Region Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Branch Region:') !!}
    {!! Form::select('region_id', $regions, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Branch Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_code', 'Branch Code:') !!}
    {!! Form::text('branch_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Ecsnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_ecsnumber', 'Last Ecsnumber:') !!}
    {!! Form::text('last_ecsnumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Highest Rank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('highest_rank', 'Highest Rank:') !!}
    {!! Form::select('highest_rank', getRanks(), null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Staff Strength Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('staff_strength', 'Staff Strength:') !!}
    {!! Form::number('staff_strength', null, ['class' => 'form-control', 'required']) !!}
</div> --}}

<!-- Managing Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('managing_id', 'Managing Id:') !!}
    {!! Form::select('managing_id', $users, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Branch Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_email', 'Branch Email:') !!}
    {!! Form::text('branch_email', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Branch Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_phone', 'Branch Phone:') !!}
    {!! Form::text('branch_phone', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Branch Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('branch_address', 'Branch Address:') !!}
    {!! Form::textarea('branch_address', null, ['class' => 'form-control', 'required']) !!}
</div>
