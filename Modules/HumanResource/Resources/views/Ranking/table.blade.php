<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="order-listing">
            <thead>
            <tr>
                <th> RANK</th>
                
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rank as $ranks)
                <tr>
                    <td>{{ $ranks->name }}</td>
                    
                    <td>     
                    {!! Form::open(['route' => ['ranking.destroy', $ranks->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ranking.show', [$ranks->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('ranking.edit', [$ranks->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        {{-- <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' =>  $leavetype]) 
        </div> --}}
    </div>
</div>
