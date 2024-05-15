<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $workflowStep->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $workflowStep->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $workflowStep->updated_at }}</p>
</div>

<!-- Workflow Id Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_id', 'Workflow:') !!}
    <p>{{ $workflowStep->workflow ? $workflowStep->workflow->workflow_name : '' }}</p>
</div>

<!-- Step Order Field -->
<div class="col-sm-12">
    {!! Form::label('step_order', 'Step Order:') !!}
    <p>{{ $workflowStep->step_order }}</p>
</div>

<!-- Parent Step Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent_step_id', 'Parent Step:') !!}
    <p>{{ $workflowStep->parentStep ? $workflowStep->parentStep->step_name : ''}}</p>
</div>

<!-- Next Approved Id Field -->
<div class="col-sm-12">
    {!! Form::label('next_approved_id', 'Next Approved:') !!}
    <p>{{ $workflowStep->nextApproved ? $workflowStep->nextApproved->step_name : ''}}</p>
</div>

<!-- Next Rejected Id Field -->
<div class="col-sm-12">
    {!! Form::label('next_rejected_id', 'Next Rejected:') !!}
    <p>{{ $workflowStep->nextRejected ? $workflowStep->nextRejected->step_name : '' }}</p>
</div>

<!-- Actor Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('actor_type_id', 'Actor Type:') !!}
    <p>{{ $workflowStep->actorType ? $workflowStep->actorType->actor_type : '' }}</p>
</div>

<!-- Actor Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('actor_role_id', 'Actor Role:') !!}
    <p>{{ $workflowStep->actorRole ? $workflowStep->actorRole->actor_role : '' }}</p>
</div>

<!-- Step Activity Id Field -->
<div class="col-sm-12">
    {!! Form::label('step_activity_id', 'Step Activity:') !!}
    <p>{{ $workflowStep->stepActivity ? $workflowStep->stepActivity->step_activity : '' }}</p>
</div>

<!-- Step Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('step_type_id', 'Step Type:') !!}
    <p>{{ $workflowStep->stepType ? $workflowStep->stepType->step_type : '' }}</p>
</div>

<!-- Step Name Field -->
<div class="col-sm-12">
    {!! Form::label('step_name', 'Step Name:') !!}
    <p>{{ $workflowStep->step_name }}</p>
</div>

