<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="workflow-steps-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Workflow</th>
                    <th class="min-w-200px">Step Order</th>
                    <th class="min-w-200px">Parent Step</th>
                    <th class="min-w-200px">Next Approved</th>
                    <th class="min-w-200px">Next Rejected</th>
                    <th class="min-w-200px">Actor Type</th>
                    <th class="min-w-200px">Actor Role</th>
                    <th class="min-w-200px">Step Activity</th>
                    <th class="min-w-200px">Step Type</th>
                    <th class="min-w-200px">Step Name</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
                @foreach ($workflowSteps as $workflowStep)
                    <tr>
                        <td>{{ $workflowStep->workflow ? $workflowStep->workflow->workflow_name : '' }}</td>
                        <td>{{ $workflowStep->step_order }}</td>
                        <td>{{ $workflowStep->parentStep ? $workflowStep->parentStep->step_name : '' }}</td>
                        <td>{{ $workflowStep->nextApproved ? $workflowStep->nextApproved->step_name : '' }}</td>
                        <td>{{ $workflowStep->nextRejected ? $workflowStep->nextRejected->step_name : '' }}</td>
                        <td>{{ $workflowStep->actorType ? $workflowStep->actorType->actor_type : '' }}</td>
                        <td>{{ $workflowStep->actorRole ? $workflowStep->actorRole->actor_role : '' }}</td>
                        <td>{{ $workflowStep->stepActivity ? $workflowStep->stepActivity->step_activity : '' }}</td>
                        <td>{{ $workflowStep->stepType ? $workflowStep->stepType->step_type : '' }}</td>
                        <td>{{ $workflowStep->step_name }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['workflowSteps.destroy', $workflowStep->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('workflowSteps.show', [$workflowStep->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('workflowSteps.edit', [$workflowStep->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $workflowSteps])
        </div>
    </div>
</div>
