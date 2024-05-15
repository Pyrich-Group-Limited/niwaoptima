<!-- Workflow Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_name', 'Workflow Name:') !!}
    {!! Form::text('workflow_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Workflow Type Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('workflow_type_id', 'Workflow Type Id:') !!}
    {!! Form::number('workflow_type_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Workflow Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_type_id', 'Workflow Type:') !!}
    {!! Form::select('workflow_type_id', $workflow_types, null, ['class' => 'form-control']) !!}
</div>
