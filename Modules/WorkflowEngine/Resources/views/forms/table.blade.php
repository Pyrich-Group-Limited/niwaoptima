<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="forms-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Form Name</th>
                    <th class="min-w-200px">Has Workflow</th>
                    <th class="min-w-200px">Workflow</th>
                    <th class="min-w-200px">Table</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->form_name }}</td>
                        <td>{{ $form->has_workflow ? 'Yes' : 'No' }}</td>
                        <td>{{ $form->workflow ? $form->workflow->workflow_name : '' }}</td>
                        <td>
                            {!! Form::open(['route' => ['forms.table.store', $form->id], 'method' => 'post']) !!}
                            <div class='btn-group'>
                                {!! Form::button('Create', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-success btn-xs',
                                    'onclick' => "return confirm('Are you sure?, You will not be able to delete or edit form')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['forms.destroy', $form->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('forms.formFields.create', [$form->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('forms.show', [$form->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('forms.edit', [$form->id]) }}" class='btn btn-default btn-xs'>
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
            @include('adminlte-templates::common.paginate', ['records' => $forms])
        </div>
    </div>
</div>
