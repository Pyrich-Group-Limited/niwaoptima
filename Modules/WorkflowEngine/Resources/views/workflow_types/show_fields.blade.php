<!-- Workflow Type Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_type', 'Workflow Type:') !!}
    <p>{{ $workflowType->workflow_type }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $workflowType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $workflowType->updated_at }}</p>
</div>

