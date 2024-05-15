<!-- Form Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('form_id', 'Form:') !!}
    {!! Form::select('form_id', $forms, null, ['class' => 'form-control']) !!}
</div>

<!-- Field Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_name', 'Field Name:') !!}
    {!! Form::text('field_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Field Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_type_id', 'Field Type:') !!}
    {!! Form::select('field_type_id', $field_types, null, ['class' => 'form-control']) !!}
</div>

<!-- Field Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_label', 'Field Label:') !!}
    {!! Form::text('field_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Field Options Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_options', 'Field Options:') !!}
    {!! Form::text('field_options', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Required Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_required', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_required', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_required', 'Is Required', ['class' => 'form-check-label']) !!}
    </div>
</div>
