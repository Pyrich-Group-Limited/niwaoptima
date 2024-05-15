<!-- Workflow Step Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_step_id', 'Workflow Step Id:') !!}
    {!! Form::number('workflow_step_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Action Field -->
<div class="form-group col-sm-6">
    {!! Form::label('action', 'Action:') !!}
    {!! Form::number('action', null, ['class' => 'form-control']) !!}
</div>

<!-- Action Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('action_date', 'Action Date:') !!}
    {!! Form::text('action_date', null, ['class' => 'form-control','id'=>'action_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#action_date').datepicker()
    </script>
@endpush

<!-- Workflow Instance Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_instance_id', 'Workflow Instance Id:') !!}
    {!! Form::number('workflow_instance_id', null, ['class' => 'form-control']) !!}
</div>