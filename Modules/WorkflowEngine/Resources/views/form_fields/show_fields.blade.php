<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $formField->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $formField->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $formField->updated_at }}</p>
</div>

<!-- Form Id Field -->
<div class="col-sm-12">
    {!! Form::label('form_id', 'Form:') !!}
    <p>{{ $formField->form ? $formField->form->form_name : '' }}</p>
</div>

<!-- Field Name Field -->
<div class="col-sm-12">
    {!! Form::label('field_name', 'Field Name:') !!}
    <p>{{ $formField->field_name }}</p>
</div>

<!-- Field Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('field_type_id', 'Field Type:') !!}
    <p>{{ $formField->fieldType ? $formField->fieldType->field_type : '' }}</p>
</div>

<!-- Field Label Field -->
<div class="col-sm-12">
    {!! Form::label('field_label', 'Field Label:') !!}
    <p>{{ $formField->field_label }}</p>
</div>

<!-- Field Options Field -->
<div class="col-sm-12">
    {!! Form::label('field_options', 'Field Options:') !!}
    <p>{{ $formField->field_options }}</p>
</div>

<!-- Is Required Field -->
<div class="col-sm-12">
    {!! Form::label('is_required', 'Is Required:') !!}
    <p>{{ $formField->is_required ? 'Yes' : 'No' }}</p>
</div>

