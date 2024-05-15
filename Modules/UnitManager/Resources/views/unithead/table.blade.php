<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="order-listing">
            <thead>
            <tr>
                <th>Unit Head Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($unitheads as $unithead)
                <tr>
                    <td>{{ $unithead->name }}</td>
                    <td>{{ $unithead->created_at }}</td>
                    <td>{{ $unithead->updated_at }}</td>
                    
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['unithead.destroy', $unithead->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('unithead.show', [$unithead->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('unithead.edit', [$unithead->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $unitheads])
        </div>
    </div>
</div>
