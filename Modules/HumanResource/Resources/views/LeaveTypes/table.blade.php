<div class="card-body">
    <h4 class="card-title">Leave Type Table</h4>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" id="order-listing">
                    <thead>
                        <tr>
                            <th> LEAVE NAME </th>
                            <th>DURATION</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leavetype as $leaves)
                            <tr>
                                <td>{{ $leaves->name }}</td>
                                <td>{{ $leaves->duration }}</td>
                                <td>
                                    {!! Form::open(['route' => ['leave_type.destroy', $leaves->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('leave_type.show', [$leaves->id]) }}"
                                            class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('leave_type.edit', [$leaves->id]) }}"
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $leavetype])
        </div>
    </div>
</div>
