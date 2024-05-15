<div class="card-body p-5">
    <div class="table-responsive1">
        <table class="table align-middle gs-0 gy-4" id="order-listing">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Name</th>
                    <th class="min-w-200px">Guard Name</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                    <th class="min-w-200px text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{!! $role->name !!}</td>
                        <td>{!! $role->guard_name !!}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('roles.show', [$role->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye" title="Show"></i>
                                </a>
                                <a href="{{ route('roles.edit', [$role->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit" title="Edit"></i>
                                </a>
                                {{--  {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!} --}}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <th class="min-w-200px text-end rounded-end"></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
