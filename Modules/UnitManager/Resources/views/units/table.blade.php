<div class="card-body">
    <div class="card-title">Units Table</div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" id="order-listing">
                    <thead>
                        <tr>
                            <th>Unit Name</th>
                            <th>Department</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                            <tr>
                                <td>{{ $unit->unit_name }}</td>
                                <td>{{ $unit->department->name }}</td>
                                <td>{{ $unit->created_at }}</td>
                                <td>{{ $unit->updated_at }}</td>

                                <td style="width: 120px">
                                    {!! Form::open(['route' => ['units.destroy', $unit->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('units.show', [$unit->id]) }}" class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('units.edit', [$unit->id]) }}" class='btn btn-default btn-xs'>
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
        </div>
    </div>
    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $units])
        </div>
    </div>
</div>
