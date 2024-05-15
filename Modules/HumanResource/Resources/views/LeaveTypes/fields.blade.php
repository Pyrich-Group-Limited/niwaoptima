

<!-- Leave Type name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'LEAVE NAME:') !!}
    {!! Form::text('name',  null, ['class' => 'form-control ','placeholder'=>'PERSONAL LEAVE TYPE']) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'NUMBER OF DAYS:') !!}
    {!! Form::number('duration',  null, ['class' => 'form-control ','placeholder'=>'40 WORKING DAYS']) !!}
</div>

