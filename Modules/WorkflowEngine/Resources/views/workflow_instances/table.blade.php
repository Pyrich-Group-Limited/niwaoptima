<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="workflow-instances-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Workflow</th>
                    <th class="min-w-200px">Started By</th>
                    <th class="min-w-200px">Date Completed</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
                @foreach ($workflowInstances as $workflowInstance)
                    <tr>
                        <td>{{ $workflowInstance->workflow ? $workflowInstance->workflow->workflow_name : '' }}</td>
                        <td>{{ $workflowInstance->startedBy ? $workflowInstance->startedBy->name : '' }}</td>
                        <td>{{ $workflowInstance->date_completed }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['workflowInstances.destroy', $workflowInstance->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('workflowInstances.show', [$workflowInstance->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowInstances])
        </div>
    </div>
</div>
