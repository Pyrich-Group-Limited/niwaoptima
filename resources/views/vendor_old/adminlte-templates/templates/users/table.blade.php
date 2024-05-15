<div class="table-responsive">
    <table class="table align-middle gs-0 gy-4" id="users-table">
        <thead>
        <tr class="fw-bold text-muted bg-light">
            <th class="min-w-200px">Name</th>
            <th class="min-w-200px">Email</th>
            <th class="min-w-120px" colspan="1">Action</th>
        	<th class="min-w-200px text-end rounded-end"></th>
		</tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'>
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'>
                            <i class="fa fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            	<th class="min-w-200px text-end rounded-end"></th>
			</tr>
        @endforeach
        </tbody>
    </table>
</div>
