<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="workflow-activities-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Workflow Step</th>
                    <th class="min-w-200px">Status</th>
                    <th class="min-w-200px">User</th>
                    <th class="min-w-200px">Comment</th>
                    <th class="min-w-200px">Action</th>
                    <th class="min-w-200px">Action Date</th>
                    {{-- <th class="min-w-200px">Workflow Instance</th> --}}
                    <th class="min-w-200px">Workflow</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
                @foreach ($workflowActivities as $workflowActivity)
                    <tr>
                        <td>{{ $workflowActivity->workflowStep ? $workflowActivity->workflowStep->step_name : '' }}</td>
                        <td>{{ $workflowActivity->status }}</td>
                        <td>{{ $workflowActivity->user ? $workflowActivity->user->name : '' }}</td>
                        <td>{{ $workflowActivity->comment }}</td>
                        <td>{{ $workflowActivity->action }}</td>
                        <td>{{ $workflowActivity->action_date }}</td>
                        {{-- <td>{{ $workflowActivity->workflowInstance ? $workflowActivity->workflowInstance : '' }}</td> --}}
                        <td>{{ $workflowActivity->workflowInstance ? ($workflowActivity->workflowInstance->workflow ? $workflowActivity->workflowInstance->workflow->workflow_name : '') : '' }}
                        </td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['workflowActivities.destroy', $workflowActivity->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('workflowActivities.show', [$workflowActivity->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowActivities])
        </div>
    </div>
</div>
