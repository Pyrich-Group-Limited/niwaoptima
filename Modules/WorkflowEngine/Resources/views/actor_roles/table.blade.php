<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="actor-roles-table">
            <thead>
            <tr class="fw-bold text-muted bg-light">
                <th class="min-w-200px">Actor Role</th>
                <th class="min-w-120px" colspan="1">Action</th>
            															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
            @foreach($actorRoles as $actorRole)
                <tr>
                    <td>{{ $actorRole->actor_role }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['actorRoles.destroy', $actorRole->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('actorRoles.show', [$actorRole->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('actorRoles.edit', [$actorRole->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $actorRoles])
        </div>
    </div>
</div>
