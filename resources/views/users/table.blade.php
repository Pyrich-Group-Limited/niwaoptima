{{-- <div class="card-body p-5">
    <div class="table-responsive">
        <table class="table datatable align-middle gs-0 gy-4" id="field-types-table">
            <thead>
            <tr class="fw-bold text-muted bg-light">
                <th class="min-w-200px">Full Name</th>
                <th class="min-w-200px">Email</th>
                <th class="min-w-120px" colspan="1">Action</th>
            															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{!! $user->first_name.' '.$user->middle_name.' '.$user->last_name !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('users.show', [$user->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', [$user->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
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
        @include('adminlte-templates::common.paginate', ['records' => $users])
    </div>
</div>
</div> --}}
