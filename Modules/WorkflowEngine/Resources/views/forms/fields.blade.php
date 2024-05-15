<!-- Form Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('form_name', 'Form Name:') !!}
    {!! Form::text('form_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Workflow Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('has_workflow', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('has_workflow', '1', null, ['id' => 'has_workflow', 'class' => 'form-check-input']) !!}
        {!! Form::label('has_workflow', 'Has Workflow', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Workflow Id Field -->
<div id="workflow_id_div" class="form-group col-sm-6">
    {!! Form::label('workflow_id', 'Workflow:') !!}
    {!! Form::select('workflow_id', $workflows, null, ['id' => 'workflow_id', 'class' => 'form-control']) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        const checkbox = document.getElementById('has_workflow');
        const workflow = document.getElementById('workflow_id');
        const workflowDiv = document.getElementById('workflow_id_div');

        if (!checkbox.checked) {
            workflowDiv.classList.add('d-none');
            workflow.selectedIndex = 0;
        }


        checkbox.addEventListener('click', function() {
            if (checkbox.checked) {
                workflowDiv.classList.remove('d-none');
            } else {
                workflowDiv.classList.add('d-none');
                workflow.selectedIndex = 0;
            }
        });
    </script>
@endpush
