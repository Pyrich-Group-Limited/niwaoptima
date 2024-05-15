<!-- Step Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_name', 'Step Name:') !!}
    {!! Form::text('step_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Workflow Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_id', 'Workflow:') !!}
    {!! Form::select('workflow_id', $workflows, null, ['class' => 'form-control']) !!}
</div>

<!-- Step Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_order', 'Step Order:') !!}
    {!! Form::number('step_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Step Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_step_id', 'Parent Step:') !!}
    {!! Form::select('parent_step_id', $workflow_steps, null, ['class' => 'form-control']) !!}
</div>

<!-- Next Approved Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_approved_id', 'Next Approved:') !!}
    {!! Form::select('next_approved_id', $workflow_steps, null, ['class' => 'form-control']) !!}
</div>

<!-- Next Rejected Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_rejected_id', 'Next Rejected:') !!}
    {!! Form::select('next_rejected_id', $workflow_steps, null, ['class' => 'form-control']) !!}
</div>

<!-- Actor Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actor_type_id', 'Actor Type:') !!}
    {!! Form::select('actor_type_id', $actor_types, null, ['class' => 'form-control']) !!}
</div>

<!-- Actor Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actor_role_id', 'Actor Role:') !!}
    {!! Form::select('actor_role_id', $actor_roles, null, ['class' => 'form-control']) !!}
</div>

<!-- Step Activity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_activity_id', 'Step Activity:') !!}
    {!! Form::select('step_activity_id', $step_activities, null, ['class' => 'form-control']) !!}
</div>

<!-- Step Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_type_id', 'Step Type:') !!}
    {!! Form::select('step_type_id', $step_types, null, ['class' => 'form-control']) !!}
</div>

