<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $workflowActivity->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $workflowActivity->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $workflowActivity->updated_at }}</p>
</div>

<!-- Workflow Step Id Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_step_id', 'Workflow Step:') !!}
    <p>{{ $workflowActivity->workflowStep ? $workflowActivity->workflowStep->step_name : '' }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $workflowActivity->status }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $workflowActivity->user ? $workflowActivity->user->name : '' }}</p>
</div>

<!-- Comment Field -->
<div class="col-sm-12">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $workflowActivity->comment }}</p>
</div>

<!-- Action Field -->
<div class="col-sm-12">
    {!! Form::label('action', 'Action:') !!}
    <p>{{ $workflowActivity->action }}</p>
</div>

<!-- Action Date Field -->
<div class="col-sm-12">
    {!! Form::label('action_date', 'Action Date:') !!}
    <p>{{ $workflowActivity->action_date }}</p>
</div>

<!-- Workflow Instance Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('workflow_instance_id', 'Workflow Instance Id:') !!}
    <p>{{ $workflowActivity->workflow_instance_id }}</p>
</div> --}}

<!-- Workflow Id Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_id', 'Workflow:') !!}
    <p>{{ $workflowActivity->workflowInstance ? ($workflowActivity->workflowInstance->workflow ? $workflowActivity->workflowInstance->workflow->workflow_name : '') : '' }}
    </p>
</div>
